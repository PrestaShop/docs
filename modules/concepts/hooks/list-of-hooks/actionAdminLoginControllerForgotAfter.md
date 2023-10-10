---
menuTitle: actionAdminLoginControllerForgotAfter
Title: actionAdminLoginControllerForgotAfter
hidden: true
hookTitle: 'Perform actions after admin login controller forgot action initialization'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/controllers/admin/AdminLoginController.php'
        file: controllers/admin/AdminLoginController.php
locations:
    - 'back office'
type: action
hookAliases: 
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook is launched after the initialization of the forgot action in login controller'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec(
                    'actionAdminLoginControllerForgotAfter',
                    [
                        'controller' => $this,
                        'employee' => $employee,
                    ]
                )
```
