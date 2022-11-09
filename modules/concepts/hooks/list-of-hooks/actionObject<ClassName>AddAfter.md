---
menuTitle: actionObject<ClassName>AddAfter
Title: actionObject<ClassName>AddAfter
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

# Hook : actionObject<ClassName>AddAfter

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
Hook::exec('actionObject' . $this->getFullyQualifiedName() . 'AddAfter', ['object' => $this]);
```