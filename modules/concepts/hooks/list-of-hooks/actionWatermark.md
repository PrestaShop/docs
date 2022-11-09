---
menuTitle: actionWatermark
Title: actionWatermark
hidden: true
hookTitle: Watermark
files:
  - controllers/admin/AdminProductsController.php
locations:
  - backoffice
types:
  - legacy
---

# Hook : actionWatermark

## Informations

{{% notice tip %}}
**Watermark:** 


{{% /notice %}}

Hook locations: 
  - backoffice

Hook types: 
  - legacy

Located in: 
  - controllers/admin/AdminProductsController.php

## Hook call with parameters

```php
Hook::exec('actionWatermark', ['id_image' => $id_image, 'id_product' => $id_product]);
```