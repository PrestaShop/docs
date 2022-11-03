---
menuTitle: actionAdminProductsListingResultsModifier
title: actionAdminProductsListingResultsModifier
hidden: true
files:
  - src/Adapter/Product/AdminProductDataProvider.php
types:
  - backoffice
hookTypes:
  - legacy
---

# Hook : actionAdminProductsListingResultsModifier

Located in :

  - src/Adapter/Product/AdminProductDataProvider.php

## Parameters

```php
Hook::exec('actionAdminProductsListingResultsModifier', [
            '_ps_version' => AppKernel::VERSION,
            'products' => &$products,
            'total' => $total,
        ]);
```