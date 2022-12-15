---
menuTitle: displayAdminProductsCombinationBottom
Title: displayAdminProductsCombinationBottom
hidden: true
hookTitle: Display new elements in back office product page, Combination tab
files:
  - src/PrestaShopBundle/Resources/views/Admin/Product/ProductPage/Forms/form_combination.html.twig
locations:
  - back office
type: display
hookAliases:
---

# Hook displayAdminProductsCombinationBottom

## Information

{{% notice tip %}}
**Display new elements in back office product page, Combination tab:** 

This hook launches modules when the back office product page is displayed
{{% /notice %}}

Hook locations: 
  - back office

Hook type: display

Located in: 
  - [src/PrestaShopBundle/Resources/views/Admin/Product/ProductPage/Forms/form_combination.html.twig](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Resources/views/Admin/Product/ProductPage/Forms/form_combination.html.twig)

## Call of the Hook in the origin file

```php
{{ renderhook('displayAdminProductsCombinationBottom', { 'id_product': form.vars.value.id_product, 'id_product_attribute': form.vars.value.id_product_attribute }) }}
```