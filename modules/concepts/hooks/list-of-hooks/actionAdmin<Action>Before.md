---
menuTitle: actionAdmin<Action>Before
Title: actionAdmin<Action>Before
hidden: true
hookTitle: 
files:
  - classes/controller/AdminController.php
locations:
  - backoffice
types:
  - legacy
---

# Hook : actionAdmin<Action>Before

## Informations

Hook locations: 
  - backoffice

Hook types: 
  - legacy

Located in: 
  - classes/controller/AdminController.php

## Hook call with parameters

```php
Hook::exec('actionAdmin' . ucfirst($this->action) . 'Before', ['controller' => $this]);
```