---
menuTitle: displayCustomerAccountFormTop
Title: displayCustomerAccountFormTop
hidden: true
hookTitle: Block above the form for create an account
files:
  - controllers/front/RegistrationController.php
locations:
  - frontoffice
types:
  - legacy
---

# Hook : displayCustomerAccountFormTop

## Informations

{{% notice tip %}}
**Block above the form for create an account:** 

This hook is displayed above the customer's account creation form
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook types: 
  - legacy

Located in: 
  - controllers/front/RegistrationController.php

## Hook call with parameters

```php
Hook::exec('displayCustomerAccountFormTop'),
```