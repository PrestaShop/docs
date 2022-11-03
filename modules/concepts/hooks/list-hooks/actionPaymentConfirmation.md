---
menuTitle: actionPaymentConfirmation
title: actionPaymentConfirmation
hidden: true
files:
  - classes/order/OrderHistory.php
types:
  - frontoffice
hookTypes:
  - legacy
---

# Hook : actionPaymentConfirmation

Located in :

  - classes/order/OrderHistory.php

## Parameters

```php
Hook::exec('actionPaymentConfirmation', ['id_order' => (int) $order->id], null, false, true, false, $order->id_shop);
```