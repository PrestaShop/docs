---
Title: actionAttributeGroupSave
hidden: true
hookTitle: 'Saving an attribute group'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/AttributeGroup.php'
        file: classes/AttributeGroup.php
locations:
    - 'front office'
type: action
hookAliases:
    - afterSaveAttributeGroup
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook is called while saving an attributes group'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec('actionAttributeGroupSave', ['id_attribute_group' => $this->id])
```
