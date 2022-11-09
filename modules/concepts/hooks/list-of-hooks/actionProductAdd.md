---
menuTitle: actionProductAdd
Title: actionProductAdd
hidden: true
hookTitle: Product creation
files:
  - src/Adapter/Product/AdminProductDataUpdater.php
locations:
  - backoffice
types:
  - symfony
---

# Hook : actionProductAdd

## Informations

{{% notice tip %}}
**Product creation:** 

This hook is displayed after a product is created
{{% /notice %}}

Hook locations: 
  - backoffice

Hook types: 
  - symfony

Located in: 
  - src/Adapter/Product/AdminProductDataUpdater.php

## Hook call with parameters

```php
dispatchWithParameters('actionProductAdd', ['id_product_old' => $id_product_old, 'id_product' => (int) $product->id, 'product' => $product]);
```