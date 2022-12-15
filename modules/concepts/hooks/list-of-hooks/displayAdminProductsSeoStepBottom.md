---
menuTitle: displayAdminProductsSeoStepBottom
Title: displayAdminProductsSeoStepBottom
hidden: true
hookTitle: Display new elements in back office product page, SEO tab
files:
  - src/PrestaShopBundle/Resources/views/Admin/Product/ProductPage/Forms/form_seo.html.twig
locations:
  - back office
type: display
hookAliases:
---

# Hook displayAdminProductsSeoStepBottom

## Information

{{% notice tip %}}
**Display new elements in back office product page, SEO tab:** 

This hook launches modules when the back office product page is displayed
{{% /notice %}}

Hook locations: 
  - back office

Hook type: display

Located in: 
  - [src/PrestaShopBundle/Resources/views/Admin/Product/ProductPage/Forms/form_seo.html.twig](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Resources/views/Admin/Product/ProductPage/Forms/form_seo.html.twig)

## Call of the Hook in the origin file

```php
{{ renderhook('displayAdminProductsSeoStepBottom', { 'id_product': productId }) }}
```