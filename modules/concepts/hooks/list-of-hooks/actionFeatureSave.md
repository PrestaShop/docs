---
menuTitle: actionFeatureSave
Title: actionFeatureSave
hidden: true
hookTitle: Saving attributes' features
files:
  - classes/Feature.php
locations:
  - frontoffice
types:
  - legacy
---

# Hook : actionFeatureSave

## Informations

{{% notice tip %}}
**Saving attributes' features:** 

This hook is called while saving an attributes features
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook types: 
  - legacy

Located in: 
  - classes/Feature.php

## Hook call with parameters

```php
Hook::exec('actionFeatureSave', ['id_feature' => $this->id]);
```