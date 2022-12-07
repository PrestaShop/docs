---
menuTitle: moduleRoutes
Title: moduleRoutes
hidden: true
hookTitle: 
files:
  - classes/Dispatcher.php
locations:
  - frontoffice
type:
  - 
hookAliases:
---

# Hook moduleRoutes

## Information

Hook locations: 
  - frontoffice

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/Dispatcher.php](classes/Dispatcher.php)

This hook has an `$array_return` parameter set to `true` (module output will be set by name in an array, [see explaination here]({{< relref "/8/modules/concepts/hooks">}})).

This hook has a `$check_exception` parameter set to `false` (check permission exception, [see explaination here]({{< relref "/8/modules/concepts/hooks">}})).

## Hook call in codebase

```php
Hook::exec('moduleRoutes', ['id_shop' => $id_shop], null, true, false)
```