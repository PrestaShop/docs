---
menuTitle: actionControllerInitBefore
Title: actionControllerInitBefore
hidden: true
hookTitle: Perform actions before controller initialization
files:
  - classes/controller/Controller.php
locations:
  - front office
type: action
hookAliases:
---

# Hook actionControllerInitBefore

## Information

{{% notice tip %}}
**Perform actions before controller initialization:** 

This hook is launched before the initialization of all controllers
{{% /notice %}}

Hook locations: 
  - front office

Hook type: action

Located in: 
  - [classes/controller/Controller.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/controller/Controller.php)

## Call of the Hook in the origin file

```php
Hook::exec(
            'actionControllerInitBefore',
            [
                'controller' => $this,
            ]
        )
```