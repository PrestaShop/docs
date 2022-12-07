---
menuTitle: displayPaymentTop
Title: displayPaymentTop
hidden: true
hookTitle: Top of payment page
files:
  - themes/classic/templates/checkout/_partials/steps/payment.tpl
locations:
  - frontoffice
type:
  - display
hookAliases:
 - paymentTop
---

# Hook displayPaymentTop

Aliases: 
 - paymentTop



## Information

{{% notice tip %}}
**Top of payment page:** 

This hook is displayed at the top of the payment page
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook type: 
  - display

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/themes/classic/templates/checkout/_partials/steps/payment.tpl](themes/classic/templates/checkout/_partials/steps/payment.tpl)

## Hook call in codebase

```php
{hook h='displayPaymentTop'}
```