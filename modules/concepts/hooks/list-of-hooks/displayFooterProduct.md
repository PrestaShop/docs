---
menuTitle: displayFooterProduct
Title: displayFooterProduct
hidden: true
hookTitle: Product footer
files:
  - themes/classic/templates/catalog/product.tpl
locations:
  - front office
type: display
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
  - front office

Hook type: display

Located in: 
  - [themes/classic/templates/catalog/product.tpl](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/themes/classic/templates/catalog/product.tpl)

## Call of the Hook in the origin file

```php
{hook h='displayFooterProduct' product=$product category=$category}
```