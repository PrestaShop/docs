---
menuTitle: action<ClassName><Action>After
Title: action<ClassName><Action>After
hidden: true
hookTitle: 
files:
  - classes/controller/AdminController.php
locations:
  - back office
type: action
hookAliases:
---

# Hook action&lt;ClassName>&lt;Action>After

## Information

Hook locations: 
  - back office

Hook type: action

Located in: 
  - [classes/controller/AdminController.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/controller/AdminController.php)

## Call of the Hook in the origin file

```php
Hook::exec('action' . get_class($this) . ucfirst($this->action) . 'After', ['controller' => $this, 'return' => $return]);
```