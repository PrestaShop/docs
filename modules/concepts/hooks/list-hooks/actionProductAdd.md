---
menuTitle: actionProductAdd
title: actionProductAdd
hidden: true
files:
  - controllers/admin/AdminProductsController.php
types:
  - backoffice
hookTypes:
  - legacy
---

# Hook : actionProductAdd

Located in :

  - controllers/admin/AdminProductsController.php

## Parameters

```php
Hook::exec('actionProductAdd', ['id_product_old' => $id_product_old, 'id_product' => (int) $product->id, 'product' => $product]);
```