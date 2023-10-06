---
menuTitle: actionAdminLoginControllerBefore
Title: actionAdminLoginControllerBefore
hidden: true
hookTitle: 'Perform actions before admin login controller initialization'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/controllers/admin/AdminLoginController.php'
        file: controllers/admin/AdminLoginController.php
locations:
    - 'back office'
type: action
hookAliases: null
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook is launched before the initialization of the login controller'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec(
            'actionAdminLoginControllerBefore',
            [
                'controller' => $this,
            ]
        )
```
