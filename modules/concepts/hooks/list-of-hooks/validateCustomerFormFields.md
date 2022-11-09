---
menuTitle: validateCustomerFormFields
Title: validateCustomerFormFields
hidden: true
hookTitle: Customer registration form validation
files:
  - classes/form/CustomerForm.php
locations:
  - frontoffice
types:
  - legacy
---

# Hook : validateCustomerFormFields

## Informations

{{% notice tip %}}
**Customer registration form validation:** 

This hook is called to a module when it has sent additional fields with additionalCustomerFormFields
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook types: 
  - legacy

Located in: 
  - classes/form/CustomerForm.php

## Hook call with parameters

```php
Hook::exec('validateCustomerFormFields', ['fields' => $formFields], $moduleId, true);
```