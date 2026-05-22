---
Title: actionAdminDuplicateBefore
hidden: true
hookTitle: files:
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/src/Adapter/Product/Update/ProductDuplicator.php'
        file: src/Adapter/Product/Update/ProductDuplicator.php
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
'actionAdminDuplicateBefore',
            ['id_product' => $oldProductId]
        );
        $newProduct = $this->duplicateProduct($productId, $shopConstraint);
        $newProductId = (int) $newProduct->id;
```
