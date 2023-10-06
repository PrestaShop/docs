---
menuTitle: dashboardData
Title: dashboardData
hidden: true
hookTitle: null
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/controllers/admin/AdminDashboardController.php'
        file: controllers/admin/AdminDashboardController.php
locations:
    - 'back office'
type: null
hookAliases: null
array_return: true
check_exceptions: false
chain: false
origin: core
description: ''

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec('dashboardData', $params, $id_module, true)
```
