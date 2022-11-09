---
menuTitle: actionPaymentConfirmation
Title: actionPaymentConfirmation
hidden: true
hookTitle: Payment confirmation
files:
  - classes/order/OrderHistory.php
locations:
  - frontoffice
types:
  - legacy
---

# Hook : actionPaymentConfirmation

## Informations

{{% notice tip %}}
**Payment confirmation:** 

This hook displays new elements after the payment is validated
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook types: 
  - legacy

Located in: 
  - classes/order/OrderHistory.php

## Hook call with parameters

```php
Hook::exec('actionPaymentConfirmation', ['id_order' => (int) $order->id], null, false, true, false, $order->id_shop);
```