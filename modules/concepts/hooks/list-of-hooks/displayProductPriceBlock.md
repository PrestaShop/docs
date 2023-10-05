---
menuTitle: displayProductPriceBlock
Title: displayProductPriceBlock
hidden: true
hookTitle: 
files:
  - Classic Theme: templates/checkout/_partials/order-confirmation-table.tpl
locations:
  - front office
type: display
hookAliases:
origin: theme
---

# Hook displayProductPriceBlock

## Information

Hook locations: 
  - front office

Hook type: display

Hook origin: theme

Located in: 
  - [Classic Theme: templates/checkout/_partials/order-confirmation-table.tpl](https://github.com/PrestaShop/classic-theme/blob/develop/templates/checkout/_partials/order-confirmation-table.tpl)

## Call of the Hook in the origin file

```php
{hook h='displayProductPriceBlock' product=$product type="unit_price"}
```