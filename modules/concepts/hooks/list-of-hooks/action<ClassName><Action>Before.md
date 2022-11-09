---
menuTitle: action<ClassName><Action>Before
Title: action<ClassName><Action>Before
hidden: true
hookTitle: 
files:
  - classes/controller/AdminController.php
locations:
  - backoffice
types:
  - legacy
---

# Hook : action<ClassName><Action>Before

## Informations

Hook locations: 
  - backoffice

Hook types: 
  - legacy

Located in: 
  - classes/controller/AdminController.php

## Hook call with parameters

```php
Hook::exec('action' . get_class($this) . ucfirst($this->action) . 'Before', ['controller' => $this]);
```