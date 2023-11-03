---
Title: displayAttributeForm
hidden: true
hookTitle: 
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/admin-dev/themes/default/template/controllers/attributes/helpers/form/form.tpl'
        file: admin-dev/themes/default/template/controllers/attributes/helpers/form/form.tpl
locations:
    - 'back office'
type: display
hookAliases:
    - attributeForm
array_return: false
check_exceptions: false
chain: false
origin: core
description: "This hook adds fields to the form 'attribute value'"

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
{hook h="displayAttributeForm" id_attribute=$form_id}
```
