---
menuTitle: actionCustomerAddGroups
Title: actionCustomerAddGroups
hidden: true
hookTitle: 
files:
  - classes/Customer.php
locations:
  - frontoffice
types:
  - legacy
---

# Hook : actionCustomerAddGroups

## Informations

Hook locations: 
  - frontoffice

Hook types: 
  - legacy

Located in: 
  - classes/Customer.php

## Hook call with parameters

```php
Hook::exec('actionCustomerAddGroups', ['id_customer' => $this->id, 'groups' => $groups]);
```