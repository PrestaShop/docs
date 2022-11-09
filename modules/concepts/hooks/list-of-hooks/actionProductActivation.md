---
menuTitle: actionProductActivation
Title: actionProductActivation
hidden: true
hookTitle: 
files:
  - src/Adapter/Product/AdminProductDataUpdater.php
locations:
  - backoffice
types:
  - symfony
---

# Hook : actionProductActivation

## Informations

Hook locations: 
  - backoffice

Hook types: 
  - symfony

Located in: 
  - src/Adapter/Product/AdminProductDataUpdater.php

## Hook call with parameters

```php
dispatchWithParameters('actionProductActivation', ['id_product' => (int) $product->id, 'product' => $product, 'activated' => $activate]);
```