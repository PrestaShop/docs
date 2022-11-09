---
menuTitle: actionAttributeSave
Title: actionAttributeSave
hidden: true
hookTitle: Saving an attributes features value
files:
  - classes/ProductAttribute.php
locations:
  - frontoffice
types:
  - legacy
---

# Hook : actionAttributeSave

## Informations

{{% notice tip %}}
**Saving an attributes features value:** 

This hook is called while saving an attributes features value
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook types: 
  - legacy

Located in: 
  - classes/ProductAttribute.php

## Hook call with parameters

```php
Hook::exec('actionAttributeSave', ['id_attribute' => $this->id]);
```