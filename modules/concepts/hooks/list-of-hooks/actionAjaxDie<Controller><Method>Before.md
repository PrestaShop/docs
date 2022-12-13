---
menuTitle: actionAjaxDie<Controller><Method>Before
Title: actionAjaxDie<Controller><Method>Before
hidden: true
hookTitle: 
files:
  - classes/controller/Controller.php
locations:
  - front office
type: action
hookAliases:
---

# Hook actionAjaxDie&lt;Controller>&lt;Method>Before

## Information

Hook locations: 
  - front office

Hook type: action

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/controller/Controller.php](classes/controller/Controller.php)

## Call of the Hook in the origin file

```php
Hook::exec('actionAjaxDie' . $controller . $method . 'Before', ['value' => $value])
```