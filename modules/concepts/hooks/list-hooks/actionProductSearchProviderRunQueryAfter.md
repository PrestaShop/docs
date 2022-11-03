---
menuTitle: actionProductSearchProviderRunQueryAfter
title: actionProductSearchProviderRunQueryAfter
hidden: true
files:
  - classes/controller/ProductListingFrontController.php
types:
  - frontoffice
hookTypes:
  - legacy
---

# Hook : actionProductSearchProviderRunQueryAfter

Located in :

  - classes/controller/ProductListingFrontController.php

## Parameters

```php
Hook::exec('actionProductSearchProviderRunQueryAfter', [
            'query' => $query,
            'result' => $result,
        ]);
```