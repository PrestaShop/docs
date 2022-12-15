---
menuTitle: displayAdminProductsShippingStepBottom
Title: displayAdminProductsShippingStepBottom
hidden: true
hookTitle: Display new elements in back office product page, Shipping tab
files:
  - src/PrestaShopBundle/Resources/views/Admin/Product/ProductPage/Forms/form_shipping.html.twig
locations:
  - back office
type: display
hookAliases:
---

# Hook displayAdminProductsShippingStepBottom

## Information

{{% notice tip %}}
**Display new elements in back office product page, Shipping tab:** 

This hook launches modules when the back office product page is displayed
{{% /notice %}}

Hook locations: 
  - back office

Hook type: display

Located in: 
  - [src/PrestaShopBundle/Resources/views/Admin/Product/ProductPage/Forms/form_shipping.html.twig](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Resources/views/Admin/Product/ProductPage/Forms/form_shipping.html.twig)

## Call of the Hook in the origin file

```php
{{ renderhook('displayAdminProductsShippingStepBottom', { 'id_product': id_product }) }}
```