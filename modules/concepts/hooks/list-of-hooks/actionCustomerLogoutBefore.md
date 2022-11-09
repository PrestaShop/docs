---
menuTitle: actionCustomerLogoutBefore
Title: actionCustomerLogoutBefore
hidden: true
hookTitle: Before customer logout
files:
  - classes/Customer.php
locations:
  - frontoffice
types:
  - legacy
---

# Hook : actionCustomerLogoutBefore

## Informations

{{% notice tip %}}
**Before customer logout:** 

This hook allows you to execute code before customer logout
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook types: 
  - legacy

Located in: 
  - classes/Customer.php

## Hook call with parameters

```php
Hook::exec('actionCustomerLogoutBefore', ['customer' => $this]);
```