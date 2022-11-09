---
menuTitle: actionObjectProductInCartDeleteAfter
Title: actionObjectProductInCartDeleteAfter
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

# Hook : actionObjectProductInCartDeleteAfter

## Informations

{{% notice tip %}}
**Cart product removal:** 

This hook is called after a product is removed from a cart
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
Hook::exec('actionObjectProductInCartDeleteAfter', $data);
```