---
menuTitle: actionAdminLoginControllerLoginBefore
Title: actionAdminLoginControllerLoginBefore
hidden: true
hookTitle: Perform actions before admin login controller login action initialization
files:
  - controllers/admin/AdminLoginController.php
locations:
  - backoffice
type:
  - action
hookAliases:
---

# Hook actionAdminLoginControllerLoginBefore

## Information

{{% notice tip %}}
**Perform actions before admin login controller login action initialization:** 

This hook is launched before the initialization of the login action in login controller
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
            'actionAdminLoginControllerLoginBefore',
            [
                'controller' => $this,
                'password' => $passwd,
                'email' => $email,
            ]
        )
```