---
menuTitle: displayShoppingCart
Title: displayShoppingCart
hidden: true
hookTitle: 'Shopping cart - Additional button'
files:
    -
        theme: Classic
        url: 'https://github.com/PrestaShop/classic-theme/blob/develop/templates/checkout/cart.tpl'
        file: 'Classic Theme: templates/checkout/cart.tpl'
locations:
    - 'front office'
type: display
hookAliases:
    - shoppingCartExtra
origin: theme
array_return: false
check_exceptions: false
chain: false
description: 'This hook displays new action buttons within the shopping cart'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
{hook h='displayShoppingCart'}
```
