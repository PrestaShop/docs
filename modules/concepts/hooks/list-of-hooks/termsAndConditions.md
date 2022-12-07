---
menuTitle: termsAndConditions
Title: termsAndConditions
hidden: true
hookTitle: 
files:
  - classes/checkout/ConditionsToApproveFinder.php
locations:
  - frontoffice
type:
  - 
hookAliases:
---

# Hook termsAndConditions

## Information

Hook locations: 
  - frontoffice

Hook type: 
  - 

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/checkout/ConditionsToApproveFinder.php](classes/checkout/ConditionsToApproveFinder.php)

This hook has an `$array_return` parameter set to `true` (module output will be set by name in an array, [see explaination here]({{< relref "/8/modules/concepts/hooks">}})).

## Hook call in codebase

```php
Hook::exec('termsAndConditions', [], null, true)
```