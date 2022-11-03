---
menuTitle: actionCheckoutRender
title: actionCheckoutRender
hidden: true
files:
  - controllers/front/OrderController.php
types:
  - frontoffice
hookTypes:
  - legacy
---

# Hook : actionCheckoutRender

Located in :

  - controllers/front/OrderController.php

## Parameters

```php
Hook::exec('actionCheckoutRender', ['checkoutProcess' => &$this->checkoutProcess]);
```