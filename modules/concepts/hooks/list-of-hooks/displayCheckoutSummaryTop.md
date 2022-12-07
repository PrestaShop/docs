---
menuTitle: displayCheckoutSummaryTop
Title: displayCheckoutSummaryTop
hidden: true
hookTitle: Cart summary top
files:
  - themes/classic/templates/checkout/_partials/cart-summary-top.tpl
locations:
  - frontoffice
type:
  - display
hookAliases:
---

# Hook displayCheckoutSummaryTop

## Information

{{% notice tip %}}
**Cart summary top:** 

This hook allows you to display new elements in top of cart summary
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook type: 
  - display

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/themes/classic/templates/checkout/_partials/cart-summary-top.tpl](themes/classic/templates/checkout/_partials/cart-summary-top.tpl)

## Hook call in codebase

```php
{hook h='displayCheckoutSummaryTop'}
```