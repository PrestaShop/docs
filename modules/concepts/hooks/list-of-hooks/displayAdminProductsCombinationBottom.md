---
menuTitle: displayAdminProductsCombinationBottom
Title: displayAdminProductsCombinationBottom
hidden: true
hookTitle: Display new elements in back office product page, Combination tab
files:
  - src/PrestaShopBundle/Resources/views/Admin/Product/ProductPage/Forms/form_combination.html.twig
locations:
  - backoffice
types:
  - twig
---

# Hook : displayAdminProductsCombinationBottom

## Informations

{{% notice tip %}}
**Display new elements in back office product page, Combination tab:** 

This hook launches modules when the back office product page is displayed
{{% /notice %}}

Hook locations: 
  - backoffice

Hook types: 
  - twig

Located in: 
  - src/PrestaShopBundle/Resources/views/Admin/Product/ProductPage/Forms/form_combination.html.twig

## Hook call with parameters

```php
{{ renderhook('displayAdminProductsCombinationBottom', { 'id_product': form.vars.value.id_product, 'id_product_attribute': form.vars.value.id_product_attribute }) }}
```