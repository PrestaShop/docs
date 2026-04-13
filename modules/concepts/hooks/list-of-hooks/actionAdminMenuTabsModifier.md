---
Title: actionAdminMenuTabsModifier
hidden: true
hookTitle: 'Modify back office menu'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/classes/controller/AdminController.php'
        file: classes/controller/AdminController.php
locations:
    - 'back office'
type: action
hookAliases: 
array_return: true
check_exceptions: false
chain: false
origin: core
description: 'This hook allows modifying back office menu tabs'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec('actionAdminMenuTabsModifier', ['tabs' => &$tabs], null, true);
```
