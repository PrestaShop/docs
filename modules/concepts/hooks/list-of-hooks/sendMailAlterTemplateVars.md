---
menuTitle: sendMailAlterTemplateVars
Title: sendMailAlterTemplateVars
hidden: true
hookTitle: 'Alter template vars on the fly'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/Mail.php'
        file: classes/Mail.php
locations:
    - 'front office'
type: null
hookAliases: null
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook is called when Mail::send() is called'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec(
            'sendMailAlterTemplateVars',
            [
                'template' => $template,
                'template_vars' => &$templateVars,
            ]
        )
```
