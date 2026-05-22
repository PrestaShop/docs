---
Title: actionAdminBreadcrumbModifier
hidden: true
hookTitle: 'Modify back office breadcrumb'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/classes/controller/AdminController.php'
        file: classes/controller/AdminController.php
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/src/PrestaShopBundle/Twig/Component/Toolbar.php'
        file: src/PrestaShopBundle/Twig/Component/Toolbar.php
locations:
    - 'back office'
type: action
hookAliases: 
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook allows modifying back office breadcrumb'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec('actionAdminBreadcrumbModifier', ['tabs' => $tabs, 'breadcrumb' => &$breadcrumbs2], null, true)
```
