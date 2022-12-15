---
menuTitle: moduleRoutes
Title: moduleRoutes
hidden: true
hookTitle: 
files:
  - classes/Dispatcher.php
locations:
  - front office
type: 
hookAliases:
---

# Hook moduleRoutes

## Information

Hook locations: 
  - front office

Located in: 
  - [classes/Dispatcher.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/Dispatcher.php)

This hook has an `$array_return` parameter set to `true` (module output will be set by name in an array, [see explaination here]({{< relref "/8/development/components/hook/dispatching-hook">}})).

This hook has a `$check_exception` parameter set to `false` (check permission exception, [see explaination here]({{< relref "/8/development/components/hook/dispatching-hook">}})).

## Call of the Hook in the origin file

```php
Hook::exec('moduleRoutes', ['id_shop' => $id_shop], null, true, false)
```