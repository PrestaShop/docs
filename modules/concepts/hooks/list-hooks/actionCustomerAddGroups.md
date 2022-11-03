---
menuTitle: actionCustomerAddGroups
title: actionCustomerAddGroups
hidden: true
files:
  - classes/Customer.php
types:
  - frontoffice
hookTypes:
  - legacy
---

# Hook : actionCustomerAddGroups

Located in :

  - classes/Customer.php

## Parameters

```php
Hook::exec('actionCustomerAddGroups', ['id_customer' => $this->id, 'groups' => $groups]);
```