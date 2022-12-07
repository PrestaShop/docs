---
menuTitle: displayLeftColumnProduct
Title: displayLeftColumnProduct
hidden: true
hookTitle: New elements on the product page (left column)
files:
  - themes/classic/templates/layouts/layout-both-columns.tpl
locations:
  - frontoffice
type:
  - display
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
  - frontoffice

Hook type: 
  - display

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/themes/classic/templates/layouts/layout-both-columns.tpl](themes/classic/templates/layouts/layout-both-columns.tpl)

## Hook call in codebase

```php
{hook h='displayLeftColumnProduct' product=$product category=$category}
```