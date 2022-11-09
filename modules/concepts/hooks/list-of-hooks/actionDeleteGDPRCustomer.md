---
menuTitle: actionDeleteGDPRCustomer
Title: actionDeleteGDPRCustomer
hidden: true
hookTitle: 
files:
  - modules/psgdpr/psgdpr.php
locations:
  - frontoffice
types:
  - legacy
---

# Hook : actionDeleteGDPRCustomer

## Informations

Hook locations: 
  - frontoffice

Hook types: 
  - legacy

Located in: 
  - modules/psgdpr/psgdpr.php

## Hook call with parameters

```php
Hook::exec('actionDeleteGDPRCustomer', $customer, $module['id_module']);
```