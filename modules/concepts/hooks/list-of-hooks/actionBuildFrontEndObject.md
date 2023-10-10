---
Title: actionBuildFrontEndObject
hidden: true
hookTitle: 'Manage elements added to the "prestashop" javascript object'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/controller/FrontController.php'
        file: classes/controller/FrontController.php
locations:
    - 'front office'
type: action
hookAliases: 
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook allows you to customize the "prestashop" javascript object that is included in all front office pages'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec('actionBuildFrontEndObject', [
            'obj' => &$object,
        ])
```
