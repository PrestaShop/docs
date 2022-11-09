---
menuTitle: actionAdmin<Action>After
Title: actionAdmin<Action>After
hidden: true
hookTitle: 
files:
  - classes/controller/AdminController.php
locations:
  - backoffice
types:
  - legacy
---

# Hook : actionAdmin<Action>After

## Informations

Hook locations: 
  - backoffice

Hook types: 
  - legacy

Located in: 
  - classes/controller/AdminController.php

## Hook call with parameters

```php
Hook::exec('actionAdmin' . ucfirst($this->action) . 'After', ['controller' => $this, 'return' => $return]);
```