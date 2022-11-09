---
menuTitle: actionOrderHistoryAddAfter
Title: actionOrderHistoryAddAfter
hidden: true
hookTitle: 
files:
  - classes/order/OrderHistory.php
locations:
  - frontoffice
types:
  - legacy
---

# Hook : actionOrderHistoryAddAfter

## Informations

Hook locations: 
  - frontoffice

Hook types: 
  - legacy

Located in: 
  - classes/order/OrderHistory.php

## Hook call with parameters

```php
Hook::exec('actionOrderHistoryAddAfter', ['order_history' => $this], null, false, true, false, $order->id_shop);
```