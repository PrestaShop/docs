---
Title: actionFrontControllerInitContextCurrencyAfter
hidden: true
hookTitle: 'Action after initializing context currency'
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
description: 'Allows modules to modify the context currency after it has been initialized.'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec(
            'actionFrontControllerInitContextCurrencyAfter',
            [
                'controller' => $this,
            ]
        );
```
