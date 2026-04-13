---
Title: actionOrderStatusPostUpdate
hidden: true
hookTitle: 'Post update of order status'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/classes/order/OrderHistory.php'
        file: classes/order/OrderHistory.php
locations:
    - 'front office'
type: action
hookAliases: actionOrderStatusPostUpdate
array_return: false
check_exceptions: true
chain: false
origin: core
description: 'Allows to be notified after order status is changed.'

---

{{% hookDescriptor %}}

## Parameters details

```php
    <?php
    array(
      'newOrderStatus' => (object) OrderState,
      'oldOrderStatus' => (object) OrderState,
      'id_order' => (int) Order ID
    );
```

## Call of the Hook in the origin file

```php
Hook::exec('actionOrderStatusPostUpdate', [
            'newOrderStatus' => $new_os,
            'oldOrderStatus' => $old_os,
            'id_order' => (int) $order->id,
        ], null, false, true, false, $order->id_shop);
```
