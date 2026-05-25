---
Title: actionUpdateQuantity
hidden: true
hookTitle: 'Quantity update'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/classes/stock/StockAvailable.php'
        file: classes/stock/StockAvailable.php
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/src/Adapter/Product/Combination/Update/CombinationStockUpdater.php'
        file: src/Adapter/Product/Combination/Update/CombinationStockUpdater.php
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/src/Adapter/Product/Stock/Update/ProductStockUpdater.php'
        file: src/Adapter/Product/Stock/Update/ProductStockUpdater.php
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/src/Core/Stock/StockManager.php'
        file: src/Core/Stock/StockManager.php
locations:
    - 'front office'
type: action
hookAliases:
    - updateQuantity
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'Quantity is updated only when a customer effectively places their order'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec(
    'actionUpdateQuantity',
    [
        'id_product' => $id_product,
        'id_product_attribute' => $id_product_attribute,
        'quantity' => $stock_available->quantity,
        'delta_quantity' => $deltaQuantity ?? null,
        'id_shop' => $id_shop,
    ]
);
```
