---
Title: displayCheckoutBeforeConfirmation
hidden: true
hookTitle: Show custom content before checkout confirmation
files:
    -
      theme: classic
      url: https://github.com/PrestaShop/classic-theme/blob/develop/templates/checkout/_partials/steps/payment.tpl
      file: themes/classic/templates/checkout/_partials/steps/payment.tpl
    -
      theme: hummingbird
      url: https://github.com/PrestaShop/hummingbird/blob/develop/templates/checkout/_partials/steps/payment.tpl
      file: themes/hummingbird/templates/checkout/_partials/steps/payment.tpl

locations:
    - front office
type: display
hookAliases: 
origin: theme
array_return: false
check_exceptions: false
chain: false
description: This hook allows you to display custom content at the end of checkout process

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
{hook h='displayCheckoutBeforeConfirmation'}
```
