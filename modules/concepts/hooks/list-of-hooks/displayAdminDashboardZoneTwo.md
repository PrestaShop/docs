---
Title: displayAdminDashboardZoneTwo
hidden: true
hookTitle: 'Symfony Dashboard - Zone two'
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
description: "Displays module content in the second column of the migrated (Symfony) dashboard page. Modern counterpart of the legacy dashboardZoneTwo hook."

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
$hookDispatcher->dispatchRenderingWithParameters('displayAdminDashboardZoneTwo', ['date_from' => $dateFrom, 'date_to' => $dateTo])
```
