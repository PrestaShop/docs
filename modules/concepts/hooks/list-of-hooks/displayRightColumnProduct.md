---
menuTitle: displayRightColumnProduct
Title: displayRightColumnProduct
hidden: true
hookTitle: New elements on the product page (right column)
files:
  - themes/classic/templates/layouts/layout-both-columns.tpl
locations:
  - frontoffice
type:
  - display
hookAliases:
 - extraRight
---

# Hook displayRightColumnProduct

Aliases: 
 - extraRight



## Information

{{% notice tip %}}
**New elements on the product page (right column):** 

This hook displays new elements in the right-hand column of the product page
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook type: 
  - display

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/themes/classic/templates/layouts/layout-both-columns.tpl](themes/classic/templates/layouts/layout-both-columns.tpl)

## Hook call in codebase

```php
{hook h='displayRightColumnProduct'}
```