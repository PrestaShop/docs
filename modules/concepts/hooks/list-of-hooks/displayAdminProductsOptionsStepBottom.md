---
menuTitle: displayAdminProductsOptionsStepBottom
Title: displayAdminProductsOptionsStepBottom
hidden: true
hookTitle: Display new elements in back office product page, Options tab
files:
  - src/PrestaShopBundle/Resources/views/Admin/Product/ProductPage/Panels/options.html.twig
locations:
  - backoffice
type:
  - display
hookAliases:
---

# Hook displayAdminProductsOptionsStepBottom

## Information

{{% notice tip %}}
**Display new elements in back office product page, Options tab:** 

This hook launches modules when the back office product page is displayed
{{% /notice %}}

Hook locations: 
  - backoffice

Hook type: 
  - display

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Resources/views/Admin/Product/ProductPage/Panels/options.html.twig](src/PrestaShopBundle/Resources/views/Admin/Product/ProductPage/Panels/options.html.twig)

## Hook call in codebase

```php
{{ renderhook('displayAdminProductsOptionsStepBottom', { 'id_product': productId }) }}
```