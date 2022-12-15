---
menuTitle: actionProductActivation
Title: actionProductActivation
hidden: true
hookTitle: 
files:
  - src/Adapter/Product/AdminProductDataUpdater.php
locations:
  - back office
type: action
hookAliases:
---

# Hook actionProductActivation

## Information

Hook locations: 
  - back office

Hook type: action

Located in: 
  - [src/Adapter/Product/AdminProductDataUpdater.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/Adapter/Product/AdminProductDataUpdater.php)

## Call of the Hook in the origin file

```php
dispatchWithParameters('actionProductActivation', ['id_product' => (int) $product->id, 'product' => $product, 'activated' => $activate])
```