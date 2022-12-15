---
menuTitle: displayHeader
Title: displayHeader
hidden: true
hookTitle: Pages html head section
files:
  - classes/controller/FrontController.php
locations:
  - front office
type: display
hookAliases:
 - Header
---

# Hook displayHeader

Aliases: 
 - Header



## Information

{{% notice tip %}}
**Pages html head section:** 

This hook adds additional elements in the head section of your pages (head section of html)
{{% /notice %}}

Hook locations: 
  - front office

Hook type: display

Located in: 
  - [classes/controller/FrontController.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/controller/FrontController.php)

## Call of the Hook in the origin file

```php
Hook::exec('displayHeader')
```