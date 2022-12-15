---
menuTitle: actionAttributeGroupDelete
Title: actionAttributeGroupDelete
hidden: true
hookTitle: Deleting attribute group
files:
  - classes/AttributeGroup.php
locations:
  - front office
type: action
hookAliases:
 - afterDeleteAttributeGroup
---

# Hook actionAttributeGroupDelete

Aliases: 
 - afterDeleteAttributeGroup



## Information

{{% notice tip %}}
**Deleting attribute group:** 

This hook is called while deleting an attributes  group
{{% /notice %}}

Hook locations: 
  - front office

Hook type: action

Located in: 
  - [classes/AttributeGroup.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/AttributeGroup.php)

## Call of the Hook in the origin file

```php
Hook::exec('actionAttributeGroupDelete', ['id_attribute_group' => $this->id])
```