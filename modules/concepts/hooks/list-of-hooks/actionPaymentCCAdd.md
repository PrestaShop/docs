---
menuTitle: actionPaymentCCAdd
Title: actionPaymentCCAdd
hidden: true
hookTitle: Payment CC added
files:
  - classes/order/OrderPayment.php
locations:
  - frontoffice
types:
  - legacy
---

# Hook : actionPaymentCCAdd

## Informations

{{% notice tip %}}
**Payment CC added:** 


{{% /notice %}}

Hook locations: 
  - frontoffice

Hook types: 
  - legacy

Located in: 
  - classes/order/OrderPayment.php

## Hook call with parameters

```php
Hook::exec('actionPaymentCCAdd', ['paymentCC' => $this]);
```