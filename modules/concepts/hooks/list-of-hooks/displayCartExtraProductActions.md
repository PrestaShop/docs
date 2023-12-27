---
Title: displayCartExtraProductActions
hidden: true
hookTitle: Extra buttons in shopping cart
files:
    -
      theme: classic
      url: https://github.com/PrestaShop/classic-theme/blob/develop/templates/checkout/_partials/cart-detailed-product-line.tpl
      file: themes/classic/templates/checkout/_partials/cart-detailed-product-line.tpl
    -
      theme: hummingbird
      url: https://github.com/PrestaShop/hummingbird-theme/blob/develop/templates/checkout/_partials/cart-detailed-product-line.tpl
      file: themes/hummingbird/templates/checkout/_partials/cart-detailed-product-line.tpl

locations:
    - front office
type: action
hookAliases: 
origin: theme
array_return: false
check_exceptions: false
chain: false
description: This hook adds extra buttons to the product lines, in the shopping cart

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
{hook h='displayCartExtraProductActions' product=$product}
```
