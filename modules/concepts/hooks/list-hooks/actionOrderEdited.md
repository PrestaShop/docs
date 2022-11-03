---
menuTitle: actionOrderEdited
title: actionOrderEdited
hidden: true
files:
  - src/Adapter/Order/CommandHandler/UpdateProductInOrderHandler.php
types:
  - frontoffice
hookTypes:
  - legacy
---

# Hook : actionOrderEdited

Located in :

  - src/Adapter/Order/CommandHandler/UpdateProductInOrderHandler.php

## Parameters

```php
Hook::exec('actionOrderEdited', ['order' => $order]);
```