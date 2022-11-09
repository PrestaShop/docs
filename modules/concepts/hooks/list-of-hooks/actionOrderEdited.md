---
menuTitle: actionOrderEdited
Title: actionOrderEdited
hidden: true
hookTitle: Order edited
files:
  - src/Adapter/Order/CommandHandler/UpdateProductInOrderHandler.php
locations:
  - frontoffice
types:
  - legacy
---

# Hook : actionOrderEdited

## Informations

{{% notice tip %}}
**Order edited:** 

This hook is called when an order is edited
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook types: 
  - legacy

Located in: 
  - src/Adapter/Order/CommandHandler/UpdateProductInOrderHandler.php

## Hook call with parameters

```php
Hook::exec('actionOrderEdited', ['order' => $order]);
```