---
menuTitle: actionAdminControllerInitBefore
Title: actionAdminControllerInitBefore
hidden: true
hookTitle: 'Perform actions before admin controller initialization'
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
description: 'This hook is launched before the initialization of all admin controllers'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec(
            'actionAdminControllerInitBefore',
            [
                'controller' => $this,
            ]
        )
```
