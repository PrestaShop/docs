---
menuTitle: displayOrderConfirmation
Title: displayOrderConfirmation
hidden: true
hookTitle: Order confirmation page
files:
  - controllers/front/OrderConfirmationController.php
locations:
  - frontoffice
types:
  - legacy
---

# Hook : displayOrderConfirmation

## Informations

{{% notice tip %}}
**Order confirmation page:** 

This hook is called within an order's confirmation page
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook types: 
  - legacy

Located in: 
  - controllers/front/OrderConfirmationController.php

## Hook call with parameters

```php
Hook::exec('displayOrderConfirmation', ['order' => $order]);
```