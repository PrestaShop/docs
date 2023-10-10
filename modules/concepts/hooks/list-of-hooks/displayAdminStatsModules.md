---
Title: displayAdminStatsModules
hidden: true
hookTitle: 'Stats - Modules'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/controllers/admin/AdminStatsTabController.php'
        file: controllers/admin/AdminStatsTabController.php
locations:
    - 'back office'
type: display
hookAliases:
    - AdminStatsModules
array_return: false
check_exceptions: false
chain: false
origin: core
description: ''

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec('displayAdminStatsModules', [], $module_instance->id)
```
