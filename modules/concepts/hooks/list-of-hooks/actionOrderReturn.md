---
menuTitle: actionOrderReturn
Title: actionOrderReturn
hidden: true
hookTitle: Returned product
files:
  - controllers/front/OrderFollowController.php
locations:
  - frontoffice
types:
  - legacy
---

# Hook : actionOrderReturn

## Informations

{{% notice tip %}}
**Returned product:** 

This hook is displayed when a customer returns a product 
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook types: 
  - legacy

Located in: 
  - controllers/front/OrderFollowController.php

## Hook call with parameters

```php
Hook::exec('actionOrderReturn', ['orderReturn' => $orderReturn]);
```