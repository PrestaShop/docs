---
menuTitle: actionAdminProductsListingResultsModifier
Title: actionAdminProductsListingResultsModifier
hidden: true
hookTitle: 
files:
  - src/Adapter/Product/AdminProductDataProvider.php
locations:
  - backoffice
types:
  - legacy
---

# Hook : actionAdminProductsListingResultsModifier

## Informations

Hook locations: 
  - backoffice

Hook types: 
  - legacy

Located in: 
  - src/Adapter/Product/AdminProductDataProvider.php

## Hook call with parameters

```php
Hook::exec('actionAdminProductsListingResultsModifier', [
            '_ps_version' => AppKernel::VERSION,
            'products' => &$products,
            'total' => $total,
        ]);
```