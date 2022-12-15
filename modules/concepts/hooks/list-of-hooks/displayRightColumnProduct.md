---
menuTitle: displayRightColumnProduct
Title: displayRightColumnProduct
hidden: true
hookTitle: New elements on the product page (right column)
files:
  - themes/classic/templates/layouts/layout-both-columns.tpl
locations:
  - front office
type: display
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
  - front office

Hook type: display

Located in: 
  - [themes/classic/templates/layouts/layout-both-columns.tpl](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/themes/classic/templates/layouts/layout-both-columns.tpl)

## Call of the Hook in the origin file

```php
{hook h='displayRightColumnProduct'}
```