---
menuTitle: validateCustomerFormFields
Title: validateCustomerFormFields
hidden: true
hookTitle: Customer registration form validation
files:
  - classes/form/CustomerForm.php
locations:
  - frontoffice
type:
  - 
hookAliases:
---

# Hook validateCustomerFormFields

## Information

{{% notice tip %}}
**Customer registration form validation:** 

This hook is called to a module when it has sent additional fields with additionalCustomerFormFields
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook type: 
  - 

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/form/CustomerForm.php](classes/form/CustomerForm.php)

This hook has an `$array_return` parameter set to `true` (module output will be set by name in an array, [see explaination here]({{< relref "/8/modules/concepts/hooks">}})).

## Hook call in codebase

```php
Hook::exec('validateCustomerFormFields', ['fields' => $formFields], $moduleId, true)
```