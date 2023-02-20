---
menuTitle: displaybackOfficeTop
Title: displaybackOfficeTop
hidden: true
hookTitle: Administration panel hover the tabs
files:
  - classes/controller/AdminController.php
locations:
  - back office
type: display
hookAliases:
 - backOfficeTop
---

# Hook displaybackOfficeTop

Aliases: 
 - backOfficeTop



## Information

{{% notice tip %}}
**Administration panel hover the tabs:** 

This hook is displayed on the roll hover of the tabs within the admin panel
{{% /notice %}}

Hook locations: 
  - back office

Hook type: display

Located in: 
  - [classes/controller/AdminController.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/controller/AdminController.php)

## Call of the Hook in the origin file

```php
Hook::exec('displaybackOfficeTop')
```
