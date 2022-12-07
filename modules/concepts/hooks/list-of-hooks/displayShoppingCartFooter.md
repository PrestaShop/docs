---
menuTitle: displayShoppingCartFooter
Title: displayShoppingCartFooter
hidden: true
hookTitle: Shopping cart footer
files:
  - themes/classic/templates/checkout/cart.tpl
locations:
  - frontoffice
type:
  - display
hookAliases:
 - shoppingCart
---

# Hook displayShoppingCartFooter

Aliases: 
 - shoppingCart



## Information

{{% notice tip %}}
**Shopping cart footer:** 

This hook displays some specific information on the shopping cart's page
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook type: 
  - display

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/themes/classic/templates/checkout/cart.tpl](themes/classic/templates/checkout/cart.tpl)

## Hook call in codebase

```php
{hook h='displayShoppingCartFooter'}
```