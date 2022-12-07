---
menuTitle: actionAttributeGroupDelete
Title: actionAttributeGroupDelete
hidden: true
hookTitle: Deleting attribute group
files:
  - classes/AttributeGroup.php
locations:
  - frontoffice
type:
  - action
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
  - frontoffice

Hook type: 
  - action

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/AttributeGroup.php](classes/AttributeGroup.php)

## Hook call in codebase

```php
Hook::exec('actionAttributeGroupDelete', ['id_attribute_group' => $this->id])
```