---
menuTitle: actionAuthentication
Title: actionAuthentication
hidden: true
hookTitle: Successful customer authentication
files:
  - classes/form/CustomerLoginForm.php
locations:
  - frontoffice
types:
  - legacy
---

# Hook : actionAuthentication

## Informations

{{% notice tip %}}
**Successful customer authentication:** 

This hook is displayed after a customer successfully signs in
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook types: 
  - legacy

Located in: 
  - classes/form/CustomerLoginForm.php

## Hook call with parameters

```php
Hook::exec('actionAuthentication', ['customer' => $this->context->customer]);
```