---
Title: displayExpressCheckout
hidden: true
hookTitle: displayExpressCheckout
files:
    -
      theme: classic
      url: https://github.com/PrestaShop/classic-theme/blob/develop/templates/checkout/_partials/cart-detailed-actions.tpl
      file: themes/classic/templates/checkout/_partials/cart-detailed-actions.tpl
    -
      theme: hummingbird
      url: https://github.com/PrestaShop/hummingbird/blob/develop/templates/checkout/_partials/cart-detailed-actions.tpl
      file: themes/hummingbird/templates/checkout/_partials/cart-detailed-actions.tpl

locations:
    - front office
type: display
hookAliases: 
origin: theme
array_return: false
check_exceptions: false
chain: false
description: 

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
{hook h='displayExpressCheckout'}
```
