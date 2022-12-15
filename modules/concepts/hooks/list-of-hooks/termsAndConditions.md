---
menuTitle: termsAndConditions
Title: termsAndConditions
hidden: true
hookTitle: 
files:
  - classes/checkout/ConditionsToApproveFinder.php
locations:
  - front office
type: 
hookAliases:
---

# Hook termsAndConditions

## Information

Hook locations: 
  - front office

Located in: 
  - [classes/checkout/ConditionsToApproveFinder.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/checkout/ConditionsToApproveFinder.php)

This hook has an `$array_return` parameter set to `true` (module output will be set by name in an array, [see explaination here]({{< relref "/8/development/components/hook/dispatching-hook">}})).

## Call of the Hook in the origin file

```php
Hook::exec('termsAndConditions', [], null, true)
```