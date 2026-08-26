---
Title: displayAdminDashboardZoneThree
hidden: true
hookTitle: 'Symfony Dashboard - Zone three'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/develop/src/PrestaShopBundle/Controller/Admin/DashboardController.php'
        file: src/PrestaShopBundle/Controller/Admin/DashboardController.php
locations:
    - 'back office'
type: display
hookAliases: 
array_return: false
check_exceptions: false
chain: false
origin: core
description: "Displays module content in the third column of the migrated (Symfony) dashboard page. Modern counterpart of the legacy dashboardZoneThree hook."

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
$hookDispatcher->dispatchRenderingWithParameters('displayAdminDashboardZoneThree', ['date_from' => $dateFrom, 'date_to' => $dateTo])
```
