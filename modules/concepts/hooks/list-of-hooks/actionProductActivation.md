---
menuTitle: actionProductActivation
Title: actionProductActivation
hidden: true
hookTitle: 
files:
  - src/Adapter/Product/AdminProductDataUpdater.php
locations:
  - backoffice
type:
  - action
hookAliases:
---

# Hook actionProductActivation

## Information

Hook locations: 
  - backoffice

Hook type: 
  - action

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/Adapter/Product/AdminProductDataUpdater.php](src/Adapter/Product/AdminProductDataUpdater.php)

## Hook call in codebase

```php
dispatchWithParameters('actionProductActivation', ['id_product' => (int) $product->id, 'product' => $product, 'activated' => $activate])
```