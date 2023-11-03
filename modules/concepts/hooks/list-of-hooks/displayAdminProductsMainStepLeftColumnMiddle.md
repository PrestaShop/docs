---
Title: displayAdminProductsMainStepLeftColumnMiddle
hidden: true
hookTitle: 'Display new elements in back office product page, left column of the Basic settings tab'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Resources/views/Admin/Product/ProductPage/Panels/essentials.html.twig'
        file: src/PrestaShopBundle/Resources/views/Admin/Product/ProductPage/Panels/essentials.html.twig
locations:
    - 'back office'
type: display
hookAliases: 
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook launches modules when the back office product page is displayed'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
{{ renderhook('displayAdminProductsMainStepLeftColumnMiddle', { 'id_product': productId }) }}
```
