---
Title: actionAdminDuplicateAfter
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
'actionAdminDuplicateAfter',
            ['id_product' => $oldProductId, 'id_product_new' => $newProductId]
        );

        // @todo: after ##21740 (transactions PR) is resolved.
        //  Based on if its accepted or not, we need to implement roll back if something went wrong.
```
