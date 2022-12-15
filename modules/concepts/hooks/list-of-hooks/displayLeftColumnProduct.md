---
menuTitle: displayLeftColumnProduct
Title: displayLeftColumnProduct
hidden: true
hookTitle: New elements on the product page (left column)
files:
  - themes/classic/templates/layouts/layout-both-columns.tpl
locations:
  - front office
type: display
hookAliases:
 - extraLeft
---

# Hook displayLeftColumnProduct

Aliases: 
 - extraLeft



## Information

{{% notice tip %}}
**New elements on the product page (left column):** 

This hook displays new elements in the left-hand column of the product page
{{% /notice %}}

Hook locations: 
  - front office

Hook type: display

Located in: 
  - [themes/classic/templates/layouts/layout-both-columns.tpl](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/themes/classic/templates/layouts/layout-both-columns.tpl)

## Call of the Hook in the origin file

```php
{hook h='displayLeftColumnProduct' product=$product category=$category}
```