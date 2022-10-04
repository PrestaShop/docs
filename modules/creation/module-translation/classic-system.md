---
title: Classic translation system
menuTitle: Classic system
weight: 2
---

# Classic module translation system

The classic translation system is a heritage from previous versions of PrestaShop and provides retrocompatibility with PrestaShop 1.6. 

{{% notice tip %}}
**Do you need this?**

- If you plan on supporting only versions 1.7.6 and up, consider using the [New translation system]({{< ref "new-system" >}}).
- Modern (symfony-based) modules and native modules only support the new system.
{{% /notice %}}

## How it works

This system works in two steps. 

##### 1. Translation functions are used to display your module's wordings in another language

PrestaShop provides functions that allow PHP files and Smarty templates to display translated wordings. By leveraging the module's dictionary files (generated in step 2), a module can use this feature to display a wording in another language during runtime. 

{{< figure src="../img/classic-translation-system.jpg" title="How wordings are translated at runtime" >}}


##### 2. Creating dictionary files

The Back Office's Translation page (_International > Translations > Modify Translations_) is used to generate dictionary files. It extracts the module's wordings by analyzing its source code, then displays a form that allows to translate them manually into any language installed in your shop. Once translated, this information is stored into dictionary files, which are placed inside the module's `translations` directory. These dictionaries are used in step 1 to match the original wording with the translated one. In addition, dictionary files can be distributed with the module and be reused by other users.

{{< figure src="../img/classic-translation-workflow.jpg" title="Translation workflow" >}}


## Making your module translatable

To make your module translatable, you need to adapt your module's source code. Find any wording you want to make translatable, then wrap it using the appropriate method as explained below. Once wrapped, your wordings will be ready to be translated through the translation interface.

{{% notice tip %}}
**By default, wordings are displayed as originally written.**

Don't worry if you don't translate everything to all languages right away. Any wording left untranslated will be shown in its original language. Because of this, we suggest writing all your wordings in English, and then translating them to other languages.
{{% /notice %}} 

### PHP files

In PHP files, translation is performed using the module's `l()` method.

This method accepts up to three parameters:
     
- `$wording` – The wording you want to translate.
- `$specific` – (Optional) The contextual file name. If not provided, it defaults to the current module's technical name. [Contextualization](#contextualization) is explained below.
- `$locale` – (Optional) The language you want to translate to. If not provided, the user's current language will be used.

Now let's see some examples on how to use it.

#### Module's main class

When translating wordings in the module's main class, since it extends the `Module` class, you can simply call `$this->l()`.

```php
<?php
class mymodule extends Module
{
    public function __construct()
    {
        $this->displayName = $this->l('My module');
        $this->description = $this->l('Description of my module.');
    }
}
```

#### Module controllers

`ModuleAdminController` and `ModuleFrontController` can access the module instance via the `$this->module` property.

```php
<?php
class MyModuleFrontController extends ModuleFrontController
{
    public function initContent()
    {
        $this->title = $this->module->l('My module title');
    }
}
```

#### Other classes

Other classes will need to retrieve the module's instance somehow. We recommend passing it as a parameter in the constructor and storing it for later use.

```php
<?php
class CustomModuleClass 
{
    private $module;
    
    public function __construct(Module $module)
    {
        $this->module = $module;
    }
    
    public function foo()
    {
        $this->text = $this->module->l('My text to translate');
    }
}
```

If you really need to, you can also retrieve a new instance of your module using `Module::getInstanceByName('mymodulename')`. This should be avoided though, as it's not a good practice.

### Templates

Wordings in Smarty .tpl files can be translated using the `{l}` function call, which Smarty will replace by the translation in the current language.

This function accepts three parameters:

- `s` – The wording to be translated.
- `mod` – Your module's technical name.
- `sprintf` – Optional, it can be used to interpolate variables in your wording.

For instance, translating the string "Welcome to this page!" can be done like this:

```smarty
{l s='Welcome to this page!' mod='mymodule'}
```

In our sample module, the `mymodule.tpl` file...

```html
<li>
  <a href="{$base_dir}modules/mymodule/mymodule_page.php" title="Click this link">Click me!</a>
</li>
<!-- Block mymodule -->
<div id="mymodule_block_left" class="block">
  <h4>Welcome!</h4>
  <div class="block_content">
    <p>Hello,
       {if isset($my_module_name) && $my_module_name}
           {$my_module_name}
       {else}
           World
       {/if}
       !
    </p>
    <ul>
      <li><a href="{$my_module_link}" title="Click this link">Click me!</a></li>
    </ul>
  </div>
</div>
<!-- /Block mymodule -->
```

...becomes:

```html
<li>
  <a href="{$base_dir}modules/mymodule/mymodule_page.php" title="{l s='Click this link' mod='mymodule'}">{l s='Click me!' mod='mymodule'}</a>
</li>
<!-- Block mymodule -->
<div id="mymodule_block_left" class="block">
  <h4>{l s='Welcome!' mod='mymodule'}</h4>
  <div class="block_content">
    <p>{l s='Hello,' mod='mymodule'}
       {if isset($my_module_name) && $my_module_name}
           {$my_module_name}
       {else}
           {l s='World' mod='mymodule'}
       {/if}
       !
    </p>
    <ul>
      <li><a href="{$my_module_link}"  title="{l s='Click this link' mod='mymodule'}">{l s='Click me!' mod='mymodule'}</a></li>
    </ul>
  </div>
</div>
<!-- /Block mymodule -->
```

As you can see, the basis of template file translation is to enclose them like this: 
```
{l s='The string' mod='name_of_the_module'}
```

Notice how the `mod` parameter is always provided. This parameter is mandatory for module translation in templates. It is used by PrestaShop to assert which module the string belongs to.

### Variable interpolation

The changes in `mymodule.tpl`'s link and title texts are straightforward to understand. But consider this block:

```
{l s='Hello,' mod='mymodule'}
{if isset($my_module_name) && $my_module_name}
   {$my_module_name}
{else}
   {l s='World' mod='mymodule'}
{/if}
!
```

Isn't there a better way to make this work?

We have two possible cases:

1. `"Hello " . $my_module_name . "!"`
2. `"Hello World!"`

We can start improving this by keeping the first case, then replacing the variable content to "World" as needed:

```
{if !isset($my_module_name) || !$my_module_name}
  {capture name='my_module_tempvar'}{l s='World' mod='mymodule'}{/capture}
  {assign var='my_module_name' value=$smarty.capture.my_module_tempvar}
{/if}
{l s='Hello,' mod='mymodule'} {$my_module_name}!
```

This is a start! In this example, when `$my_module_name` is not defined, we capture the value of translating "World" and assign that value in `$my_module_name`. This way, we can simply display `$my_module_name` in any case.

Now, when working in internationalization, it's better not to make assumptions regarding spacing and positioning of variables. For example, in French, there should be a non-breaking space before the exclamation mark (`!`), but not in other languages. How can we handle this?

In PrestaShop, you can interpolate variables within your wordings using [sprintf replacement markers](https://php.net/sprintf), such as `%s` or `%1$s`. Using this feature, we could get rid of the explicit concatenation of "Hello, ", "$my_module_name" and "!", and let it depend on the translated wording:

```
{if !isset($my_module_name) || !$my_module_name}
  {capture name='my_module_tempvar'}{l s='World' mod='mymodule'}{/capture}
  {assign var='my_module_name' value=$smarty.capture.my_module_tempvar}
{/if}
{l s='Hello %s!' sprintf=[$my_module_name] mod='mymodule'}
```

This way, since the variable replacement will happen _after_ the wording is translated, we can have a wording in English like `Hello %s!`, being translated as `Bonjour %s !` in French.

{{% notice tip %}}
**There's no fixed "special" format for placeholders.**

You can use sprintf markers like `%s` and `%d`, or replacement tokens like `[foo]` and `%bar%`. If you choose to use tokens, just remember to provide an associative array: 

```text
sprintf=['[foo]' => 'some replacement, '%bar%' => 'something else']
```
{{% /notice %}}


#### Interpolating HTML

You may need to add HTML content in your translated string. Writing it directly in the string (original or translated) won't work, as the special characters would be escaped to avoid XSS security issues.

Instead, you should use placeholders and replace them with HTML code.

Let's take an example with a link in a string, which can be tricky to do. 
The first solution that comes to mind would be to concatenate the translated strings with raw HTML code.
But as we explained before, this solution is not recommended, because the words order could be different depending on the translation language.

```smarty
{l
  s='If you want a category to appear in the menu of your shop, go to [modules-link]Modules > Modules & Services > Installed modules.[/modules-link] Then, configure your menu module.'
  sprintf=[
    '[modules-link]' => "<a href=\"{$link->getAdminLink('AdminModules')}\" target=\"_blank\">",
    '[/modules-link]' => '</a>'
  ]
  mod='mymodule'
}
```

Let's look at the resulting string:

```html
If you want a category to appear in the menu of your shop, go to <a href="(...)" target="_blank">Modules &gt; Modules &amp; Services &gt; Installed modules.</a> Then, configure your menu module.
```

Make sure to keep `[modules-link]` and `[/modules-link]` when translating the wording to other languages.

### Contextualization

Sometimes the same wording would be translated differently when used in two different contexts. To allow translators to pick the best translation for each context, module developers can choose to contextualize wordings by specifying the file where it's used. When context is provided, translators can choose a different translation for each context.

Although contextualization is optional, we strongly suggest to contextualize all your wordings.

{{% notice note %}}
Contextualization works differently in the Core, see [Core Translation]({{< ref "/8/development/internationalization/translation/" >}}).
{{% /notice %}}

##### Contextualize translations in PHP files

Context is defined by setting the second parameter of `l()` to something of your choosing. By convention, we suggest using the name of the php file it's located in, like this:

```php
<?php
// in SomeFile.php

$module->l('Some wording', 'somefile');
```

{{% notice note %}}
When no context is provided, PrestaShop automatically sets it to your module's technical name
{{% /notice %}}

##### Contextualize translations in template files

Good news! Contextualization is performed automatically in template files, you don't need to do anything.


## Creating translation dictionary files

Translation dictionary files can be created inside the PrestaShop Back Office:

- Go to the "Translations" page under the "International" menu,
- In the "Modify translations" section, find the "Type of translation" drop-down and select "Installed modules translations",
- Choose the module you want to translate.
- Choose the language you want to translate the module into. The destination language must already be installed to enable translation in it.
- Click the "Modify" button.

You will be presented with a page that displays all the wordings for the selected module, grouped by [translation context](#contextualization). Groups where all wordings have already been translated appear collapsed, whereas groups where at least one string is missing appear expanded. In order to translate your module, simply fill out the empty fields.

Once all strings for your module are correctly translated, click on either the "Save and stay" button or the "Save" button at the bottom of the list.

PrestaShop then saves the translations in a file named using the `<language_code>.php` format and located in you module's `translations` directory (for instance, `/mymodule/translations/fr.php`). 

The translation file looks like this:

```php
<?php
// fr.php

global $_MODULE;
$_MODULE = array();
$_MODULE['<{mymodule}prestashop>mymodule_2ddddc2a736e4128ce1cdfd22b041e7f'] = 'Mon module';
$_MODULE['<{mymodule}prestashop>mymodule_d6968577f69f08c93c209bd8b6b3d4d5'] = 'Description du module.';
$_MODULE['<{mymodule}prestashop>mymodule_533937acf0e84c92e787614bbb16a7a0'] = 'Êtes-vous certain de vouloir désinstaller ce module ? Vous perdrez tous vos réglages !';
$_MODULE['<{mymodule}prestashop>mymodule_0f40e8817b005044250943f57a21c5e7'] = 'Aucun nom fourni';
```

{{% notice note %}}
This file shouldn't be modified manually! It is meant to be edited through the PrestaShop translation interface.
{{% /notice %}}

### Editing a dictionary file manually 

If for any reason you need to edit your dictionary file manually or create it from scratch, here's how.

Dictionary files are essentially a list of key-values that match a representation of the original wording as it appears in the code, and its translation to a given language. The key stays the same across all translation dictionary files for a given module.

Translation keys have a tricky syntax, which is constructed as follows:  

```php
<?php
$translationKey = strtolower('<{' . $moduleName . '}prestashop>' . $sourceFile) . '_' . $md5;
```

As you can see, there are three parameters:

1. `$moduleName` – Your module's technical name, in lower case.
2. `$sourceFile` – Name of the file where the wording is used, according to the following rules:
    - If the translation is performed in PHP code via call to `$this->l(...)` function:
        - The second argument to that function, if provided.
        - Your module's technical name, in lowercase, if not provided.
    - If the translation is performed in a `.tpl` file via `{l}` smarty tag:
        - The file name, in lowercase, with the extension removed (eg. `foo.tpl` → `foo`)
    
3. `$md5` – MD5 hash of the original wording you intend to translate.

{{% notice tip %}}
If you are manually building a translation file to use with the [New translation system]({{< ref "new-system" >}}), keep in mind the [Backward compatibility constraints]({{< ref "new-system/#backwards-compatibility" >}}).
{{% /notice %}}

## Limitations and caveats

### Making your wordings appear in the translation interface

The translation interface relies on code analysis to "discover" wordings for translation. Therefore, when declaring wordings in your code, some care is needed in order to make sure they can be discovered.

1. The translation interface only detects wordings used through the `l()` function and the `{l}` Smarty tag. Therefore, they must be declared in a PHP or TPL file. They will be detected regardless of whether that code is actually used in runtime or not.

2. **Always use literal values, not variables, with the `l()` function and the `{l}` Smarty tag.** Although variables are interpreted at runtime, they won't be understood by the code analyzer, which only supports literals. Passing variables to these methods will prevent those wordings from appearing in the translation interface.

Example:

```php
<?php
// literal values will work
$this->l('Some wording', 'somecontext');

// dynamic content can be injected using placeholders & sprintf
sprintf(
    $this->l('Some wording with %s', 'somecontext'),
    $dynamicContent
);

// this won't work, the interpreter will ignore variables
$wording = 'Some wording';
$context = 'somecontext';
$this->l($wording, $context);

// this will yield unexpected results
$this->l('Some '. $var . ' wording');

// dynamic behavior, like aliasing the l() function, won't work well either
public function translate($wording) {
   $this->l($wording);
}
```

### Language codes

The classic translation system identifies languages using a two-letter code referred to as "Language code" or "ISO code", based on the ISO-619-1 standard ([see an unofficial list here][iso-619-1]). 

Since this standard does not include regional language variants, like British English, Canadian French or Swiss German for example, PrestaShop supports them through nonstandard language codes (`gb`, `qc` and `dh` respectively). 

This historical choice is subject to debate because of the interoperability issues it raises. In order to fully address them, a future major version of PrestaShop will switch completely to [IETF language tags][ietf-language-tags] for language identification. PrestaShop already uses them for some purposes.

In the meantime, refer to this list for the equivalences between language codes and IETF language tags: [Legacy to standard locales][legacy-to-standard].

[iso-619-1]: https://en.wikipedia.org/wiki/List_of_ISO_639-1_codes
[ietf-language-tags]: https://en.wikipedia.org/wiki/IETF_language_tag
[legacy-to-standard]: https://github.com/PrestaShop/PrestaShop/blob/8.0.x/app/Resources/legacy-to-standard-locales.json
[new-translation-system]: {{< ref "new-system" >}}
