---
menuTitle: actionObjectProductInCartDeleteBefore
Title: actionObjectProductInCartDeleteBefore
hidden: true
hookTitle: Cart product removal
files:
  - controllers/front/CartController.php
locations:
  - backoffice
  - frontoffice
types:
  - legacy
---

# Hook : actionObjectProductInCartDeleteBefore

## Informations

{{% notice tip %}}
**Cart product removal:** 

This hook is called before a product is removed from a cart
{{% /notice %}}

Hook locations: 
  - backoffice
  - frontoffice

Hook types: 
  - legacy

Located in: 
  - controllers/front/CartController.php

## Hook call with parameters

```php
Hook::exec('actionObjectProductInCartDeleteBefore', $data, null, true);
```