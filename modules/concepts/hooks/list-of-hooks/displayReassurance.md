---
Title: displayReassurance
hidden: true
hookTitle: displayReassurance
files:
    -
      theme: classic
      url: https://github.com/PrestaShop/classic-theme/blob/develop/templates/catalog/product.tpl
      file: themes/classic/templates/catalog/product.tpl
    -
      theme: classic
      url: https://github.com/PrestaShop/classic-theme/blob/develop/templates/checkout/cart.tpl
      file: themes/classic/templates/checkout/cart.tpl
    -
      theme: classic
      url: https://github.com/PrestaShop/classic-theme/blob/develop/templates/checkout/checkout.tpl
      file: themes/classic/templates/checkout/checkout.tpl
    -
      theme: hummingbird
      url: https://github.com/PrestaShop/hummingbird/blob/develop/templates/catalog/product.tpl
      file: themes/hummingbird/templates/catalog/product.tpl
    -
      theme: hummingbird
      url: https://github.com/PrestaShop/hummingbird/blob/develop/templates/checkout/cart.tpl
      file: themes/hummingbird/templates/checkout/cart.tpl
    -
      theme: hummingbird
      url: https://github.com/PrestaShop/hummingbird/blob/develop/templates/checkout/checkout.tpl
      file: themes/hummingbird/templates/checkout/checkout.tpl

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
{hook h='displayReassurance'}
```
