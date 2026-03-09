---
Title: action<Controller>InitBefore
hidden: true
hookTitle: 
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.0.x/classes/controller/FrontController.php'
        file: classes/controller/FrontController.php
locations:
    - 'front office'
type: action
hookAliases: 
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook is called at the beginning of the initialization of a front controller, before it sets any Smarty variables, class properties, redirect depending on context, etc.'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec('action' . $this->getControllerName() . 'InitBefore', ['controller' => $this]);
```
