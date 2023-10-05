---
menuTitle: displayCheckoutSummaryTop
Title: displayCheckoutSummaryTop
hidden: true
hookTitle: Cart summary top
files:
  - Classic Theme: templates/checkout/_partials/cart-summary-top.tpl
locations:
  - front office
type: display
hookAliases:
origin: theme
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

Hook origin: theme

Located in: 
  - [Classic Theme: templates/checkout/_partials/cart-summary-top.tpl](https://github.com/PrestaShop/classic-theme/blob/develop/templates/checkout/_partials/cart-summary-top.tpl)

## Call of the Hook in the origin file

```php
{hook h='displayCheckoutSummaryTop'}
```