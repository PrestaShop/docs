---
menuTitle: displayProductActions
Title: displayProductActions
hidden: true
hookTitle: Display additional action button on the product page
files:
  - themes/classic/templates/catalog/_partials/product-add-to-cart.tpl
locations:
  - frontoffice
types:
  - smarty
---

# Hook : displayProductActions

## Informations

{{% notice tip %}}
**Display additional action button on the product page:** 

This hook allow additional actions to be triggered, near the add to cart button.
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook types: 
  - smarty

Located in: 
  - themes/classic/templates/catalog/_partials/product-add-to-cart.tpl

## Hook call with parameters

```php
{hook h='displayProductActions' product=$product}
```