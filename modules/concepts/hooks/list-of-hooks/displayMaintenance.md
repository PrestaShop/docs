---
menuTitle: displayMaintenance
Title: displayMaintenance
hidden: true
hookTitle: Maintenance Page
files:
  - classes/controller/FrontController.php
locations:
  - frontoffice
type:
  - display
hookAliases:
---

# Hook displayMaintenance

## Information

{{% notice tip %}}
**Maintenance Page:** 

This hook displays new elements on the maintenance page
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook type: 
  - display

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/controller/FrontController.php](classes/controller/FrontController.php)

## Hook call in codebase

```php
Hook::exec('displayMaintenance', [])
```