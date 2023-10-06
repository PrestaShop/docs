---
menuTitle: actionHtaccessCreate
Title: actionHtaccessCreate
hidden: true
hookTitle: 'After htaccess creation'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/Tools.php'
        file: classes/Tools.php
locations:
    - 'front office'
type: action
hookAliases:
    - afterCreateHtaccess
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook is displayed after the htaccess creation'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec('actionHtaccessCreate')
```
