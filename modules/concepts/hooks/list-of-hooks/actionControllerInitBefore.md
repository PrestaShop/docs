---
menuTitle: actionControllerInitBefore
Title: actionControllerInitBefore
hidden: true
hookTitle: Perform actions before controller initialization
files:
  - classes/controller/Controller.php
locations:
  - frontoffice
type:
  - action
hookAliases:
---

# Hook actionControllerInitBefore

## Information

{{% notice tip %}}
**Perform actions before controller initialization:** 

This hook is launched before the initialization of all controllers
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook type: 
  - action

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/controller/Controller.php](classes/controller/Controller.php)

## Hook call in codebase

```php
Hook::exec(
            'actionControllerInitBefore',
            [
                'controller' => $this,
            ]
        )
```