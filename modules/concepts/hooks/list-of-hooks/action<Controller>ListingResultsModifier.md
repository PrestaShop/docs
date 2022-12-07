---
menuTitle: action<Controller>ListingResultsModifier
Title: action<Controller>ListingResultsModifier
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

# Hook action<Controller>ListingResultsModifier

## Information

Hook locations: 
  - backoffice

Hook type: 
  - action

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/controller/AdminController.php](classes/controller/AdminController.php)

## Hook call in codebase

```php
Hook::exec('action' . $this->controller_name . 'ListingResultsModifier', [
            'list' => &$this->_list,
            'list_total' => &$this->_listTotal,
        ])
```