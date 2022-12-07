---
menuTitle: actionBuildFrontEndObject
Title: actionBuildFrontEndObject
hidden: true
hookTitle: Manage elements added to the "prestashop" javascript object
files:
  - classes/controller/FrontController.php
locations:
  - frontoffice
type:
  - action
hookAliases:
---

# Hook actionBuildFrontEndObject

## Information

{{% notice tip %}}
**Manage elements added to the "prestashop" javascript object:** 

This hook allows you to customize the "prestashop" javascript object that is included in all front office pages
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook type: 
  - action

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/controller/FrontController.php](classes/controller/FrontController.php)

## Hook call in codebase

```php
Hook::exec('actionBuildFrontEndObject', [
            'obj' => &$object,
        ])
```