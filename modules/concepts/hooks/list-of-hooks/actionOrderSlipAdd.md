---
Title: actionOrderSlipAdd
hidden: true
hookTitle: 'Order slip creation'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/src/Adapter/Order/Refund/OrderSlipCreator.php'
        file: src/Adapter/Order/Refund/OrderSlipCreator.php
locations:
    - 'front office'
type: action
hookAliases: actionOrderSlipAdd
array_return: false
check_exceptions: true
chain: false
origin: core
description: 'This hook is called when a new credit slip is added regarding client order'

---

{{% hookDescriptor %}}

## Parameters details

```php
    <?php
    array(
      'order' => Order,
      'productList' => array(
        (int) product ID 1,
        (int) product ID 2, 
        ...,
        (int) product ID n
      ),
      'qtyList' => array(
        (int) quantity 1,
        (int) quantity 2,
        ...,
        (int) quantity n 
      )
    );
    The order of IDs and quantities is important!
```

## Call of the Hook in the origin file

```php
Hook::exec('actionOrderSlipAdd', [
                'order' => $order,
                'productList' => $orderRefundSummary->getProductRefunds(),
                'qtyList' => $fullQuantityList,
                'orderSlipCreated' => $this->orderSlipCreated,
            ], null, false, true, false, $order->id_shop);
```
