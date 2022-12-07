---
menuTitle: displayShoppingCart
Title: displayShoppingCart
hidden: true
hookTitle: Shopping cart - Additional button
files:
  - themes/classic/templates/checkout/cart.tpl
locations:
  - frontoffice
type:
  - display
hookAliases:
 - shoppingCartExtra
---

# Hook displayShoppingCart

Aliases: 
 - shoppingCartExtra



## Information

{{% notice tip %}}
**Shopping cart - Additional button:** 

This hook displays new action buttons within the shopping cart
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook type: 
  - display

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/themes/classic/templates/checkout/cart.tpl](themes/classic/templates/checkout/cart.tpl)

## Hook call in codebase

```php
{hook h='displayShoppingCart'}
```