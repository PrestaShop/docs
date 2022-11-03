---
menuTitle: action<ClassName><Action>After
title: action<ClassName><Action>After
hidden: true
files:
  - classes/controller/AdminController.php
types:
  - backoffice
hookTypes:
  - legacy
---

# Hook : action<ClassName><Action>After

Located in :

  - classes/controller/AdminController.php

## Parameters

```php
Hook::exec('action' . get_class($this) . ucfirst($this->action) . 'After', ['controller' => $this, 'return' => $return]);
```