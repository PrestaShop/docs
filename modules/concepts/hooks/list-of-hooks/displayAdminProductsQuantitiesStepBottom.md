---
menuTitle: displayAdminProductsQuantitiesStepBottom
Title: displayAdminProductsQuantitiesStepBottom
hidden: true
hookTitle: 'Display new elements in back office product page, Quantities/Combinations tab'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Resources/views/Admin/Product/ProductPage/Panels/combinations.html.twig'
        file: src/PrestaShopBundle/Resources/views/Admin/Product/ProductPage/Panels/combinations.html.twig
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
{{ renderhook('displayAdminProductsQuantitiesStepBottom', { 'id_product': productId }) }}
```

## Example implementation

This hook has been implemented as an example in our [modules examples repository - demovieworderhooks](https://github.com/PrestaShop/example-modules/tree/master/demovieworderhooks).
