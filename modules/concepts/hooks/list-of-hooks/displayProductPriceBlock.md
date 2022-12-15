---
menuTitle: displayProductPriceBlock
Title: displayProductPriceBlock
hidden: true
hookTitle: 
files:
  - themes/classic/templates/checkout/_partials/order-confirmation-table.tpl
locations:
  - front office
type: display
hookAliases:
---

# Hook displayProductPriceBlock

## Information

Hook locations: 
  - front office

Hook type: display

Located in: 
  - [themes/classic/templates/checkout/_partials/order-confirmation-table.tpl](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/themes/classic/templates/checkout/_partials/order-confirmation-table.tpl)

## Call of the Hook in the origin file

```php
{hook h='displayProductPriceBlock' product=$product type="unit_price"}
```