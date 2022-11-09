---
menuTitle: displayAdminProductsOptionsStepBottom
Title: displayAdminProductsOptionsStepBottom
hidden: true
hookTitle: Display new elements in back office product page, Options tab
files:
  - src/PrestaShopBundle/Resources/views/Admin/Product/ProductPage/Panels/options.html.twig
locations:
  - backoffice
types:
  - twig
---

# Hook : displayAdminProductsOptionsStepBottom

## Informations

{{% notice tip %}}
**Display new elements in back office product page, Options tab:** 

This hook launches modules when the back office product page is displayed
{{% /notice %}}

Hook locations: 
  - backoffice

Hook types: 
  - twig

Located in: 
  - src/PrestaShopBundle/Resources/views/Admin/Product/ProductPage/Panels/options.html.twig

## Hook call with parameters

```php
{{ renderhook('displayAdminProductsOptionsStepBottom', { 'id_product': productId }) }}
```