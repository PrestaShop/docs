---
Title: displayCheckoutSummaryTop
hidden: true
hookTitle: Cart summary top
files:
    -
      theme: classic
      url: https://github.com/PrestaShop/classic-theme/blob/develop/templates/checkout/_partials/cart-summary-top.tpl
      file: themes/classic/templates/checkout/_partials/cart-summary-top.tpl
    -
      theme: hummingbird
      url: https://github.com/PrestaShop/hummingbird/blob/develop/templates/checkout/_partials/cart-summary-top.tpl
      file: themes/hummingbird/templates/checkout/_partials/cart-summary-top.tpl

locations:
    - front office
type: display
hookAliases: 
origin: theme
array_return: false
check_exceptions: false
chain: false
description: This hook allows you to display new elements in top of cart summary

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
{hook h='displayCheckoutSummaryTop'}
```
