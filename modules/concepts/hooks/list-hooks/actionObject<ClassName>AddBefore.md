---
menuTitle: actionObject<ClassName>AddBefore
title: actionObject<ClassName>AddBefore
hidden: true
files:
  - classes/ObjectModel.php
types:
  - backoffice
  - frontoffice
hookTypes:
  - legacy
---

# Hook : actionObject<ClassName>AddBefore

Located in :

  - classes/ObjectModel.php

## Parameters

```php
Hook::exec('actionObject' . $this->getFullyQualifiedName() . 'AddBefore', ['object' => $this]);
```