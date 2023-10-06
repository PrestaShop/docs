---
menuTitle: displayMaintenance
Title: displayMaintenance
hidden: true
hookTitle: 'Maintenance Page'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/controller/FrontController.php'
        file: classes/controller/FrontController.php
locations:
    - 'front office'
type: display
hookAliases: null
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook displays new elements on the maintenance page'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec('displayMaintenance', [])
```
