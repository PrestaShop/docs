---
menuTitle: displayTop
Title: displayTop
hidden: true
hookTitle: Top of pages
files:
  - themes/classic/templates/checkout/_partials/header.tpl
locations:
  - frontoffice
type:
  - display
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
  - frontoffice

Hook type: 
  - display

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/themes/classic/templates/checkout/_partials/header.tpl](themes/classic/templates/checkout/_partials/header.tpl)

## Hook call in codebase

```php
{hook h='displayTop'}
```