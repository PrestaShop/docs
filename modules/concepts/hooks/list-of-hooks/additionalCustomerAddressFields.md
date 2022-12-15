---
menuTitle: additionalCustomerAddressFields
Title: additionalCustomerAddressFields
hidden: true
hookTitle: Add fields to the Customer address form
files:
  - classes/form/CustomerAddressFormatter.php
locations:
  - front office
type: 
hookAliases:
---

# Hook additionalCustomerAddressFields

## Information

{{% notice tip %}}
**Add fields to the Customer address form:** 

This hook returns an array of FormFields to add them to the customer address registration form
{{% /notice %}}

Hook locations: 
  - front office

Hook type: 

Located in: 
  - [classes/form/CustomerAddressFormatter.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/form/CustomerAddressFormatter.php)

This hook has an `$array_return` parameter set to `true` (module output will be set by name in an array, [see explaination here]({{< relref "/8/development/components/hook/dispatching-hook">}})).

## Call of the Hook in the origin file

```php
Hook::exec('additionalCustomerAddressFields', ['fields' => &$format], null, true)
```