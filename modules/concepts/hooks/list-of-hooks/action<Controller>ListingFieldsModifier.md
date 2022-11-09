---
menuTitle: action<Controller>ListingFieldsModifier
Title: action<Controller>ListingFieldsModifier
hidden: true
hookTitle: 
files:
  - classes/controller/AdminController.php
locations:
  - backoffice
types:
  - legacy
---

# Hook : action<Controller>ListingFieldsModifier

## Informations

Hook locations: 
  - backoffice

Hook types: 
  - legacy

Located in: 
  - classes/controller/AdminController.php

## Hook call with parameters

```php
Hook::exec('action' . $this->controller_name . 'ListingFieldsModifier', [
            'fields' => &$this->fields_list,
        ]);
```