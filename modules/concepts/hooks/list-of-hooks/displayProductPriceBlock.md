---
menuTitle: displayProductPriceBlock
Title: displayProductPriceBlock
hidden: true
hookTitle: 
files:
  - themes/classic/templates/checkout/_partials/order-confirmation-table.tpl
locations:
  - frontoffice
type:
  - display
hookAliases:
---

# Hook displayProductPriceBlock

## Information

Hook locations: 
  - frontoffice

Hook type: 
  - display

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/themes/classic/templates/checkout/_partials/order-confirmation-table.tpl](themes/classic/templates/checkout/_partials/order-confirmation-table.tpl)

## Hook call in codebase

```php
{hook h='displayProductPriceBlock' product=$product type="unit_price"}
```