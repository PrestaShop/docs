---
menuTitle: dashboardData
Title: dashboardData
hidden: true
hookTitle: 
files:
  - controllers/admin/AdminDashboardController.php
locations:
  - back office
type: 
hookAliases:
---

# Hook dashboardData

## Information

Hook locations: 
  - back office

Hook type: 

Located in: 
  - [controllers/admin/AdminDashboardController.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/controllers/admin/AdminDashboardController.php)

This hook has an `$array_return` parameter set to `true` (module output will be set by name in an array, [see explaination here]({{< relref "/8/development/components/hook/dispatching-hook">}})).

## Call of the Hook in the origin file

```php
Hook::exec('dashboardData', $params, $id_module, true)
```