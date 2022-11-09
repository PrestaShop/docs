---
menuTitle: actionValidateOrder
Title: actionValidateOrder
hidden: true
hookTitle: New orders
files:
  - classes/PaymentModule.php
locations:
  - frontoffice
types:
  - legacy
---

# Hook : actionValidateOrder

## Informations

{{% notice tip %}}
**New orders:** 


{{% /notice %}}

Hook locations: 
  - frontoffice

Hook types: 
  - legacy

Located in: 
  - classes/PaymentModule.php

## Hook call with parameters

```php
Hook::exec('actionValidateOrder', [
                'cart' => $this->context->cart,
                'order' => $order,
                'customer' => $this->context->customer,
                'currency' => $this->context->currency,
                'orderStatus' => $order_status,
            ]);
```