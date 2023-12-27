---
Title: displayPaymentTop
hidden: true
hookTitle: Top of payment page
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
    - paymentTop 
origin: theme
array_return: false
check_exceptions: false
chain: false
description: This hook is displayed at the top of the payment page

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
{hook h='displayPaymentTop'}
```
