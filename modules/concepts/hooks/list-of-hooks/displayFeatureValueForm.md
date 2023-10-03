---
menuTitle: displayFeatureValueForm
Title: displayFeatureValueForm
hidden: true
hookTitle: Add fields to the form 'feature value'
files:
  - admin-dev/themes/default/template/controllers/feature_value/helpers/form/form.tpl
locations:
  - back office
type: display
hookAliases:
 - featureValueForm
---

# Hook displayFeatureValueForm

## Aliases
 
 - featureValueForm


## Information

{{% notice tip %}}
**Add fields to the form 'feature value':** 

This hook adds fields to the form 'feature value'
{{% /notice %}}

Hook locations: 
  - back office

Hook type: display

Located in: 
  - [admin-dev/themes/default/template/controllers/feature_value/helpers/form/form.tpl](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/admin-dev/themes/default/template/controllers/feature_value/helpers/form/form.tpl)

## Call of the Hook in the origin file

```php
{hook h="displayFeatureValueForm" id_feature_value=$feature_value->id|intval}
```