---
menuTitle: actionSetInvoice
title: actionSetInvoice
hidden: true
files:
  - classes/order/Order.php
types:
  - frontoffice
hookTypes:
  - legacy
---

# Hook : actionSetInvoice

Located in :

  - classes/order/Order.php

## Parameters

```php
Hook::exec('actionSetInvoice', [
                    get_class($this) => $this,
                    get_class($order_invoice) => $order_invoice,
                    'use_existing_payment' => (bool) $use_existing_payment,
                ]);
```