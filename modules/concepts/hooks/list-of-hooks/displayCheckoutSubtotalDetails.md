---
menuTitle: displayCheckoutSubtotalDetails
Title: displayCheckoutSubtotalDetails
hidden: true
hookTitle: 
files:
    -
        theme: Classic
        url: 'https://github.com/PrestaShop/classic-theme/blob/develop/templates/checkout/_partials/cart-detailed-totals.tpl'
        file: 'Classic Theme: templates/checkout/_partials/cart-detailed-totals.tpl'
locations:
    - 'front office'
type: display
hookAliases: 
origin: theme
array_return: false
check_exceptions: false
chain: false
description: ''

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
{hook h='displayCheckoutSubtotalDetails' subtotal=$subtotal}
```
