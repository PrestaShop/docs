---
menuTitle: actionAdmin<Action>After
title: actionAdmin<Action>After
hidden: true
files:
  - classes/controller/AdminController.php
types:
  - backoffice
hookTypes:
  - legacy
---

# Hook : actionAdmin<Action>After

Located in :

  - classes/controller/AdminController.php

## Parameters

```php
Hook::exec('actionAdmin' . ucfirst($this->action) . 'After', ['controller' => $this, 'return' => $return]);
```