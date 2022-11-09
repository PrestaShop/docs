---
menuTitle: actionObjectDeleteAfter
Title: actionObjectDeleteAfter
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

# Hook : actionObjectDeleteAfter

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
Hook::exec('actionObjectDeleteAfter', ['object' => $this]);
```