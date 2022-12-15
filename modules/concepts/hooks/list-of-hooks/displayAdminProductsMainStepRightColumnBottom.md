---
menuTitle: displayAdminProductsMainStepRightColumnBottom
Title: displayAdminProductsMainStepRightColumnBottom
hidden: true
hookTitle: Display new elements in back office product page, right column of the Basic settings tab
files:
  - src/PrestaShopBundle/Resources/views/Admin/Product/ProductPage/Panels/essentials.html.twig
locations:
  - back office
type: display
hookAliases:
---

# Hook displayAdminProductsMainStepRightColumnBottom

## Information

{{% notice tip %}}
**Display new elements in back office product page, right column of the Basic settings tab:** 

This hook launches modules when the back office product page is displayed
{{% /notice %}}

Hook locations: 
  - back office

Hook type: display

Located in: 
  - [src/PrestaShopBundle/Resources/views/Admin/Product/ProductPage/Panels/essentials.html.twig](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Resources/views/Admin/Product/ProductPage/Panels/essentials.html.twig)

## Call of the Hook in the origin file

```php
{{ renderhook('displayAdminProductsMainStepRightColumnBottom', { 'id_product': productId }) }}
```