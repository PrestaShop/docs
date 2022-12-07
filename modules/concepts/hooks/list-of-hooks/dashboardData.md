---
menuTitle: dashboardData
Title: dashboardData
hidden: true
hookTitle: 
files:
  - controllers/admin/AdminDashboardController.php
locations:
  - backoffice
type:
  - 
hookAliases:
---

# Hook dashboardData

## Information

Hook locations: 
  - backoffice

Hook type: 
  - 

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/controllers/admin/AdminDashboardController.php](controllers/admin/AdminDashboardController.php)

This hook has an `$array_return` parameter set to `true` (module output will be set by name in an array, [see explaination here]({{< relref "/8/development/components/hook/dispatching-hook">}})).

## Hook call in codebase

```php
Hook::exec('dashboardData', $params, $id_module, true)
```