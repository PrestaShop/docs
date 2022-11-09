---
menuTitle: actionAttributeDelete
Title: actionAttributeDelete
hidden: true
hookTitle: Deleting an attributes features value
files:
  - classes/ProductAttribute.php
locations:
  - frontoffice
types:
  - legacy
---

# Hook : actionAttributeDelete

## Informations

{{% notice tip %}}
**Deleting an attributes features value:** 

This hook is called while deleting an attributes features value
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook types: 
  - legacy

Located in: 
  - classes/ProductAttribute.php

## Hook call with parameters

```php
Hook::exec('actionAttributeDelete', ['id_attribute' => $this->id]);
```