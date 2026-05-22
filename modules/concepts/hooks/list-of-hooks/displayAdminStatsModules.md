---
Title: displayAdminStatsModules
hidden: true
hookTitle: 'Stats - Modules'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/controllers/admin/AdminStatsTabController.php'
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
$moduleList = Hook::getHookModuleExecList('displayAdminStatsModules');
        if (true === is_array($moduleList)) {
            return array_map(
                function ($moduleArray) {
                    return ['name' => $moduleArray['module']];
                },
```
