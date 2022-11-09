---
menuTitle: displayPaymentReturn
Title: displayPaymentReturn
hidden: true
hookTitle: Payment return
files:
  - controllers/front/OrderConfirmationController.php
locations:
  - frontoffice
types:
  - legacy
---

# Hook : displayPaymentReturn

## Informations

{{% notice tip %}}
**Payment return:** 


{{% /notice %}}

Hook locations: 
  - frontoffice

Hook types: 
  - legacy

Located in: 
  - controllers/front/OrderConfirmationController.php

## Hook call with parameters

```php
Hook::exec('displayPaymentReturn', ['order' => $order], $this->id_module);
```