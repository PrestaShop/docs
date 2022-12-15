---
menuTitle: actionBeforeAjaxDie<Controller><Method>
Title: actionBeforeAjaxDie<Controller><Method>
hidden: true
hookTitle: 
files:
  - classes/controller/Controller.php
locations:
  - front office
type: action
hookAliases:
---

# Hook actionBeforeAjaxDie&lt;Controller>&lt;Method>

## Information

Hook locations: 
  - front office

Hook type: action

Located in: 
  - [classes/controller/Controller.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/controller/Controller.php)

## Call of the Hook in the origin file

```php
Hook::exec('actionBeforeAjaxDie' . $controller . $method, ['value' => $value])
```