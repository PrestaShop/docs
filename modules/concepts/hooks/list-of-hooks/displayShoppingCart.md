---
menuTitle: displayShoppingCart
Title: displayShoppingCart
hidden: true
hookTitle: Shopping cart - Additional button
files:
  - Classic Theme: templates/checkout/cart.tpl
locations:
  - front office
type: display
hookAliases:
 - shoppingCartExtra
origin: theme
---

# Hook displayShoppingCart

## Aliases
 
 - shoppingCartExtra

## Information

{{% notice tip %}}
**Shopping cart - Additional button:** 

This hook displays new action buttons within the shopping cart
{{% /notice %}}

Hook locations: 
  - front office

Hook type: display

Hook origin: theme

Located in: 
  - [Classic Theme: templates/checkout/cart.tpl](https://github.com/PrestaShop/classic-theme/blob/develop/templates/checkout/cart.tpl)

## Call of the Hook in the origin file

```php
{hook h='displayShoppingCart'}
```