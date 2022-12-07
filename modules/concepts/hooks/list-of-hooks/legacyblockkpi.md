---
menuTitle: legacyblockkpi
Title: legacyblockkpi
hidden: true
hookTitle: 
files:
  - src/PrestaShopBundle/Resources/views/Admin/Product/CatalogPage/catalog.html.twig
locations:
  - backoffice
type:
  - 
hookAliases:
---

# Hook legacyblockkpi

## Information

Hook locations: 
  - backoffice

Hook type: 
  - 

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Resources/views/Admin/Product/CatalogPage/catalog.html.twig](src/PrestaShopBundle/Resources/views/Admin/Product/CatalogPage/catalog.html.twig)

## Hook call in codebase

```php
{{ renderhook('legacy_block_kpi', {'kpi_controller': 'AdminProductsController'}) }}
```