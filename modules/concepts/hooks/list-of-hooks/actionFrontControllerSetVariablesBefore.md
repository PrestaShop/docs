---
Title: actionFrontControllerSetVariablesBefore
hidden: true
hookTitle: 'Add general purpose variables in JavaScript object and Smarty templates before assignation.'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/classes/controller/FrontController.php'
        file: classes/controller/FrontController.php
locations:
    - 'front office'
type: action
hookAliases: 
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'Allows defining variables for the JavaScript object before the core does it.'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
'actionFrontControllerSetVariablesBefore',
            [
                'templateVars' => &$templateVars,
                'cart' => $cart,
            ]
        );
```
