---
menuTitle: dashboardZoneThree
Title: dashboardZoneThree
hidden: true
hookTitle: Dashboard column three
files:
  - controllers/admin/AdminDashboardController.php
locations:
  - backoffice
type:
  - 
hookAliases:
---

# Hook dashboardZoneThree

## Information

{{% notice tip %}}
**Dashboard column three:** 

This hook is displayed in the third column of the dashboard
{{% /notice %}}

Hook locations: 
  - backoffice

Hook type: 
  - 

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/controllers/admin/AdminDashboardController.php](controllers/admin/AdminDashboardController.php)

## Parameters details

```php
    <?php
    [
        'date_from' => (string|null) $statsDateFrom,
        'date_to' => (string|null) $statsDateTo,
    ]
```

## Hook call in codebase

```php
Hook::exec('dashboardZoneThree', $params)
```