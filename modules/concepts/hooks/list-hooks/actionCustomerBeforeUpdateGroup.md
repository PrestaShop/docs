---
menuTitle: actionCustomerBeforeUpdateGroup
title: actionCustomerBeforeUpdateGroup
hidden: true
files:
  - classes/Customer.php
types:
  - frontoffice
hookTypes:
  - legacy
---

# Hook : actionCustomerBeforeUpdateGroup

Located in :

  - classes/Customer.php

## Parameters

```php
Hook::exec('actionCustomerBeforeUpdateGroup', ['id_customer' => $this->id, 'groups' => $list]);
```