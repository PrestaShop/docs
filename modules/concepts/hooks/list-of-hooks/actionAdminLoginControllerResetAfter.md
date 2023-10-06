---
menuTitle: actionAdminLoginControllerResetAfter
Title: actionAdminLoginControllerResetAfter
hidden: true
hookTitle: 'Perform actions after admin login controller reset action initialization'
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
description: 'This hook is launched after the initialization of the reset action in login controller'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec(
                        'actionAdminLoginControllerResetAfter',
                        [
                            'controller' => $this,
                            'employee' => $employee,
                        ]
                    )
```
