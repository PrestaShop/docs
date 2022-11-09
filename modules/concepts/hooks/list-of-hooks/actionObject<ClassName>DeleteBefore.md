---
menuTitle: actionObject<ClassName>DeleteBefore
Title: actionObject<ClassName>DeleteBefore
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

# Hook : actionObject<ClassName>DeleteBefore

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
Hook::exec('actionObject' . $this->getFullyQualifiedName() . 'DeleteBefore', ['object' => $this]);
```