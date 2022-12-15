---
menuTitle: actionAdminControllerInitAfter
Title: actionAdminControllerInitAfter
hidden: true
hookTitle: Perform actions after admin controller initialization
files:
  - classes/controller/AdminController.php
locations:
  - back office
type: action
hookAliases:
---

# Hook actionAdminControllerInitAfter

## Information

{{% notice tip %}}
**Perform actions after admin controller initialization:** 

This hook is launched after the initialization of all admin controllers
{{% /notice %}}

Hook locations: 
  - back office

Hook type: action

Located in: 
  - [classes/controller/AdminController.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/controller/AdminController.php)

## Call of the Hook in the origin file

```php
Hook::exec(
            'actionAdminControllerInitAfter',
            [
                'controller' => $this,
            ]
        )
```