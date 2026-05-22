---
Title: displayCartExtraProductInfo
hidden: true
hookTitle: 'Extra information in shopping cart product line'
files:
    -
      theme: hummingbird
      url: https://github.com/PrestaShop/hummingbird/blob/develop/templates/checkout/_partials/cart-detailed-product-line.tpl
      file: themes/hummingbird/templates/checkout/_partials/cart-detailed-product-line.tpl
locations:
    - 'front office'
type: display
hookAliases: 
array_return: false
check_exceptions: false
chain: false
origin: theme
description: 'This hook adds extra information to the product lines, in the shopping cart'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
{hook h='displayCartExtraProductInfo' product=$product}
```
