---
Title: actionProductOutOfStock
hidden: true
hookTitle: Out-of-stock product
files:
    -
      theme: classic
      url: https://github.com/PrestaShop/classic-theme/blob/develop/templates/catalog/_partials/product-details.tpl
      file: themes/classic/templates/catalog/_partials/product-details.tpl
    -
      theme: hummingbird
      url: https://github.com/PrestaShop/hummingbird/blob/develop/templates/catalog/product.tpl
      file: themes/hummingbird/templates/catalog/product.tpl

locations:
    - front office
type: action
hookAliases:
    - productOutOfStock 
origin: theme
array_return: false
check_exceptions: false
chain: false
description: This hook displays new action buttons if a product is out of stock

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
{hook h='actionProductOutOfStock' product=$product}
```
