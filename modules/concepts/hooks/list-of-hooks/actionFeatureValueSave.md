---
menuTitle: actionFeatureValueSave
Title: actionFeatureValueSave
hidden: true
hookTitle: Saving an attributes features value
files:
  - classes/FeatureValue.php
locations:
  - frontoffice
types:
  - legacy
---

# Hook : actionFeatureValueSave

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
  - classes/FeatureValue.php

## Hook call with parameters

```php
Hook::exec('actionFeatureValueSave', ['id_feature_value' => $this->id]);
```