---
menuTitle: displayCartExtraProductActions
Title: displayCartExtraProductActions
hidden: true
hookTitle: Extra buttons in shopping cart
files:
  - themes/classic/templates/checkout/_partials/cart-detailed-product-line.tpl
locations:
  - frontoffice
types:
  - smarty
---

# Hook : displayCartExtraProductActions

## Informations

{{% notice tip %}}
**Extra buttons in shopping cart:** 

This hook adds extra buttons to the product lines, in the shopping cart
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook types: 
  - smarty

Located in: 
  - themes/classic/templates/checkout/_partials/cart-detailed-product-line.tpl

## Hook call with parameters

```php
{hook h='displayCartExtraProductActions' product=$product}
```