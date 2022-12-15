---
menuTitle: displayPaymentTop
Title: displayPaymentTop
hidden: true
hookTitle: Top of payment page
files:
  - themes/classic/templates/checkout/_partials/steps/payment.tpl
locations:
  - front office
type: display
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
  - front office

Hook type: display

Located in: 
  - [themes/classic/templates/checkout/_partials/steps/payment.tpl](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/themes/classic/templates/checkout/_partials/steps/payment.tpl)

## Call of the Hook in the origin file

```php
{hook h='displayPaymentTop'}
```