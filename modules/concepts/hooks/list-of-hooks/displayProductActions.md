---
Title: displayProductActions
hidden: true
hookTitle: Display additional action button on the product page
files:
    -
      theme: classic
      url: https://github.com/PrestaShop/classic-theme/blob/develop/templates/catalog/_partials/product-add-to-cart.tpl
      file: themes/classic/templates/catalog/_partials/product-add-to-cart.tpl
    -
      theme: hummingbird
      url: https://github.com/PrestaShop/hummingbird/blob/develop/templates/catalog/_partials/product-add-to-cart.tpl
      file: themes/hummingbird/templates/catalog/_partials/product-add-to-cart.tpl

locations:
    - front office
type: action
hookAliases: 
origin: theme
array_return: false
check_exceptions: false
chain: false
description: This hook allow additional actions to be triggered, near the add to cart button.

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
{hook h='displayProductActions' product=$product}
```
