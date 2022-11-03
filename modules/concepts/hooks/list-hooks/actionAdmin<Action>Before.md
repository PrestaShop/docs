---
menuTitle: actionAdmin<Action>Before
title: actionAdmin<Action>Before
hidden: true
files:
  - classes/controller/AdminController.php
types:
  - backoffice
hookTypes:
  - legacy
---

# Hook : actionAdmin<Action>Before

Located in :

  - classes/controller/AdminController.php

## Parameters

```php
Hook::exec('actionAdmin' . ucfirst($this->action) . 'Before', ['controller' => $this]);
```