---
menuTitle: action<Controller>ListingFieldsModifier
Title: action<Controller>ListingFieldsModifier
hidden: true
hookTitle: 
files:
  - classes/controller/AdminController.php
locations:
  - backoffice
type:
  - action
hookAliases:
---

# Hook action<Controller>ListingFieldsModifier

## Information

Hook locations: 
  - backoffice

Hook type: 
  - action

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/controller/AdminController.php](classes/controller/AdminController.php)

## Hook call in codebase

```php
Hook::exec('action' . $this->controller_name . 'ListingFieldsModifier', [
            'fields' => &$this->fields_list,
        ])
```