---
menuTitle: actionAttributeGroupSave
Title: actionAttributeGroupSave
hidden: true
hookTitle: Saving an attribute group
files:
  - classes/AttributeGroup.php
locations:
  - frontoffice
types:
  - legacy
---

# Hook : actionAttributeGroupSave

## Informations

{{% notice tip %}}
**Saving an attribute group:** 

This hook is called while saving an attributes group
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook types: 
  - legacy

Located in: 
  - classes/AttributeGroup.php

## Hook call with parameters

```php
Hook::exec('actionAttributeGroupSave', ['id_attribute_group' => $this->id]);
```