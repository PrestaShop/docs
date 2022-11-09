---
menuTitle: actionObject<ClassName>UpdateAfter
Title: actionObject<ClassName>UpdateAfter
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

# Hook : actionObject<ClassName>UpdateAfter

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
Hook::exec('actionObject' . $this->getFullyQualifiedName() . 'UpdateAfter', ['object' => $this]);
```