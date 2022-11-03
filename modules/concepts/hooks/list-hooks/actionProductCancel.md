---
menuTitle: actionProductCancel
title: actionProductCancel
hidden: true
files:
  - src/Adapter/Order/CommandHandler/IssueStandardRefundHandler.php
types:
  - frontoffice
hookTypes:
  - legacy
---

# Hook : actionProductCancel

Located in :

  - src/Adapter/Order/CommandHandler/IssueStandardRefundHandler.php

## Parameters

```php
Hook::exec('actionProductCancel', ['order' => $order, 'id_order_detail' => (int) $orderDetailId, 'cancel_quantity' => $productRefund['quantity'], 'action' => CancellationActionType::STANDARD_REFUND], null, false, true, false, $order->id_shop);
```