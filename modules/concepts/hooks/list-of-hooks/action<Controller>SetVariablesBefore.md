---
Title: action<Controller>SetVariablesBefore
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
description: 'This hook is called before a Front Controller starts to set commonly used variables, that are going to be assigned to Smarty. You can add/edit/remove variables from the array passed by reference..'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec('action' . $this->getControllerName() . 'SetVariablesBefore',
    [
        'templateVars' => &$templateVars,
        'cart' => $cart,
    ]
);
```
