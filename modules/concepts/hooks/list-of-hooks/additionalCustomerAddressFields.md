---
menuTitle: additionalCustomerAddressFields
Title: additionalCustomerAddressFields
hidden: true
hookTitle: Add fields to the Customer address form
files:
  - classes/form/CustomerAddressFormatter.php
locations:
  - frontoffice
types:
  - legacy
---

# Hook : additionalCustomerAddressFields

## Informations

{{% notice tip %}}
**Add fields to the Customer address form:** 

This hook returns an array of FormFields to add them to the customer address registration form
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook types: 
  - legacy

Located in: 
  - classes/form/CustomerAddressFormatter.php

## Hook call with parameters

```php
Hook::exec('additionalCustomerAddressFields', ['fields' => &$format], null, true);
```