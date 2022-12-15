---
menuTitle: displayShoppingCart
Title: displayShoppingCart
hidden: true
hookTitle: Shopping cart - Additional button
files:
  - themes/classic/templates/checkout/cart.tpl
locations:
  - front office
type: display
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
  - front office

Hook type: display

Located in: 
  - [themes/classic/templates/checkout/cart.tpl](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/themes/classic/templates/checkout/cart.tpl)

## Call of the Hook in the origin file

```php
{hook h='displayShoppingCart'}
```