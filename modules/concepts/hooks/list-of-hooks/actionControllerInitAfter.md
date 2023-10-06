---
menuTitle: actionControllerInitAfter
Title: actionControllerInitAfter
hidden: true
hookTitle: 'Perform actions after controller initialization'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/controller/Controller.php'
        file: classes/controller/Controller.php
locations:
    - 'front office'
type: action
hookAliases: null
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook is launched after the initialization of all controllers'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec(
            'actionControllerInitAfter',
            [
                'controller' => $this,
            ]
        )
```
