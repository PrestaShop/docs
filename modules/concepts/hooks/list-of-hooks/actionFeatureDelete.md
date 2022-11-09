---
menuTitle: actionFeatureDelete
Title: actionFeatureDelete
hidden: true
hookTitle: Deleting attributes' features
files:
  - classes/Feature.php
locations:
  - frontoffice
types:
  - legacy
---

# Hook : actionFeatureDelete

## Informations

{{% notice tip %}}
**Deleting attributes' features:** 

This hook is called while deleting an attributes features
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook types: 
  - legacy

Located in: 
  - classes/Feature.php

## Hook call with parameters

```php
Hook::exec('actionFeatureDelete', ['id_feature' => $this->id]);
```