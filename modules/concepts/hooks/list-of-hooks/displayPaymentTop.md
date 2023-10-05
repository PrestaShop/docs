---
menuTitle: displayPaymentTop
Title: displayPaymentTop
hidden: true
hookTitle: Top of payment page
files:
  - Classic Theme: templates/checkout/_partials/steps/payment.tpl
locations:
  - front office
type: display
hookAliases:
 - paymentTop
origin: theme
---

# Hook displayPaymentTop

## Aliases
 
 - paymentTop

## Information

{{% notice tip %}}
**Top of payment page:** 

This hook is displayed at the top of the payment page
{{% /notice %}}

Hook locations: 
  - front office

Hook type: display

Hook origin: theme

Located in: 
  - [Classic Theme: templates/checkout/_partials/steps/payment.tpl](https://github.com/PrestaShop/classic-theme/blob/develop/templates/checkout/_partials/steps/payment.tpl)

## Call of the Hook in the origin file

```php
{hook h='displayPaymentTop'}
```