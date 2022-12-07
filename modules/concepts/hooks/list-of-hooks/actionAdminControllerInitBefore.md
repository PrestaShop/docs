---
menuTitle: actionAdminControllerInitBefore
Title: actionAdminControllerInitBefore
hidden: true
hookTitle: Perform actions before admin controller initialization
files:
  - classes/controller/AdminController.php
locations:
  - backoffice
type:
  - action
hookAliases:
---

# Hook actionAdminControllerInitBefore

## Information

{{% notice tip %}}
**Perform actions before admin controller initialization:** 

This hook is launched before the initialization of all admin controllers
{{% /notice %}}

Hook locations: 
  - backoffice

Hook type: 
  - action

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/controller/AdminController.php](classes/controller/AdminController.php)

## Hook call in codebase

```php
Hook::exec(
            'actionAdminControllerInitBefore',
            [
                'controller' => $this,
            ]
        )
```