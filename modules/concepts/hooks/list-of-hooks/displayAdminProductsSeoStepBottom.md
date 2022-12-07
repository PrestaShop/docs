---
menuTitle: displayAdminProductsSeoStepBottom
Title: displayAdminProductsSeoStepBottom
hidden: true
hookTitle: Display new elements in back office product page, SEO tab
files:
  - src/PrestaShopBundle/Resources/views/Admin/Product/ProductPage/Forms/form_seo.html.twig
locations:
  - backoffice
type:
  - display
hookAliases:
---

# Hook displayAdminProductsSeoStepBottom

## Information

{{% notice tip %}}
**Display new elements in back office product page, SEO tab:** 

This hook launches modules when the back office product page is displayed
{{% /notice %}}

Hook locations: 
  - backoffice

Hook type: 
  - display

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Resources/views/Admin/Product/ProductPage/Forms/form_seo.html.twig](src/PrestaShopBundle/Resources/views/Admin/Product/ProductPage/Forms/form_seo.html.twig)

## Hook call in codebase

```php
{{ renderhook('displayAdminProductsSeoStepBottom', { 'id_product': productId }) }}
```