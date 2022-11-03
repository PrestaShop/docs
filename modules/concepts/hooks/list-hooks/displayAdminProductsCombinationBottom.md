---
menuTitle: displayAdminProductsCombinationBottom
title: displayAdminProductsCombinationBottom
hidden: true
files:
  - src/PrestaShopBundle/Resources/views/Admin/Product/ProductPage/Forms/form_combination.html.twig
types:
  - backoffice
hookTypes:
  - twig
---

# Hook : displayAdminProductsCombinationBottom

Located in :

  - src/PrestaShopBundle/Resources/views/Admin/Product/ProductPage/Forms/form_combination.html.twig

## Parameters

```php
{{ renderhook('displayAdminProductsCombinationBottom', { 'id_product': form.vars.value.id_product, 'id_product_attribute': form.vars.value.id_product_attribute }) }}
```