---
menuTitle: actionObjectDeleteBefore
Title: actionObjectDeleteBefore
hidden: true
hookTitle: 
files:
  - classes/ObjectModel.php
locations:
  - backoffice
  - frontoffice
types:
  - legacy
---

# Hook : actionObjectDeleteBefore

## Informations

Hook locations: 
  - backoffice
  - frontoffice

Hook types: 
  - legacy

Located in: 
  - classes/ObjectModel.php

## Hook call with parameters

```php
Hook::exec('actionObjectDeleteBefore', ['object' => $this]);
```