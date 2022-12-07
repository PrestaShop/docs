---
menuTitle: actionAjaxDie<Controller><Method>Before
Title: actionAjaxDie<Controller><Method>Before
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

# Hook actionAjaxDie<Controller><Method>Before

## Information

Hook locations: 
  - frontoffice

Hook type: 
  - action

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/controller/Controller.php](classes/controller/Controller.php)

## Hook call in codebase

```php
Hook::exec('actionAjaxDie' . $controller . $method . 'Before', ['value' => $value])
```