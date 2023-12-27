---
Title: displayProductListReviews
hidden: true
hookTitle: displayProductListReviews
files:
    -
      theme: classic
      url: https://github.com/PrestaShop/classic-theme/blob/develop/templates/catalog/_partials/miniatures/product.tpl
      file: themes/classic/templates/catalog/_partials/miniatures/product.tpl
    -
      theme: hummingbird
      url: https://github.com/PrestaShop/hummingbird/blob/develop/templates/catalog/_partials/miniatures/product.tpl
      file: themes/hummingbird/templates/catalog/_partials/miniatures/product.tpl

locations:
    - front office
type: display
hookAliases: 
origin: theme
array_return: false
check_exceptions: false
chain: false
description: 

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
{hook h='displayProductListReviews' product=$product}
```
