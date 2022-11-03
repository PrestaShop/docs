---
menuTitle: actionObject<ClassName>DeleteBefore
title: actionObject<ClassName>DeleteBefore
hidden: true
files:
  - classes/ObjectModel.php
types:
  - backoffice
  - frontoffice
hookTypes:
  - legacy
---

# Hook : actionObject<ClassName>DeleteBefore

Located in :

  - classes/ObjectModel.php

## Parameters

```php
Hook::exec('actionObject' . $this->getFullyQualifiedName() . 'DeleteBefore', ['object' => $this]);
```