---
menuTitle: actionProductUpdate
title: actionProductUpdate
hidden: true
files:
  - src/Adapter/Product/AdminProductWrapper.php
types:
  - backoffice
hookTypes:
  - legacy
---

# Hook : actionProductUpdate

Located in :

  - src/Adapter/Product/AdminProductWrapper.php

## Parameters

```php
Hook::exec('actionProductUpdate', ['id_product' => (int) $product->id, 'product' => $product]);
```