---
menuTitle: displayAdminProductsQuantitiesStepBottom
Title: displayAdminProductsQuantitiesStepBottom
hidden: true
hookTitle: Display new elements in back office product page, Quantities/Combinations tab
files:
  - src/PrestaShopBundle/Resources/views/Admin/Product/ProductPage/Panels/combinations.html.twig
locations:
  - backoffice
types:
  - twig
---

# Hook : displayAdminProductsQuantitiesStepBottom

## Informations

{{% notice tip %}}
**Display new elements in back office product page, Quantities/Combinations tab:** 

This hook launches modules when the back office product page is displayed
{{% /notice %}}

Hook locations: 
  - backoffice

Hook types: 
  - twig

Located in: 
  - src/PrestaShopBundle/Resources/views/Admin/Product/ProductPage/Panels/combinations.html.twig

## Hook call with parameters

```php
{{ renderhook('displayAdminProductsQuantitiesStepBottom', { 'id_product': productId }) }}
```