---
menuTitle: actionAttributeCombinationDelete
Title: actionAttributeCombinationDelete
hidden: true
hookTitle: 
files:
  - classes/Combination.php
locations:
  - frontoffice
types:
  - legacy
---

# Hook : actionAttributeCombinationDelete

## Informations

Hook locations: 
  - frontoffice

Hook types: 
  - legacy

Located in: 
  - classes/Combination.php

## Hook call with parameters

```php
Hook::exec('actionAttributeCombinationDelete', ['id_product_attribute' => (int) $this->id]);
```