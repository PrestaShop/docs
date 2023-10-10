---
menuTitle: legacyblockkpi
Title: legacyblockkpi
hidden: true
hookTitle: 
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Resources/views/Admin/Product/CatalogPage/catalog.html.twig'
        file: src/PrestaShopBundle/Resources/views/Admin/Product/CatalogPage/catalog.html.twig
locations:
    - 'back office'
type: null
hookAliases: 
array_return: false
check_exceptions: false
chain: false
origin: core
description: ''

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
{{ renderhook('legacy_block_kpi', {'kpi_controller': 'AdminProductsController'}) }}
```
