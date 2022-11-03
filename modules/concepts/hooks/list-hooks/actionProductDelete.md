---
menuTitle: actionProductDelete
title: actionProductDelete
hidden: true
files:
  - classes/Product.php
types:
  - frontoffice
hookTypes:
  - legacy
---

# Hook : actionProductDelete

Located in :

  - classes/Product.php

## Parameters

```php
Hook::exec('actionProductDelete', ['id_product' => (int) $this->id, 'product' => $this]);
```