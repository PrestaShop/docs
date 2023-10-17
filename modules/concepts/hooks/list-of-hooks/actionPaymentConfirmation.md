---
Title: actionPaymentConfirmation
hidden: true
hookTitle: 'Payment confirmation'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/order/OrderHistory.php'
        file: classes/order/OrderHistory.php
locations:
    - 'front office'
type: action
hookAliases:
    - paymentConfirm
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook displays new elements after the payment is validated'

---

{{% hookDescriptor %}}

## Parameters details

```php
    <?php
    array(
      'id_order' => (int) Order ID
    );
```

## Call of the Hook in the origin file

```php
Hook::exec('actionPaymentConfirmation', ['id_order' => (int) $order->id], null, false, true, false, $order->id_shop)
```
