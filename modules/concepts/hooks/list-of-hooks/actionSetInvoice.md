---
menuTitle: actionSetInvoice
Title: actionSetInvoice
hidden: true
hookTitle: 
files:
  - classes/order/Order.php
locations:
  - frontoffice
types:
  - legacy
---

# Hook : actionSetInvoice

## Informations

Hook locations: 
  - frontoffice

Hook types: 
  - legacy

Located in: 
  - classes/order/Order.php

## Hook call with parameters

```php
Hook::exec('actionSetInvoice', [
                    get_class($this) => $this,
                    get_class($order_invoice) => $order_invoice,
                    'use_existing_payment' => (bool) $use_existing_payment,
                ]);
```