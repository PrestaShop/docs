---
menuTitle: displayFeatureValueForm
Title: displayFeatureValueForm
hidden: true
hookTitle: "Add fields to the form 'feature value'"
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/admin-dev/themes/default/template/controllers/feature_value/helpers/form/form.tpl'
        file: admin-dev/themes/default/template/controllers/feature_value/helpers/form/form.tpl
locations:
    - 'back office'
type: display
hookAliases:
    - featureValueForm
array_return: false
check_exceptions: false
chain: false
origin: core
description: "This hook adds fields to the form 'feature value'"

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
{hook h="displayFeatureValueForm" id_feature_value=$feature_value->id|intval}
```
