---
menuTitle: displayAdminProductsPriceStepBottom
Title: displayAdminProductsPriceStepBottom
hidden: true
hookTitle: Display new elements in back office product page, Price tab
files:
  - src/PrestaShopBundle/Resources/views/Admin/Product/ProductPage/Panels/pricing.html.twig
locations:
  - back office
type: display
hookAliases:
---

# Hook displayAdminProductsPriceStepBottom

## Information

{{% notice tip %}}
**Display new elements in back office product page, Price tab:** 

This hook launches modules when the back office product page is displayed
{{% /notice %}}

Hook locations: 
  - back office

Hook type: display

Located in: 
  - [src/PrestaShopBundle/Resources/views/Admin/Product/ProductPage/Panels/pricing.html.twig](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Resources/views/Admin/Product/ProductPage/Panels/pricing.html.twig)

## Call of the Hook in the origin file

```php
{{ renderhook('displayAdminProductsPriceStepBottom', { 'id_product': productId }) }}
```