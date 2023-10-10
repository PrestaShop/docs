---
menuTitle: action<ClassName><Action>After
Title: action<ClassName><Action>After
hidden: true
hookTitle: 
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/controller/AdminController.php'
        file: classes/controller/AdminController.php
locations:
    - 'back office'
type: action
hookAliases: 
array_return: false
check_exceptions: false
chain: false
origin: core
description: ''

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec('action' . get_class($this) . ucfirst($this->action) . 'After', ['controller' => $this, 'return' => $return]);
```
