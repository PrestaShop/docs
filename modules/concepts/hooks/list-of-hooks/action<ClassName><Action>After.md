---
menuTitle: action<ClassName><Action>After
Title: action<ClassName><Action>After
hidden: true
hookTitle: 
files:
  - classes/controller/AdminController.php
locations:
  - backoffice
types:
  - legacy
---

# Hook : action<ClassName><Action>After

## Informations

Hook locations: 
  - backoffice

Hook types: 
  - legacy

Located in: 
  - classes/controller/AdminController.php

## Hook call with parameters

```php
Hook::exec('action' . get_class($this) . ucfirst($this->action) . 'After', ['controller' => $this, 'return' => $return]);
```