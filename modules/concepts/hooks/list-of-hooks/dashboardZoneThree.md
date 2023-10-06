---
menuTitle: dashboardZoneThree
Title: dashboardZoneThree
hidden: true
hookTitle: 'Dashboard column three'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/controllers/admin/AdminDashboardController.php'
        file: controllers/admin/AdminDashboardController.php
locations:
    - 'back office'
type: null
hookAliases: null
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook is displayed in the third column of the dashboard'

---

{{% hookDescriptor %}}

## Parameters details

```php
    <?php
    [
        'date_from' => (string|null) $statsDateFrom,
        'date_to' => (string|null) $statsDateTo,
    ]
```

## Call of the Hook in the origin file

```php
Hook::exec('dashboardZoneThree', $params)
```
