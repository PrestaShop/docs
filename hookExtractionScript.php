<?php

/**
 * This Script is a tool to extract hooks from a PrestaShop release zip, 
 * to help maintaining PrestaShop's devdocs website
 * 
 * usage for .zip release archive: 
 * php hookExtraction.php --source=prestashop-release.zip --versionCode=8.1.2 --outputFolder=/path/to/local/devdocs/src/content/8/modules/concepts/hooks/list-of-hooks
 * 
 * usage for directory (cloned repository): 
 * php hookExtraction.php --sourceFolder=ps8.1.2-with-hummingbird --versionCode=8.1.2 --outputFolder=/Users/thomas/dev/prestashop/devdocs-site/src/content/8/modules/concepts/hooks/list-of-hooks
 * 
 * it will: 
 *  - unzip the release
 *  - lookup for hooks in core, modules, themes
 *  - create new / unlisted hooks in the outputFolder
 *  - update existing ones
 */

$options = getOpt('', [
    'source:', 
    'versionCode:',
    'outputFolder:',
    'sourceFolder:'
]);

if($options['sourceFolder'] !== false){
    $codebasePath = $options['sourceFolder'];
} else {
    $codebasePath = (new ReleaseExtractor($options['source']))->getCodebasePath();
}

$hookList = (new HookFinder($codebasePath))->getHookList();

// Example: Optional
// update only hummingbird hooks
$hookList = array_filter($hookList, function($array){
    foreach($array as $a){
        if(strpos($a["file"], "themes/hummingbird") !== false){
            return true;
        }
    }
    return false;
});
// end example

$errors = (new HookFinderHandler($options['outputFolder'], $options['versionCode'], $hookList))->handle();

echo "Errors on:\n"; 
var_dump($errors);

class ReleaseExtractor
{
    private $releasePath;
    private $temporaryFolderPath = 'tmp';

    public function __construct($releasePath)
    {
        $this->releasePath = $releasePath;
        $this->extractInstaller();
        $this->extractCodebase();
    }

    private function extractInstaller()
    {
        $zip = new ZipArchive;
        $zip->open($this->releasePath);
        $zip->extractTo($this->temporaryFolderPath);
        $zip->close();

    }

    private function extractCodebase()
    {
        $codebaseZip = new ZipArchive;
        $codebaseZip->open($this->temporaryFolderPath . '/prestashop.zip');
        $codebaseZip->extractTo($this->temporaryFolderPath . '/prestashop');
        $codebaseZip->close();
    }

    public function getCodebasePath()
    {
        return $this->temporaryFolderPath . '/prestashop/';
    }
}

class HookFinder
{
    private $codebasePath;
    private $skipDirs = ['var/cache', 'vendor'];
    private $regexList = [
        'legacy' => [
            // bug on this one, when matching: legacy, with arguments, mono or multiline
            '/Hook\:\:exec\((.*?)\'(.*?)\'\,(.*?)\[(.*?)\](\,\ (.*))?\)(\;|\,)/is', // legacy, with arguments, mono or multiline
            '/Hook\:\:exec\(\'(.*?)\'(.*?)?\)(\;|\,)/i', // legacy, no arguments, monoline,
            '/Hook\:\:exec\s*(\(([^(),]*)(?:(?:[^(),]+|,)|(?-2))*\))/is'
        ],
        'symfony' => [
            '/dispatchHook\s*(\(([^(),]*)(?:(?:[^(),]+|,)|(?-2))*\))/is', // symfony
            '/dispatchWithParameters\s*(\(([^(),]*)(?:(?:[^(),]+|,)|(?-2))*\))/is' // symfony, other method
        ],
        'smarty' => [
            '/\{hook\ h\=\'(.*?)\'(.*)\}/i', // smarty
        ],
        'twig' => [
            '/\{\{\ renderhook\(\'(.*?)\'(.*?)\}\}/is', // twig
            '/\{\{\ renderhooksarray\(\'(.*?)\'(.*?)\}\}/is' // twig
        ]
    ];

    public function __construct($codebasePath)
    {
        $this->codebasePath = $codebasePath;
    }

    public function getHookList()
    {
        $files = $this->listAllFiles($this->codebasePath);
        $hookList = [];
        $count = 0;

        foreach($files as $file){

            $hooksInFile = [];
            $skipFile = false;

            if(is_dir($file)){
                $skipFile = true;
            }

            foreach($this->skipDirs as $skipDir){
                if(strpos($file, $skipDir) !== false){
                    $skipFile = true;
                    break;
                }
            }

            if(!$skipFile){
                foreach($this->regexList as $patternType => $patterns){
                    foreach($patterns as $pattern){                
                        $hooksInFile = $this->findHooksInFileRegex($file, $patternType, $pattern, $count);

                        foreach($hooksInFile as $hook){
                            $hookName = $hook["name"];
                            if(!isset($hookList[$hookName])){
                                $hookList[$hookName] = [];
                            }
                            $hookList[$hookName][] = $hook;
                        }
                    }
                }
            }
        }

        return $hookList;
    }

    private function listAllFiles($dir) 
    {
        $array = array_diff(scandir($dir), array('.', '..'));

        foreach ($array as &$item) {
            $item = $dir . $item;
        }
        unset($item);

        foreach ($array as $item) {
            if (is_dir($item)) {
                $array = array_merge($array, $this->listAllFiles($item . DIRECTORY_SEPARATOR));
            }
        }

        return $array;
    }

    private function findHooksInFileRegex($file, $patternType, $pattern, &$count)
    {
        $content = file_get_contents($file);

        preg_match_all(
            $pattern, 
            $content, 
            $result, 
            PREG_PATTERN_ORDER
        );

        $hooksInFile = [];

        $fileName = str_replace($this->codebasePath, '', $file);

        if(!empty($result[0])){ 
            for($i = 0; $i < sizeof($result[0]); $i++){
                if(isset($result[2][$i]) && ($patternType == 'legacy' || $patternType == 'symfony')){
                    $hookName = $this->cleanHookName($this->cleanString($result[2][$i]));
                } else {
                    $hookName = $this->cleanHookName($this->cleanString($result[1][$i]));
                }
                $fullCall = $result[0][$i];
                $count++;
                $hooksInFile[] = [
                    'name' => $hookName, 
                    'file' => $fileName, 
                    'fullCall' => $fullCall,
                    'hookType' => $patternType
                ];
            }
        } 

        return $hooksInFile;
    }

    private function cleanString($string) 
    {
        $string = trim($string);
        $string = str_replace(' ', '-', $string); 
        return preg_replace('/[^A-Za-z0-9\-]/', '', $string); 
    }

    private function cleanHookName($hookName)
    {
        $hookName = str_replace([
            '--getclassthis--ucfirstthis-action--',
            '--this-getFullyQualifiedName--',
            '--this-controllername--',
            '--ucfirstthis-action--',
            '--Containercamelizeform-getName--',
            '--helperListConfiguration-legacyControllerName--',
            '--Containercamelizethis-gridId--',
            '--Containercamelizedefinition-getId--',
            '--this-camelizeformBuilder-getName--',
            'LayoutVariablesBuilderInterfaceBUILDMAILLAYOUTVARIABLESHOOK',
            'ThemeCatalogInterfaceLISTMAILTHEMESHOOK',
            'selfHOOKADDURLS',
            'selfDISPATCHERAFTERACTION',
            'selfDISPATCHERBEFOREACTION',
            'MailTemplateRendererInterfaceGETMAILLAYOUTTRANSFORMATIONS',
            'LayoutVariablesBuilderInterfaceBUILDMAILLAYOUTVARIABLESHOOK',
            '--hookName--',
            'actionBeforeUpdate--Containercamelize',
            'actionBeforeCreate--Containercamelize',
            'actionAfterUpdate--Containercamelize',
            'actionAfterCreate--Containercamelize',
            'actionBeforeAjaxDie--controller--method',
            'actionAjaxDie--controller--method--Before',
            'action--this-camelize', // issue on this one, must fix regex
            'action--Containercamelize' // issue on this one, must fix regex
        ], [
            '<ClassName><Action>',
            '<ClassName>',
            '<Controller>',
            '<Action>',
            '<FormName>',
            '<LegacyControllerName>',
            '<GridId>',
            '<DefinitionId>',
            '<FormName>',
            'actionBuildMailLayoutVariables',
            'actionListMailThemes',
            'gSitemapAppendUrls',
            'actionDispatcherAfter',
            'actionDispatcherBefore',
            'actionGetMailLayoutTransformations',
            'actionBuildMailLayoutVariables',
            '<HookName>',
            'actionBeforeUpdate<FormName>FormHandler',
            'actionBeforeCreate<FormName>FormHandler',
            'actionAfterUpdate<FormName>FormHandler',
            'actionAfterCreate<FormName>FormHandler',
            'actionBeforeAjaxDie<Controller><Method>',
            'actionAjaxDie<Controller><Method>Before',
            'action<FormName>FormDataProviderDefaultData',
            'action<DefinitionId>GridPresenterModifier'

        ], $hookName);

        return $hookName;
    }

}

class HookFinderHandler
{
    private $outputFolder;
    private $versionCode;
    private $hookList;
    private $skipHooks = [
        'this-getHookName',
        'paramsh',
        'new-Hook',
        'hookName',
        'HookInterface-hook',
        // this one could be fixed:
        'displayBackOfficeHeader-----------------------------Fetch-Employee-Menu--------menuLinksCollections--new-ActionsBarButtonsCollection--------Hookexec------------displayBackOfficeEmployeeMenu',
        'actionObject--this-getFullyQualifiedName',
        'actionAdmin--ucfirst',
        'action--getclass',
        'actionthis-hookNameSave'
    ];
    private $descriptionReferenceXml = 'https://raw.githubusercontent.com/PrestaShop/PrestaShop/develop/install-dev/data/xml/hook.xml';
    private $hookAliasesReferenceXml = 'https://raw.githubusercontent.com/PrestaShop/PrestaShop/develop/install-dev/data/xml/hook_alias.xml';
    private $hookDescriptions = [];
    private $hookAliases = [];

    public function __construct($outputFolder, $versionCode, $hookList)
    {
        $this->outputFolder = $outputFolder;
        $this->versionCode = $versionCode;
        $this->hookList = $hookList;

        $this->extractDescriptionReference();
        $this->extractHookAliases();
    }

    private function extractDescriptionReference()
    {
        $xmlContent = simplexml_load_file($this->descriptionReferenceXml);

        foreach($xmlContent->entities->hook as $node){
            $this->hookDescriptions[$node->name->__toString()] = [
                'name' => $node->name->__toString(),
                'title' => $node->title->__toString(),
                'description' => $node->description->__toString()
            ];
        }
    }

    private function extractHookAliases()
    {
        $xmlContent = simplexml_load_file($this->hookAliasesReferenceXml);

        foreach($xmlContent->entities->hook_alias as $node){ 
            if(!isset($this->hookAliases[$node->name->__toString()])){
                $this->hookAliases[$node->name->__toString()] = [];
            }
            $this->hookAliases[$node->name->__toString()][] = $node->alias->__toString();
        }
    }

    public function handle()
    {
        foreach($this->hookList as $hookSlug => $hookArray){

            $hookName = $hookArray[0]['name'];

            if(in_array($hookName, $this->skipHooks)){
                continue;
            }

            $origin = 'core';

            $fileStr = "\n";
            foreach($hookArray as $hookInfo){
                $file = $hookInfo['file'];

                if(substr($file, 0, 6) === 'admin/'){
                    $file = str_replace('admin', 'admin-dev', $file);
                }

                $parts = explode('/', $file);
                $firstFolder = array_shift($parts);
                $themeOrModuleName = array_shift($parts);
                $trailingParts = implode('/', $parts);

                if($firstFolder == 'themes'){
                    $origin = 'theme';

                    $fileOutput = [
                        'theme' => $themeOrModuleName,
                        'url' => 'https://github.com/PrestaShop/' . $themeOrModuleName . '-theme/blob/develop/' . $trailingParts,
                        'file' => $file
                    ];
                } else if($firstFolder == 'modules'){
                    $origin = 'module';

                    $fileOutput = [
                        'module' => $themeOrModuleName,
                        'url' => 'https://github.com/PrestaShop/' . $themeOrModuleName . '/blob/dev/' . $trailingParts,
                        'file' => $file
                    ];
                } else {
                    $fileOutput = [
                        'url' => 'https://github.com/PrestaShop/PrestaShop/blob/' . $this->versionCode . '/' . $file,
                        'file' => $file
                    ];
                }

                $fileStr .= "    -\n";
                foreach($fileOutput as $k => $v){
                    $fileStr .= "      " . $k . ': ' . $v . "\n";
                }
            }

            $locatedIn = array_unique(
                array_map(
                    fn($hookInfo) => $hookInfo['file'], 
                    $hookArray
                )
            );

            $typeStr = $this->guessType($hookName);

            $locationsStr = "\n    - " . implode("\n    - ", $this->guessLocations($hookName, $locatedIn));

            $aliasesStr = '';
            if(array_key_exists($hookName, $this->hookAliases)){
                $aliasesStr = "\n    - " . implode("\n    - ", $this->hookAliases[$hookName]);
            }

            $referenceTitle = isset($this->hookDescriptions[$hookName]) ? $this->hookDescriptions[$hookName]['title'] : $hookName;
            $description = isset($this->hookDescriptions[$hookName]) ? $this->hookDescriptions[$hookName]['description'] : '';

            $content = <<<EOF
---
Title: {$hookName}
hidden: true
hookTitle: {$referenceTitle}
files:{$fileStr}
locations:{$locationsStr}
type: {$typeStr}
hookAliases:{$aliasesStr} 
origin: {$origin}
array_return: false
check_exceptions: false
chain: false
description: {$description}

---
EOF;

            if(strlen($hookSlug)>100){
                $errors[] = $hookArray;
            } else {

                if(file_exists($this->outputFolder . '/' . $hookSlug . '.md')){
                    // update metadata only
                    $oldContent = file_get_contents($this->outputFolder . '/' . $hookSlug . '.md');                
                    $endOfMeta = strpos($oldContent, "---", 3);
                    $updatedContent = $content . substr($oldContent, $endOfMeta+3);
                    file_put_contents($this->outputFolder . '/' . $hookSlug . '.md', $updatedContent);
                } else {
                    // create all file
                    $fullCall = $hookArray[0]['fullCall'];
                    $content = <<<EOF
$content
{{% hookDescriptor %}}
## Call of the Hook in the origin file
```php
{$fullCall}
```
EOF;
                    file_put_contents($this->outputFolder . '/' . $hookSlug . '.md', $content);
                }
            }
        }

        return $errors;
    }

    private function guessLocations($hookName, $locatedIn)
    {
        $types = [];

        if(false !== strpos($hookName, "Admin")){
            $types[] = "back office";
        }

        if(false !== strpos($hookName, "actionObject")){
            $types[] = "back office";
            $types[] = "front office";
        }

        foreach($locatedIn as $file){
            if(false !== strpos($file, "Admin")){
                $types[] = "back office";
            }
        }

        if(empty($types)){
            $types[] = "front office";
        }

        return array_unique($types);
    }

    private function guessType($hookName)
    {
        if(false !== strpos($hookName, "ction")){
            return "action";
        }

        if(false !== strpos($hookName, "isplay")){
            return "display";
        }

        return "";
    }
}