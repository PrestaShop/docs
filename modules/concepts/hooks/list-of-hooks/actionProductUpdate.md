---
Title: actionProductUpdate
hidden: true
hookTitle: 'Product update'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/Adapter/Product/AdminProductWrapper.php'
        file: src/Adapter/Product/AdminProductWrapper.php
locations:
    - 'back office'
type: action
hookAliases:
    - updateproduct
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook is displayed after a product has been updated'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec('actionProductUpdate', ['id_product' => (int) $product->id, 'product' => $product])
```
