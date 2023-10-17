---
Title: actionUpdateQuantity
hidden: true
hookTitle: 'Quantity update'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/stock/StockAvailable.php'
        file: classes/stock/StockAvailable.php
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

## Parameters details

```php
    <?php
    array(
      'id_product' => (int) Product ID,
      'id_product_attribute' => (int) Product attribute ID,
      'quantity' => (int) New product quantity
    );
```

## Call of the Hook in the origin file

```php
Hook::exec(
                        'actionUpdateQuantity',
                                    [
                                        'id_product' => $id_product,
                                        'id_product_attribute' => 0,
                                        'quantity' => $product_quantity,
                                        'id_shop' => $id_shop,
                                    ]
                    )
```
