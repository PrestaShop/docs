---
menuTitle: action<ClassName><Action>Before
Title: action<ClassName><Action>Before
hidden: true
hookTitle: 
files:
  - classes/controller/AdminController.php
locations:
  - back office
type: action
hookAliases:
---

# Hook action&lt;ClassName>&lt;Action>Before

## Information

Hook locations: 
  - back office

Hook type: action

Located in: 
  - [classes/controller/AdminController.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/controller/AdminController.php)

## Call of the Hook in the origin file

```php
Hook::exec('action' . get_class($this) . ucfirst($this->action) . 'Before', ['controller' => $this]);
```