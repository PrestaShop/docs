---
Title: actionUpdateQuantity
hidden: true
hookTitle: 'Quantity update'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/src/Adapter/Product/Combination/Update/CombinationStockUpdater.php'
        file: src/Adapter/Product/Combination/Update/CombinationStockUpdater.php
locations:
    - 'front office'
type: action
hookAliases: actionUpdateQuantity
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'Quantity is updated only when a customer effectively places their order'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
$this->hookDispatcher->dispatchWithParameters('actionUpdateQuantity',
            [
                'id_product' => $stockAvailable->id_product,
                'id_product_attribute' => $stockAvailable->id_product_attribute,
                'quantity' => $stockAvailable->quantity,
                'delta_quantity' => $deltaQuantity,
                'id_shop' => $stockAvailable->id_shop,
            ]);
```
