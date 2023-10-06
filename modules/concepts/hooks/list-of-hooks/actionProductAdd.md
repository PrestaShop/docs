---
menuTitle: actionProductAdd
Title: actionProductAdd
hidden: true
hookTitle: 'Product creation'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/Adapter/Product/ProductDuplicator.php'
        file: src/Adapter/Product/ProductDuplicator.php
locations:
    - 'front office'
type: action
hookAliases:
    - addproduct
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook is displayed after a product is created'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
dispatchWithParameters(
            'actionProductAdd',
            ['id_product_old' => $oldProductId, 'id_product' => $newProductId, 'product' => $newProduct]
        )
```
