---
menuTitle: displayAdminProductsPriceStepBottom
Title: displayAdminProductsPriceStepBottom
hidden: true
hookTitle: Display new elements in back office product page, Price tab
files:
  - src/PrestaShopBundle/Resources/views/Admin/Product/ProductPage/Panels/pricing.html.twig
locations:
  - backoffice
types:
  - twig
---

# Hook : displayAdminProductsPriceStepBottom

## Informations

{{% notice tip %}}
**Display new elements in back office product page, Price tab:** 

This hook launches modules when the back office product page is displayed
{{% /notice %}}

Hook locations: 
  - backoffice

Hook types: 
  - twig

Located in: 
  - src/PrestaShopBundle/Resources/views/Admin/Product/ProductPage/Panels/pricing.html.twig

## Hook call with parameters

```php
{{ renderhook('displayAdminProductsPriceStepBottom', { 'id_product': productId }) }}
```