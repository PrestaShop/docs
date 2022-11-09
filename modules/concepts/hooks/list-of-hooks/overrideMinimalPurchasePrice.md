---
menuTitle: overrideMinimalPurchasePrice
Title: overrideMinimalPurchasePrice
hidden: true
hookTitle: 
files:
  - src/Adapter/Presenter/Cart/CartPresenter.php
locations:
  - frontoffice
types:
  - legacy
---

# Hook : overrideMinimalPurchasePrice

## Informations

Hook locations: 
  - frontoffice

Hook types: 
  - legacy

Located in: 
  - src/Adapter/Presenter/Cart/CartPresenter.php

## Hook call with parameters

```php
Hook::exec('overrideMinimalPurchasePrice', [
            'minimalPurchase' => &$minimalPurchase,
        ]);
```