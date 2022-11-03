---
menuTitle: actionOrderSlipAdd
title: actionOrderSlipAdd
hidden: true
files:
  - src/Adapter/Order/Refund/OrderSlipCreator.php
types:
  - frontoffice
hookTypes:
  - legacy
---

# Hook : actionOrderSlipAdd

Located in :

  - src/Adapter/Order/Refund/OrderSlipCreator.php

## Parameters

```php
Hook::exec('actionOrderSlipAdd', [
                'order' => $order,
                'productList' => $orderRefundSummary->getProductRefunds(),
                'qtyList' => $fullQuantityList,
            ], null, false, true, false, $order->id_shop);
```