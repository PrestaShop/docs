---
Title: actionProductUpdate
hidden: true
hookTitle: 'Product update'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/classes/Product.php'
        file: classes/Product.php
locations:
    - 'back office'
type: action
hookAliases: actionProductUpdate
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook is displayed after a product has been updated'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec('actionProductUpdate', ['id_product' => (int) $product->id, 'product' => $product]);
```
