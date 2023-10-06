---
menuTitle: actionFrontControllerInitAfter
Title: actionFrontControllerInitAfter
hidden: true
hookTitle: 'Perform actions after front office controller initialization'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/controller/FrontController.php'
        file: classes/controller/FrontController.php
locations:
    - 'front office'
type: action
hookAliases:
    - actionFrontControllerAfterInit
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook is launched after the initialization of all front office controllers'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec(
            'actionFrontControllerInitAfter',
            [
                'controller' => $this,
            ]
        )
```
