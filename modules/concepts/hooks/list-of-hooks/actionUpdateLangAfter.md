---
Title: actionUpdateLangAfter
hidden: true
hookTitle: 'Update "lang" tables'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/Language.php'
        file: classes/Language.php
locations:
    - 'front office'
type: action
hookAliases: 
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'Update "lang" tables after adding or updating a language'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec('actionUpdateLangAfter', ['lang' => $language])
```
