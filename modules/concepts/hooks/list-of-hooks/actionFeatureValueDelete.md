---
menuTitle: actionFeatureValueDelete
Title: actionFeatureValueDelete
hidden: true
hookTitle: Deleting attributes' features' values
files:
  - classes/FeatureValue.php
locations:
  - frontoffice
types:
  - legacy
---

# Hook : actionFeatureValueDelete

## Informations

{{% notice tip %}}
**Deleting attributes' features' values:** 

This hook is called while deleting an attributes features value
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook types: 
  - legacy

Located in: 
  - classes/FeatureValue.php

## Hook call with parameters

```php
Hook::exec('actionFeatureValueDelete', ['id_feature_value' => $this->id]);
```