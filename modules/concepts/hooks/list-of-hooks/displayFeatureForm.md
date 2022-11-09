---
menuTitle: displayFeatureForm
Title: displayFeatureForm
hidden: true
hookTitle: Add fields to the form 'feature'
files:
  - src/PrestaShopBundle/Resources/views/Admin/Sell/Catalog/Features/Blocks/form.html.twig
locations:
  - backoffice
types:
  - twig
---

# Hook : displayFeatureForm

## Informations

{{% notice tip %}}
**Add fields to the form 'feature':** 

This hook adds fields to the form 'feature'
{{% /notice %}}

Hook locations: 
  - backoffice

Hook types: 
  - twig

Located in: 
  - src/PrestaShopBundle/Resources/views/Admin/Sell/Catalog/Features/Blocks/form.html.twig

## Hook call with parameters

```php
{{ renderhook('displayFeatureForm', {'id_feature': featureId}) }}
```