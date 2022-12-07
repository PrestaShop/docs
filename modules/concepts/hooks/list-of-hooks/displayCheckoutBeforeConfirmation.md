---
menuTitle: displayCheckoutBeforeConfirmation
Title: displayCheckoutBeforeConfirmation
hidden: true
hookTitle: Show custom content before checkout confirmation
files:
  - themes/classic/templates/checkout/_partials/steps/payment.tpl
locations:
  - frontoffice
type:
  - display
hookAliases:
---

# Hook displayCheckoutBeforeConfirmation

## Information

{{% notice tip %}}
**Show custom content before checkout confirmation:** 

This hook allows you to display custom content at the end of checkout process
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook type: 
  - display

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/themes/classic/templates/checkout/_partials/steps/payment.tpl](themes/classic/templates/checkout/_partials/steps/payment.tpl)

## Hook call in codebase

```php
{hook h='displayCheckoutBeforeConfirmation'}
```