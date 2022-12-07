---
menuTitle: displayFooterProduct
Title: displayFooterProduct
hidden: true
hookTitle: Product footer
files:
  - themes/classic/templates/catalog/product.tpl
locations:
  - frontoffice
type:
  - display
hookAliases:
 - productfooter
---

# Hook displayFooterProduct

Aliases: 
 - productfooter



## Information

{{% notice tip %}}
**Product footer:** 

This hook adds new blocks under the product's description
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook type: 
  - display

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/themes/classic/templates/catalog/product.tpl](themes/classic/templates/catalog/product.tpl)

## Hook call in codebase

```php
{hook h='displayFooterProduct' product=$product category=$category}
```