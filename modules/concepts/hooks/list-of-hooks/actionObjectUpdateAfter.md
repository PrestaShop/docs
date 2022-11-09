---
menuTitle: actionObjectUpdateAfter
Title: actionObjectUpdateAfter
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

# Hook : actionObjectUpdateAfter

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
Hook::exec('actionObjectUpdateAfter', ['object' => $this]);
```