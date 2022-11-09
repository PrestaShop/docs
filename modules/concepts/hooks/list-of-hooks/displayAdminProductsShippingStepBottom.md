---
menuTitle: displayAdminProductsShippingStepBottom
Title: displayAdminProductsShippingStepBottom
hidden: true
hookTitle: Display new elements in back office product page, Shipping tab
files:
  - src/PrestaShopBundle/Resources/views/Admin/Product/ProductPage/Forms/form_shipping.html.twig
locations:
  - backoffice
types:
  - twig
---

# Hook : displayAdminProductsShippingStepBottom

## Informations

{{% notice tip %}}
**Display new elements in back office product page, Shipping tab:** 

This hook launches modules when the back office product page is displayed
{{% /notice %}}

Hook locations: 
  - backoffice

Hook types: 
  - twig

Located in: 
  - src/PrestaShopBundle/Resources/views/Admin/Product/ProductPage/Forms/form_shipping.html.twig

## Hook call with parameters

```php
{{ renderhook('displayAdminProductsShippingStepBottom', { 'id_product': id_product }) }}
```