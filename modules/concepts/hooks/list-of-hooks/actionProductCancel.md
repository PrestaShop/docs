---
Title: actionProductCancel
hidden: true
hookTitle: 'Product cancelled'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/src/Adapter/Order/CommandHandler/CancelOrderProductHandler.php'
        file: src/Adapter/Order/CommandHandler/CancelOrderProductHandler.php
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/src/Adapter/Order/CommandHandler/IssuePartialRefundHandler.php'
        file: src/Adapter/Order/CommandHandler/IssuePartialRefundHandler.php
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/src/Adapter/Order/CommandHandler/IssueReturnProductHandler.php'
        file: src/Adapter/Order/CommandHandler/IssueReturnProductHandler.php
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/src/Adapter/Order/CommandHandler/IssueStandardRefundHandler.php'
        file: src/Adapter/Order/CommandHandler/IssueStandardRefundHandler.php
locations:
    - 'front office'
type: action
hookAliases:
    - cancelProduct
array_return: false
check_exceptions: true
chain: false
origin: core
description: 'This hook is called when you cancel a product in an order'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec('actionProductCancel', ['order' => $order, 'id_order_detail' => (int) $orderDetail->id_order_detail, 'cancel_quantity' => $qty_cancel_product, 'action' => CancellationActionType::CANCEL_PRODUCT], null, false, true, false, $order->id_shop)
```
