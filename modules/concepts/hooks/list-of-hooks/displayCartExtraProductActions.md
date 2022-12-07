---
menuTitle: displayCartExtraProductActions
Title: displayCartExtraProductActions
hidden: true
hookTitle: Extra buttons in shopping cart
files:
  - themes/classic/templates/checkout/_partials/cart-detailed-product-line.tpl
locations:
  - frontoffice
type:
  - action
hookAliases:
---

# Hook displayCartExtraProductActions

## Information

{{% notice tip %}}
**Extra buttons in shopping cart:** 

This hook adds extra buttons to the product lines, in the shopping cart
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook type: 
  - action

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/themes/classic/templates/checkout/_partials/cart-detailed-product-line.tpl](themes/classic/templates/checkout/_partials/cart-detailed-product-line.tpl)

## Hook call in codebase

```php
{hook h='displayCartExtraProductActions' product=$product}
```