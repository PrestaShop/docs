---
menuTitle: displayAfterCarrier
title: displayAfterCarrier
hidden: true
files:
  - classes/checkout/CheckoutDeliveryStep.php
types:
  - frontoffice
hookTypes:
  - legacy
---

# Hook : displayAfterCarrier

Located in :

  - classes/checkout/CheckoutDeliveryStep.php

## Parameters

```php
Hook::exec('displayAfterCarrier', ['cart' => $this->getCheckoutSession()->getCart()]),
```