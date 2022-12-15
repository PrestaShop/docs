---
menuTitle: actionAdminLoginControllerResetAfter
Title: actionAdminLoginControllerResetAfter
hidden: true
hookTitle: Perform actions after admin login controller reset action initialization
files:
  - controllers/admin/AdminLoginController.php
locations:
  - back office
type: action
hookAliases:
---

# Hook actionAdminLoginControllerResetAfter

## Information

{{% notice tip %}}
**Perform actions after admin login controller reset action initialization:** 

This hook is launched after the initialization of the reset action in login controller
{{% /notice %}}

Hook locations: 
  - back office

Hook type: action

Located in: 
  - [controllers/admin/AdminLoginController.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/controllers/admin/AdminLoginController.php)

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