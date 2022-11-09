---
menuTitle: actionCustomerAccountAdd
Title: actionCustomerAccountAdd
hidden: true
hookTitle: Successful customer account creation
files:
  - classes/form/CustomerPersister.php
locations:
  - frontoffice
types:
  - legacy
---

# Hook : actionCustomerAccountAdd

## Informations

{{% notice tip %}}
**Successful customer account creation:** 

This hook is called when a new customer creates an account successfully
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook types: 
  - legacy

Located in: 
  - classes/form/CustomerPersister.php

## Hook call with parameters

```php
Hook::exec('actionCustomerAccountAdd', [
                'newCustomer' => $customer,
            ]);
```