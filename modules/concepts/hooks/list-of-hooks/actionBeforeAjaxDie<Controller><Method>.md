---
menuTitle: actionBeforeAjaxDie<Controller><Method>
Title: actionBeforeAjaxDie<Controller><Method>
hidden: true
hookTitle: 
files:
  - classes/controller/Controller.php
locations:
  - frontoffice
type:
  - action
hookAliases:
---

# Hook actionBeforeAjaxDie<Controller><Method>

## Information

Hook locations: 
  - frontoffice

Hook type: 
  - action

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/controller/Controller.php](classes/controller/Controller.php)

## Hook call in codebase

```php
Hook::exec('actionBeforeAjaxDie' . $controller . $method, ['value' => $value])
```