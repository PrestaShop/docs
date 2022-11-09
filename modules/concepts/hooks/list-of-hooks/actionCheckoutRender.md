---
menuTitle: actionCheckoutRender
Title: actionCheckoutRender
hidden: true
hookTitle: Modify checkout process
files:
  - controllers/front/OrderController.php
locations:
  - frontoffice
types:
  - legacy
---

# Hook : actionCheckoutRender

## Informations

{{% notice tip %}}
**Modify checkout process:** 

This hook is called when constructing the checkout process
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook types: 
  - legacy

Located in: 
  - controllers/front/OrderController.php

## Hook call with parameters

```php
Hook::exec('actionCheckoutRender', ['checkoutProcess' => &$this->checkoutProcess]);
```