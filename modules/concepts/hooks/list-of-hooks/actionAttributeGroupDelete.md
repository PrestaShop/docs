---
menuTitle: actionAttributeGroupDelete
Title: actionAttributeGroupDelete
hidden: true
hookTitle: 'Deleting attribute group'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/AttributeGroup.php'
        file: classes/AttributeGroup.php
locations:
    - 'front office'
type: action
hookAliases:
    - afterDeleteAttributeGroup
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook is called while deleting an attributes  group'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec('actionAttributeGroupDelete', ['id_attribute_group' => $this->id])
```
