---
menuTitle: actionObject<ClassName>AddAfter
title: actionObject<ClassName>AddAfter
hidden: true
files:
  - classes/ObjectModel.php
types:
  - backoffice
  - frontoffice
hookTypes:
  - legacy
---

# Hook : actionObject<ClassName>AddAfter

Located in :

  - classes/ObjectModel.php

## Parameters

```php
Hook::exec('actionObject' . $this->getFullyQualifiedName() . 'AddAfter', ['object' => $this]);
```