---
menuTitle: displayAdminProductsExtra
Title: displayAdminProductsExtra
hidden: true
hookTitle: 'Display new elements in back office product page, Extra tab'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Resources/views/Admin/Product/ProductPage/product.html.twig'
        file: src/PrestaShopBundle/Resources/views/Admin/Product/ProductPage/product.html.twig
locations:
    - 'back office'
type: display
hookAliases: 
hasExample: true
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook launches modules when the back office product page is displayed'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
{% set hooks = renderhooksarray('displayAdminProductsExtra', { 'id_product': id_product }) %}
```

## Example implementation

This hook has been implemented as an example in our [modules examples repository - demoproductform](https://github.com/PrestaShop/example-modules/tree/master/demoproductform).
