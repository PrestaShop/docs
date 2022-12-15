---
menuTitle: displayCheckoutBeforeConfirmation
Title: displayCheckoutBeforeConfirmation
hidden: true
hookTitle: Show custom content before checkout confirmation
files:
  - themes/classic/templates/checkout/_partials/steps/payment.tpl
locations:
  - front office
type: display
hookAliases:
---

# Hook displayCheckoutBeforeConfirmation

## Information

{{% notice tip %}}
**Show custom content before checkout confirmation:** 

This hook allows you to display custom content at the end of checkout process
{{% /notice %}}

Hook locations: 
  - front office

Hook type: display

Located in: 
  - [themes/classic/templates/checkout/_partials/steps/payment.tpl](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/themes/classic/templates/checkout/_partials/steps/payment.tpl)

## Call of the Hook in the origin file

```php
{hook h='displayCheckoutBeforeConfirmation'}
```