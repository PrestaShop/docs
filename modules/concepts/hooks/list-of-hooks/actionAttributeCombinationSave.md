---
menuTitle: actionAttributeCombinationSave
Title: actionAttributeCombinationSave
hidden: true
hookTitle: 
files:
  - classes/Combination.php
locations:
  - frontoffice
types:
  - legacy
---

# Hook : actionAttributeCombinationSave

## Informations

Hook locations: 
  - frontoffice

Hook types: 
  - legacy

Located in: 
  - classes/Combination.php

## Hook call with parameters

```php
Hook::exec('actionAttributeCombinationSave', ['id_product_attribute' => (int) $this->id, 'id_attributes' => $idsAttribute]);
```