---
Title: displayCartBelowSummary
hidden: true
hookTitle: 'Display content below summary on cart page'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.2.x/themes/hummingbird/templates/checkout/cart.tpl'
        file: themes/hummingbird/templates/checkout/cart.tpl
locations:
    - 'front office'
type: display
hookAliases: 
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'Allows you to display content on front office cart page, below the totals summary.'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
{hook h='displayCartBelowSummary'};
```
