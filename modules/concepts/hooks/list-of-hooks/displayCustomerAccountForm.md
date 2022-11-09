---
menuTitle: displayCustomerAccountForm
Title: displayCustomerAccountForm
hidden: true
hookTitle: Customer account creation form
files:
  - classes/form/CustomerForm.php
locations:
  - frontoffice
types:
  - legacy
---

# Hook : displayCustomerAccountForm

## Informations

{{% notice tip %}}
**Customer account creation form:** 

This hook displays some information on the form to create a customer account
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook types: 
  - legacy

Located in: 
  - classes/form/CustomerForm.php

## Hook call with parameters

```php
Hook::exec('displayCustomerAccountForm'),
```