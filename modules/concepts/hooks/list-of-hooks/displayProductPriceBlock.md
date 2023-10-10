---
menuTitle: displayProductPriceBlock
Title: displayProductPriceBlock
hidden: true
hookTitle: 
files:
    -
        theme: Classic
        url: 'https://github.com/PrestaShop/classic-theme/blob/develop/templates/checkout/_partials/order-confirmation-table.tpl'
        file: 'Classic Theme: templates/checkout/_partials/order-confirmation-table.tpl'
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
{hook h='displayProductPriceBlock' product=$product type="unit_price"}
```
