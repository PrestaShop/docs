---
menuTitle: actionCustomerBeforeUpdateGroup
Title: actionCustomerBeforeUpdateGroup
hidden: true
hookTitle: 
files:
  - classes/Customer.php
locations:
  - frontoffice
types:
  - legacy
---

# Hook : actionCustomerBeforeUpdateGroup

## Informations

Hook locations: 
  - frontoffice

Hook types: 
  - legacy

Located in: 
  - classes/Customer.php

## Hook call with parameters

```php
Hook::exec('actionCustomerBeforeUpdateGroup', ['id_customer' => $this->id, 'groups' => $list]);
```