---
menuTitle: actionAjaxDieBefore
Title: actionAjaxDieBefore
hidden: true
hookTitle: 
files:
  - classes/controller/Controller.php
locations:
  - front office
type: action
hookAliases:
 - actionBeforeAjaxDie
---

# Hook actionAjaxDieBefore

Aliases: 
 - actionBeforeAjaxDie



## Information

{{% notice warning %}}
**Deprecated:** Since 1.6.1.1
{{% /notice %}}

Hook locations: 
  - front office

Hook type: action

Located in: 
  - [classes/controller/Controller.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/controller/Controller.php)

## Call of the Hook in the origin file

```php
Hook::exec('actionAjaxDieBefore', ['controller' => $controller, 'method' => $method, 'value' => $value])
```