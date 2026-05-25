---
Title: displayHeaderCategory
hidden: true
hookTitle: 'Footer above of the product list'
files:
    -
      theme: hummingbird
      url: https://github.com/PrestaShop/hummingbird/blob/develop/templates/catalog/listing/product-list.tpl
      file: themes/hummingbird/templates/catalog/listing/product-list.tpl
    -
      theme: classic
      url: https://github.com/PrestaShop/classic-theme/blob/develop/templates/catalog/listing/product-list.tpl
      file: themes/classic/templates/catalog/listing/product-list.tpl
locations:
    - 'front office'
type: display
origin: theme
array_return: false
check_exceptions: false
chain: false
description: 'This hook adds new blocks above the products listing in a category/search'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
{hook h='displayHeaderCategory'}
```
