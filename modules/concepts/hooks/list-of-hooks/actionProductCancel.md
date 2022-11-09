---
menuTitle: actionProductCancel
Title: actionProductCancel
hidden: true
hookTitle: Product cancelled
files:
  - src/Adapter/Order/CommandHandler/IssueStandardRefundHandler.php
locations:
  - frontoffice
types:
  - legacy
---

# Hook : actionProductCancel

## Informations

{{% notice tip %}}
**Product cancelled:** 

This hook is called when you cancel a product in an order
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook types: 
  - legacy

Located in: 
  - src/Adapter/Order/CommandHandler/IssueStandardRefundHandler.php

## Hook call with parameters

```php
Hook::exec('actionProductCancel', ['order' => $order, 'id_order_detail' => (int) $orderDetailId, 'cancel_quantity' => $productRefund['quantity'], 'action' => CancellationActionType::STANDARD_REFUND], null, false, true, false, $order->id_shop);
```