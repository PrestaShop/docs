---
menuTitle: actionBuildFrontEndObject
Title: actionBuildFrontEndObject
hidden: true
hookTitle: Manage elements added to the "prestashop" javascript object
files:
  - classes/controller/FrontController.php
locations:
  - frontoffice
types:
  - legacy
---

# Hook : actionBuildFrontEndObject

## Informations

{{% notice tip %}}
**Manage elements added to the "prestashop" javascript object:** 

This hook allows you to customize the "prestashop" javascript object that is included in all front office pages
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook types: 
  - legacy

Located in: 
  - classes/controller/FrontController.php

## Hook call with parameters

```php
Hook::exec('actionBuildFrontEndObject', [
            'obj' => &$object,
        ]);
```