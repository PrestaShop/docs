---
menuTitle: actionControllerInitAfter
Title: actionControllerInitAfter
hidden: true
hookTitle: Perform actions after controller initialization
files:
  - classes/controller/Controller.php
locations:
  - front office
type: action
hookAliases:
---

# Hook actionControllerInitAfter

## Information

{{% notice tip %}}
**Perform actions after controller initialization:** 

This hook is launched after the initialization of all controllers
{{% /notice %}}

Hook locations: 
  - front office

Hook type: action

Located in: 
  - [classes/controller/Controller.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/controller/Controller.php)

## Call of the Hook in the origin file

```php
Hook::exec(
            'actionControllerInitAfter',
            [
                'controller' => $this,
            ]
        )
```