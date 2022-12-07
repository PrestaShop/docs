---
menuTitle: actionFrontControllerInitBefore
Title: actionFrontControllerInitBefore
hidden: true
hookTitle: Perform actions before front office controller initialization
files:
  - classes/controller/FrontController.php
locations:
  - frontoffice
type:
  - action
hookAliases:
---

# Hook actionFrontControllerInitBefore

## Information

{{% notice tip %}}
**Perform actions before front office controller initialization:** 

This hook is launched before the initialization of all front office controllers
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook type: 
  - action

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/controller/FrontController.php](classes/controller/FrontController.php)

## Hook call in codebase

```php
Hook::exec(
            'actionFrontControllerInitBefore',
            [
                'controller' => $this,
            ]
        )
```