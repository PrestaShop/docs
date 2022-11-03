---
menuTitle: actionValidateOrder
title: actionValidateOrder
hidden: true
files:
  - classes/PaymentModule.php
types:
  - frontoffice
hookTypes:
  - legacy
---

# Hook : actionValidateOrder

Located in :

  - classes/PaymentModule.php

## Parameters

```php
Hook::exec('actionValidateOrder', [
                'cart' => $this->context->cart,
                'order' => $order,
                'customer' => $this->context->customer,
                'currency' => $this->context->currency,
                'orderStatus' => $order_status,
            ]);
```