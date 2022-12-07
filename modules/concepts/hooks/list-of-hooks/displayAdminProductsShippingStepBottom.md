---
menuTitle: displayAdminProductsShippingStepBottom
Title: displayAdminProductsShippingStepBottom
hidden: true
hookTitle: Display new elements in back office product page, Shipping tab
files:
  - src/PrestaShopBundle/Resources/views/Admin/Product/ProductPage/Forms/form_shipping.html.twig
locations:
  - backoffice
type:
  - display
hookAliases:
---

# Hook displayAdminProductsShippingStepBottom

## Information

{{% notice tip %}}
**Display new elements in back office product page, Shipping tab:** 

This hook launches modules when the back office product page is displayed
{{% /notice %}}

Hook locations: 
  - backoffice

Hook type: 
  - display

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Resources/views/Admin/Product/ProductPage/Forms/form_shipping.html.twig](src/PrestaShopBundle/Resources/views/Admin/Product/ProductPage/Forms/form_shipping.html.twig)

## Hook call in codebase

```php
{{ renderhook('displayAdminProductsShippingStepBottom', { 'id_product': id_product }) }}
```