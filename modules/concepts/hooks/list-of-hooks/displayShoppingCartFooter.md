---
menuTitle: displayShoppingCartFooter
Title: displayShoppingCartFooter
hidden: true
hookTitle: 'Shopping cart footer'
files:
    -
        url: 'https://github.com/PrestaShop/classic-theme/blob/develop/templates/checkout/cart.tpl'
        file: 'Classic Theme: templates/checkout/cart.tpl'
locations:
    - 'front office'
type: display
hookAliases:
    - shoppingCart
origin: theme
array_return: false
check_exceptions: false
chain: false
description: "This hook displays some specific information on the shopping cart's page"

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
{hook h='displayShoppingCartFooter'}
```
