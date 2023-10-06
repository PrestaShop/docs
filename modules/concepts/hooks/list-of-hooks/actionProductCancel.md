---
menuTitle: actionProductCancel
Title: actionProductCancel
hidden: true
hookTitle: 'Product cancelled'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/Adapter/Order/CommandHandler/IssueStandardRefundHandler.php'
        file: src/Adapter/Order/CommandHandler/IssueStandardRefundHandler.php
locations:
    - 'front office'
type: action
hookAliases:
    - cancelProduct
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook is called when you cancel a product in an order'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec('actionProductCancel', ['order' => $order, 'id_order_detail' => (int) $orderDetailId, 'cancel_quantity' => $productRefund['quantity'], 'action' => CancellationActionType::STANDARD_REFUND], null, false, true, false, $order->id_shop)
```
