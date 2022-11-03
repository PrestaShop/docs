---
menuTitle: actionOrderHistoryAddAfter
title: actionOrderHistoryAddAfter
hidden: true
files:
  - classes/order/OrderHistory.php
types:
  - frontoffice
hookTypes:
  - legacy
---

# Hook : actionOrderHistoryAddAfter

Located in :

  - classes/order/OrderHistory.php

## Parameters

```php
Hook::exec('actionOrderHistoryAddAfter', ['order_history' => $this], null, false, true, false, $order->id_shop);
```