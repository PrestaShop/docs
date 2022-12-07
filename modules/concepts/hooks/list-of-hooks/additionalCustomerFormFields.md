---
menuTitle: additionalCustomerFormFields
Title: additionalCustomerFormFields
hidden: true
hookTitle: Add fields to the Customer form
files:
  - classes/form/CustomerFormatter.php
locations:
  - frontoffice
type:
  - 
hookAliases:
---

# Hook additionalCustomerFormFields

## Information

{{% notice tip %}}
**Add fields to the Customer form:** 

This hook returns an array of FormFields to add them to the customer registration form
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook type: 
  - 

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/form/CustomerFormatter.php](classes/form/CustomerFormatter.php)

This hook has an `$array_return` parameter set to `true` (module output will be set by name in an array, [see explaination here]({{< relref "/8/development/components/hook/dispatching-hook">}})).

## Hook call in codebase

```php
Hook::exec('additionalCustomerFormFields', ['fields' => &$format], null, true)
```