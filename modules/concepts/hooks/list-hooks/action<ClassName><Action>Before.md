---
menuTitle: action<ClassName><Action>Before
title: action<ClassName><Action>Before
hidden: true
files:
  - classes/controller/AdminController.php
types:
  - backoffice
hookTypes:
  - legacy
---

# Hook : action<ClassName><Action>Before

Located in :

  - classes/controller/AdminController.php

## Parameters

```php
Hook::exec('action' . get_class($this) . ucfirst($this->action) . 'Before', ['controller' => $this]);
```