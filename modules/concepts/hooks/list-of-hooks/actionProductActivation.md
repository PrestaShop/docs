---
Title: actionProductActivation
hidden: true
hookTitle: 
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/Adapter/Product/AdminProductDataUpdater.php'
        file: src/Adapter/Product/AdminProductDataUpdater.php
locations:
    - 'back office'
type: action
hookAliases: 
array_return: false
check_exceptions: false
chain: false
origin: core
description: ''

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
dispatchWithParameters('actionProductActivation', ['id_product' => (int) $product->id, 'product' => $product, 'activated' => $activate])
```
