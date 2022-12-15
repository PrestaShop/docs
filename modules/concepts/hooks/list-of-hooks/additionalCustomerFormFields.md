---
menuTitle: additionalCustomerFormFields
Title: additionalCustomerFormFields
hidden: true
hookTitle: Add fields to the Customer form
files:
  - classes/form/CustomerFormatter.php
locations:
  - front office
type: 
hookAliases:
---

# Hook additionalCustomerFormFields

## Information

{{% notice tip %}}
**Add fields to the Customer form:** 

This hook returns an array of FormFields to add them to the customer registration form
{{% /notice %}}

Hook locations: 
  - front office

Hook type: 

Located in: 
  - [classes/form/CustomerFormatter.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/form/CustomerFormatter.php)

This hook has an `$array_return` parameter set to `true` (module output will be set by name in an array, [see explaination here]({{< relref "/8/development/components/hook/dispatching-hook">}})).

## Call of the Hook in the origin file

```php
Hook::exec('additionalCustomerFormFields', ['fields' => &$format], null, true)
```