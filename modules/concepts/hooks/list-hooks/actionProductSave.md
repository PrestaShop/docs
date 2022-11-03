---
menuTitle: actionProductSave
title: actionProductSave
hidden: true
files:
  - classes/Product.php
types:
  - frontoffice
hookTypes:
  - legacy
---

# Hook : actionProductSave

Located in :

  - classes/Product.php

## Parameters

```php
Hook::exec('actionProductSave', ['id_product' => (int) $this->id, 'product' => $this]);
```