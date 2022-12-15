---
menuTitle: displayAdminProductsOptionsStepTop
Title: displayAdminProductsOptionsStepTop
hidden: true
hookTitle: Display new elements in back office product page, Options tab
files:
  - src/PrestaShopBundle/Resources/views/Admin/Product/ProductPage/Panels/options.html.twig
locations:
  - back office
type: display
hookAliases:
---

# Hook displayAdminProductsOptionsStepTop

## Information

{{% notice tip %}}
**Display new elements in back office product page, Options tab:** 

This hook launches modules when the back office product page is displayed
{{% /notice %}}

Hook locations: 
  - back office

Hook type: display

Located in: 
  - [src/PrestaShopBundle/Resources/views/Admin/Product/ProductPage/Panels/options.html.twig](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Resources/views/Admin/Product/ProductPage/Panels/options.html.twig)

## Call of the Hook in the origin file

```php
{{ renderhook('displayAdminProductsOptionsStepTop', { 'id_product': productId }) }}
```