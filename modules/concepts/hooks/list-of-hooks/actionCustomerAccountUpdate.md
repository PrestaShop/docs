---
menuTitle: actionCustomerAccountUpdate
Title: actionCustomerAccountUpdate
hidden: true
hookTitle: Successful customer account update
files:
  - classes/form/CustomerPersister.php
locations:
  - frontoffice
types:
  - legacy
---

# Hook : actionCustomerAccountUpdate

## Informations

{{% notice tip %}}
**Successful customer account update:** 

This hook is called when a customer updates its account successfully
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook types: 
  - legacy

Located in: 
  - classes/form/CustomerPersister.php

## Hook call with parameters

```php
Hook::exec('actionCustomerAccountUpdate', [
                'customer' => $customer,
            ]);
```