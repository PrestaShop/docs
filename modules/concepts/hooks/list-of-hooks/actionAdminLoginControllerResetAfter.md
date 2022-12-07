---
menuTitle: actionAdminLoginControllerResetAfter
Title: actionAdminLoginControllerResetAfter
hidden: true
hookTitle: Perform actions after admin login controller reset action initialization
files:
  - controllers/admin/AdminLoginController.php
locations:
  - backoffice
type:
  - action
hookAliases:
---

# Hook actionAdminLoginControllerResetAfter

## Information

{{% notice tip %}}
**Perform actions after admin login controller reset action initialization:** 

This hook is launched after the initialization of the reset action in login controller
{{% /notice %}}

Hook locations: 
  - backoffice

Hook type: 
  - action

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/controllers/admin/AdminLoginController.php](controllers/admin/AdminLoginController.php)

## Hook call in codebase

```php
Hook::exec(
                        'actionAdminLoginControllerResetAfter',
                        [
                            'controller' => $this,
                            'employee' => $employee,
                        ]
                    )
```