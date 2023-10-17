---
Title: displayFeatureForm
hidden: true
hookTitle: "Add fields to the form 'feature'"
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Resources/views/Admin/Sell/Catalog/Features/Blocks/form.html.twig'
        file: src/PrestaShopBundle/Resources/views/Admin/Sell/Catalog/Features/Blocks/form.html.twig
locations:
    - 'back office'
type: display
hookAliases:
    - featureForm
array_return: false
check_exceptions: false
chain: false
origin: core
description: "This hook adds fields to the form 'feature'"

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
{{ renderhook('displayFeatureForm', {'id_feature': featureId}) }}
```
