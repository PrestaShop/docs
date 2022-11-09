---
menuTitle: displayCheckoutBeforeConfirmation
Title: displayCheckoutBeforeConfirmation
hidden: true
hookTitle: Show custom content before checkout confirmation
files:
  - themes/classic/templates/checkout/_partials/steps/payment.tpl
locations:
  - frontoffice
types:
  - smarty
---

# Hook : displayCheckoutBeforeConfirmation

## Informations

{{% notice tip %}}
**Show custom content before checkout confirmation:** 

This hook allows you to display custom content at the end of checkout process
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook types: 
  - smarty

Located in: 
  - themes/classic/templates/checkout/_partials/steps/payment.tpl

## Hook call with parameters

```php
{hook h='displayCheckoutBeforeConfirmation'}
```