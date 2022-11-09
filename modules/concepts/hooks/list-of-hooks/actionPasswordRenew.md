---
menuTitle: actionPasswordRenew
Title: actionPasswordRenew
hidden: true
hookTitle: 
files:
  - controllers/front/PasswordController.php
locations:
  - frontoffice
types:
  - legacy
---

# Hook : actionPasswordRenew

## Informations

Hook locations: 
  - frontoffice

Hook types: 
  - legacy

Located in: 
  - controllers/front/PasswordController.php

## Hook call with parameters

```php
Hook::exec('actionPasswordRenew', ['customer' => $customer, 'password' => $password]);
```