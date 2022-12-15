---
menuTitle: actionAttributeGroupSave
Title: actionAttributeGroupSave
hidden: true
hookTitle: Saving an attribute group
files:
  - classes/AttributeGroup.php
locations:
  - front office
type: action
hookAliases:
 - afterSaveAttributeGroup
---

# Hook actionAttributeGroupSave

Aliases: 
 - afterSaveAttributeGroup



## Information

{{% notice tip %}}
**Saving an attribute group:** 

This hook is called while saving an attributes group
{{% /notice %}}

Hook locations: 
  - front office

Hook type: action

Located in: 
  - [classes/AttributeGroup.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/AttributeGroup.php)

## Call of the Hook in the origin file

```php
Hook::exec('actionAttributeGroupSave', ['id_attribute_group' => $this->id])
```