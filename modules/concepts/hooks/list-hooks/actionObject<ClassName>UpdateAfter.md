---
menuTitle: actionObject<ClassName>UpdateAfter
title: actionObject<ClassName>UpdateAfter
hidden: true
files:
  - classes/ObjectModel.php
types:
  - backoffice
  - frontoffice
hookTypes:
  - legacy
---

# Hook : actionObject<ClassName>UpdateAfter

Located in :

  - classes/ObjectModel.php

## Parameters

```php
Hook::exec('actionObject' . $this->getFullyQualifiedName() . 'UpdateAfter', ['object' => $this]);
```