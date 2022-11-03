---
menuTitle: actionObject<ClassName>UpdateBefore
title: actionObject<ClassName>UpdateBefore
hidden: true
files:
  - classes/ObjectModel.php
types:
  - backoffice
  - frontoffice
hookTypes:
  - legacy
---

# Hook : actionObject<ClassName>UpdateBefore

Located in :

  - classes/ObjectModel.php

## Parameters

```php
Hook::exec('actionObject' . $this->getFullyQualifiedName() . 'UpdateBefore', ['object' => $this]);
```