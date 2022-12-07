---
menuTitle: actionAdminLoginControllerBefore
Title: actionAdminLoginControllerBefore
hidden: true
hookTitle: Perform actions before admin login controller initialization
files:
  - controllers/admin/AdminLoginController.php
locations:
  - backoffice
type:
  - action
hookAliases:
---

# Hook actionAdminLoginControllerBefore

## Information

{{% notice tip %}}
**Perform actions before admin login controller initialization:** 

This hook is launched before the initialization of the login controller
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
            'actionAdminLoginControllerBefore',
            [
                'controller' => $this,
            ]
        )
```