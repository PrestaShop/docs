---
menuTitle: actionCategoryDelete
title: actionCategoryDelete
hidden: true
files:
  - classes/Category.php
types:
  - frontoffice
hookTypes:
  - legacy
---

# Hook : actionCategoryDelete

Located in :

  - classes/Category.php

## Parameters

```php
Hook::exec('actionCategoryDelete', ['category' => $this, 'deleted_children' => $deletedChildren]);
```