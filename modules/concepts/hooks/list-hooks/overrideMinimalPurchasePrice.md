---
menuTitle: overrideMinimalPurchasePrice
title: overrideMinimalPurchasePrice
hidden: true
files:
  - src/Adapter/Presenter/Cart/CartPresenter.php
types:
  - frontoffice
hookTypes:
  - legacy
---

# Hook : overrideMinimalPurchasePrice

Located in :

  - src/Adapter/Presenter/Cart/CartPresenter.php

## Parameters

```php
Hook::exec('overrideMinimalPurchasePrice', [
            'minimalPurchase' => &$minimalPurchase,
        ]);
```