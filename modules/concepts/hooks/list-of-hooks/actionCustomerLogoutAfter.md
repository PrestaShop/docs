---
menuTitle: actionCustomerLogoutAfter
Title: actionCustomerLogoutAfter
hidden: true
hookTitle: After customer logout
files:
  - classes/Customer.php
locations:
  - frontoffice
types:
  - legacy
---

# Hook : actionCustomerLogoutAfter

## Informations

{{% notice tip %}}
**After customer logout:** 

This hook allows you to execute code after customer logout
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook types: 
  - legacy

Located in: 
  - classes/Customer.php

## Hook call with parameters

```php
Hook::exec('actionCustomerLogoutAfter', ['customer' => $this]);
```