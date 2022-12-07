---
menuTitle: actionAjaxDieBefore
Title: actionAjaxDieBefore
hidden: true
hookTitle: 
files:
  - classes/controller/Controller.php
locations:
  - frontoffice
type:
  - action
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
  - frontoffice

Hook type: 
  - action

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/controller/Controller.php](classes/controller/Controller.php)

## Hook call in codebase

```php
Hook::exec('actionAjaxDieBefore', ['controller' => $controller, 'method' => $method, 'value' => $value])
```