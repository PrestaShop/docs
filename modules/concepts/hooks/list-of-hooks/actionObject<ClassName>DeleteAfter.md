---
menuTitle: actionObject<ClassName>DeleteAfter
Title: actionObject<ClassName>DeleteAfter
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

# Hook : actionObject<ClassName>DeleteAfter

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
Hook::exec('actionObject' . $this->getFullyQualifiedName() . 'DeleteAfter', ['object' => $this]);
```