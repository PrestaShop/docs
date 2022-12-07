---
menuTitle: actionControllerInitAfter
Title: actionControllerInitAfter
hidden: true
hookTitle: Perform actions after controller initialization
files:
  - classes/controller/Controller.php
locations:
  - frontoffice
type:
  - action
hookAliases:
---

# Hook actionControllerInitAfter

## Information

{{% notice tip %}}
**Perform actions after controller initialization:** 

This hook is launched after the initialization of all controllers
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
            'actionControllerInitAfter',
            [
                'controller' => $this,
            ]
        )
```