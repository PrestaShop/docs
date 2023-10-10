---
menuTitle: displayFooterCategory
Title: displayFooterCategory
hidden: true
hookTitle: 'This hook adds new blocks under the products listing in a category/search'
files:
    -
        theme: Classic
        url: 'https://github.com/PrestaShop/classic-theme/blob/2.0.x/templates/catalog/listing/product-list.tpl'
        file: 'Classic Theme: templates/catalog/listing/product-list.tpl'
locations:
    - 'front office'
type: display
origin: theme
array_return: false
check_exceptions: false
chain: false
description: 'This hook adds new blocks under the products listing in a category/search'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
{hook h="displayFooterCategory"}
```
