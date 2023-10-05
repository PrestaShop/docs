---
menuTitle: displayCheckoutSubtotalDetails
Title: displayCheckoutSubtotalDetails
hidden: true
hookTitle: 
files:
  - Classic Theme: templates/checkout/_partials/cart-detailed-totals.tpl
locations:
  - front office
type: display
hookAliases:
origin: theme
---

# Hook displayCheckoutSubtotalDetails

## Information

Hook locations: 
  - front office

Hook type: display

Hook origin: theme

Located in: 
  - [Classic Theme: templates/checkout/_partials/cart-detailed-totals.tpl](https://github.com/PrestaShop/classic-theme/blob/develop/templates/checkout/_partials/cart-detailed-totals.tpl)

## Call of the Hook in the origin file

```php
{hook h='displayCheckoutSubtotalDetails' subtotal=$subtotal}
```