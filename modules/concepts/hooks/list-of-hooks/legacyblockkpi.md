---
menuTitle: legacyblockkpi
Title: legacyblockkpi
hidden: true
hookTitle: 
files:
  - src/PrestaShopBundle/Resources/views/Admin/Product/CatalogPage/catalog.html.twig
locations:
  - back office
type: 
hookAliases:
---

# Hook legacyblockkpi

## Information

Hook locations: 
  - back office

Located in: 
  - [src/PrestaShopBundle/Resources/views/Admin/Product/CatalogPage/catalog.html.twig](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Resources/views/Admin/Product/CatalogPage/catalog.html.twig)

## Call of the Hook in the origin file

```php
{{ renderhook('legacy_block_kpi', {'kpi_controller': 'AdminProductsController'}) }}
```