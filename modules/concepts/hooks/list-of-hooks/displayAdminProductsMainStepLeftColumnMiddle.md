---
menuTitle: displayAdminProductsMainStepLeftColumnMiddle
Title: displayAdminProductsMainStepLeftColumnMiddle
hidden: true
hookTitle: Display new elements in back office product page, left column of the Basic settings tab
files:
  - src/PrestaShopBundle/Resources/views/Admin/Product/ProductPage/Panels/essentials.html.twig
locations:
  - backoffice
types:
  - twig
---

# Hook : displayAdminProductsMainStepLeftColumnMiddle

## Informations

{{% notice tip %}}
**Display new elements in back office product page, left column of the Basic settings tab:** 

This hook launches modules when the back office product page is displayed
{{% /notice %}}

Hook locations: 
  - backoffice

Hook types: 
  - twig

Located in: 
  - src/PrestaShopBundle/Resources/views/Admin/Product/ProductPage/Panels/essentials.html.twig

## Hook call with parameters

```php
{{ renderhook('displayAdminProductsMainStepLeftColumnMiddle', { 'id_product': productId }) }}
```