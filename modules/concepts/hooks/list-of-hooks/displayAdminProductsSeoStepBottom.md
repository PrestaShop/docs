---
menuTitle: displayAdminProductsSeoStepBottom
Title: displayAdminProductsSeoStepBottom
hidden: true
hookTitle: Display new elements in back office product page, SEO tab
files:
  - src/PrestaShopBundle/Resources/views/Admin/Product/ProductPage/Forms/form_seo.html.twig
locations:
  - backoffice
types:
  - twig
---

# Hook : displayAdminProductsSeoStepBottom

## Informations

{{% notice tip %}}
**Display new elements in back office product page, SEO tab:** 

This hook launches modules when the back office product page is displayed
{{% /notice %}}

Hook locations: 
  - backoffice

Hook types: 
  - twig

Located in: 
  - src/PrestaShopBundle/Resources/views/Admin/Product/ProductPage/Forms/form_seo.html.twig

## Hook call with parameters

```php
{{ renderhook('displayAdminProductsSeoStepBottom', { 'id_product': productId }) }}
```