---
menuTitle: displayCheckoutSummaryTop
Title: displayCheckoutSummaryTop
hidden: true
hookTitle: Cart summary top
files:
  - themes/classic/templates/checkout/_partials/cart-summary-top.tpl
locations:
  - front office
type: display
hookAliases:
---

# Hook displayCheckoutSummaryTop

## Information

{{% notice tip %}}
**Cart summary top:** 

This hook allows you to display new elements in top of cart summary
{{% /notice %}}

Hook locations: 
  - front office

Hook type: display

Located in: 
  - [themes/classic/templates/checkout/_partials/cart-summary-top.tpl](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/themes/classic/templates/checkout/_partials/cart-summary-top.tpl)

## Call of the Hook in the origin file

```php
{hook h='displayCheckoutSummaryTop'}
```