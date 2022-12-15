---
menuTitle: displayTop
Title: displayTop
hidden: true
hookTitle: Top of pages
files:
  - themes/classic/templates/checkout/_partials/header.tpl
locations:
  - front office
type: display
hookAliases:
 - top
---

# Hook displayTop

Aliases: 
 - top



## Information

{{% notice tip %}}
**Top of pages:** 

This hook displays additional elements at the top of your pages
{{% /notice %}}

Hook locations: 
  - front office

Hook type: display

Located in: 
  - [themes/classic/templates/checkout/_partials/header.tpl](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/themes/classic/templates/checkout/_partials/header.tpl)

## Call of the Hook in the origin file

```php
{hook h='displayTop'}
```