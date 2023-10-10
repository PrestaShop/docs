---
menuTitle: displayAdminProductsCombinationBottom
Title: displayAdminProductsCombinationBottom
hidden: true
hookTitle: 'Display new elements in back office product page, Combination tab'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Resources/views/Admin/Product/ProductPage/Forms/form_combination.html.twig'
        file: src/PrestaShopBundle/Resources/views/Admin/Product/ProductPage/Forms/form_combination.html.twig
locations:
    - 'back office'
type: display
hookAliases: 
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook launches modules when the back office product page is displayed'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
{{ renderhook('displayAdminProductsCombinationBottom', { 'id_product': form.vars.value.id_product, 'id_product_attribute': form.vars.value.id_product_attribute }) }}
```
