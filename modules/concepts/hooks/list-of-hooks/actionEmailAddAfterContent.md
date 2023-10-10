---
Title: actionEmailAddAfterContent
hidden: true
hookTitle: 'Add extra content after mail content'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/Mail.php'
        file: classes/Mail.php
locations:
    - 'front office'
type: action
hookAliases: 
array_return: true
check_exceptions: false
chain: false
origin: core
description: 'This hook is called just after fetching mail template'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec(
                'actionEmailAddAfterContent',
                [
                    'template' => $template,
                    'template_html' => &$templateHtml,
                    'template_txt' => &$templateTxt,
                    'id_lang' => (int) $idLang,
                ],
                null,
                true
            )
```
