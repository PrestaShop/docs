---
menuTitle: displayShoppingCartFooter
Title: displayShoppingCartFooter
hidden: true
hookTitle: Shopping cart footer
files:
  - Classic Theme: templates/checkout/cart.tpl
locations:
  - front office
type: display
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
  - front office

Hook type: display

Located in: 
  - [Classic Theme: templates/checkout/cart.tpl](https://github.com/PrestaShop/classic-theme/blob/develop/templates/checkout/cart.tpl)

## Call of the Hook in the origin file

```php
{hook h='displayShoppingCartFooter'}
```