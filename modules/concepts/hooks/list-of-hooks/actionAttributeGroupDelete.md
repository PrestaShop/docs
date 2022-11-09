---
menuTitle: actionAttributeGroupDelete
Title: actionAttributeGroupDelete
hidden: true
hookTitle: Deleting attribute group
files:
  - classes/AttributeGroup.php
locations:
  - frontoffice
types:
  - legacy
---

# Hook : actionAttributeGroupDelete

## Informations

{{% notice tip %}}
**Deleting attribute group:** 

This hook is called while deleting an attributes  group
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook types: 
  - legacy

Located in: 
  - classes/AttributeGroup.php

## Hook call with parameters

```php
Hook::exec('actionAttributeGroupDelete', ['id_attribute_group' => $this->id]);
```