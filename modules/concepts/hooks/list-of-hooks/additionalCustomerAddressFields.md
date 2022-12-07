---
menuTitle: additionalCustomerAddressFields
Title: additionalCustomerAddressFields
hidden: true
hookTitle: Add fields to the Customer address form
files:
  - classes/form/CustomerAddressFormatter.php
locations:
  - frontoffice
type:
  - 
hookAliases:
---

# Hook additionalCustomerAddressFields

## Information

{{% notice tip %}}
**Add fields to the Customer address form:** 

This hook returns an array of FormFields to add them to the customer address registration form
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook type: 
  - 

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/form/CustomerAddressFormatter.php](classes/form/CustomerAddressFormatter.php)

This hook has an `$array_return` parameter set to `true` (module output will be set by name in an array, [see explaination here]({{< relref "/8/modules/concepts/hooks">}})).

## Hook call in codebase

```php
Hook::exec('additionalCustomerAddressFields', ['fields' => &$format], null, true)
```