---
menuTitle: displayOrderDetail
Title: displayOrderDetail
hidden: true
hookTitle: Order detail
files:
  - controllers/front/OrderDetailController.php
locations:
  - frontoffice
types:
  - legacy
---

# Hook : displayOrderDetail

## Informations

{{% notice tip %}}
**Order detail:** 

This hook is displayed within the order's details in Front Office
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook types: 
  - legacy

Located in: 
  - controllers/front/OrderDetailController.php

## Hook call with parameters

```php
Hook::exec('displayOrderDetail', ['order' => $order]),
```