---
menuTitle: displayProductActions
Title: displayProductActions
hidden: true
hookTitle: Display additional action button on the product page
files:
  - themes/classic/templates/catalog/_partials/product-add-to-cart.tpl
locations:
  - frontoffice
type:
  - action
hookAliases:
---

# Hook displayProductActions

## Information

{{% notice tip %}}
**Display additional action button on the product page:** 

This hook allow additional actions to be triggered, near the add to cart button.
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook type: 
  - action

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/themes/classic/templates/catalog/_partials/product-add-to-cart.tpl](themes/classic/templates/catalog/_partials/product-add-to-cart.tpl)

## Hook call in codebase

```php
{hook h='displayProductActions' product=$product}
```