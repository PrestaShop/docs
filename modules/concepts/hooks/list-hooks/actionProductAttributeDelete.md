---
menuTitle: actionProductAttributeDelete
title: actionProductAttributeDelete
hidden: true
files:
  - classes/Product.php
types:
  - frontoffice
hookTypes:
  - legacy
---

# Hook : actionProductAttributeDelete

Located in :

  - classes/Product.php

## Parameters

```php
Hook::exec('actionProductAttributeDelete', ['id_product_attribute' => 0, 'id_product' => (int) $this->id, 'deleteAllAttributes' => true]);
```