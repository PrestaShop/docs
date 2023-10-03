---
menuTitle: displayAttributeForm
Title: displayAttributeForm
hidden: true
hookTitle: 
files:
  - admin-dev/themes/default/template/controllers/attributes/helpers/form/form.tpl
locations:
  - back office
type: display 
hookAliases:
  - attributeForm
---

# Hook displayAttributeForm

## Information

{{% notice tip %}}
**Add fields to the form 'attribute value'**

This hook adds fields to the form 'attribute value'
{{% /notice %}}

Hook locations: 
  - back office

Located in: 
  - [admin-dev/themes/default/template/controllers/attributes/helpers/form/form.tpl](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/admin-dev/themes/default/template/controllers/attributes/helpers/form/form.tpl)

## Call of the Hook in the origin file

```php
{hook h="displayAttributeForm" id_attribute=$form_id}
```