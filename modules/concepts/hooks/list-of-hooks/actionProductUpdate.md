---
menuTitle: actionProductUpdate
Title: actionProductUpdate
hidden: true
hookTitle: Product update
files:
  - src/Adapter/Product/AdminProductWrapper.php
locations:
  - backoffice
types:
  - legacy
---

# Hook : actionProductUpdate

## Informations

{{% notice tip %}}
**Product update:** 

This hook is displayed after a product has been updated
{{% /notice %}}

Hook locations: 
  - backoffice

Hook types: 
  - legacy

Located in: 
  - src/Adapter/Product/AdminProductWrapper.php

## Hook call with parameters

```php
Hook::exec('actionProductUpdate', ['id_product' => (int) $product->id, 'product' => $product]);
```