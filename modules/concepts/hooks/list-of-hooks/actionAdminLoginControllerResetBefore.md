---
menuTitle: actionAdminLoginControllerResetBefore
Title: actionAdminLoginControllerResetBefore
hidden: true
hookTitle: Perform actions before admin login controller reset action initialization
files:
  - controllers/admin/AdminLoginController.php
locations:
  - backoffice
type:
  - action
hookAliases:
---

# Hook actionAdminLoginControllerResetBefore

## Information

{{% notice tip %}}
**Perform actions before admin login controller reset action initialization:** 

This hook is launched before the initialization of the reset action in login controller
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
            'actionAdminLoginControllerResetBefore',
            [
                'controller' => $this,
                'reset_token_value' => $reset_token_value,
                'id_employee' => $id_employee,
                'reset_email' => $reset_email,
                'reset_password' => $reset_password,
                'reset_confirm' => $reset_confirm,
            ]
        )
```