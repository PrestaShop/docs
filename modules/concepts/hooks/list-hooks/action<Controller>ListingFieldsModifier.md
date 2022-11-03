---
menuTitle: action<Controller>ListingFieldsModifier
title: action<Controller>ListingFieldsModifier
hidden: true
files:
  - classes/controller/AdminController.php
types:
  - backoffice
hookTypes:
  - legacy
---

# Hook : action<Controller>ListingFieldsModifier

Located in :

  - classes/controller/AdminController.php

## Parameters

```php
Hook::exec('action' . $this->controller_name . 'ListingFieldsModifier', [
            'fields' => &$this->fields_list,
        ]);
```