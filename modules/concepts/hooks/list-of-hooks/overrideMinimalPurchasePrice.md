---
menuTitle: overrideMinimalPurchasePrice
Title: overrideMinimalPurchasePrice
hidden: true
hookTitle: 
files:
  - src/Adapter/Presenter/Cart/CartPresenter.php
locations:
  - frontoffice
type:
  - 
hookAliases:
---

# Hook overrideMinimalPurchasePrice

## Information

Hook locations: 
  - frontoffice

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/Adapter/Presenter/Cart/CartPresenter.php](src/Adapter/Presenter/Cart/CartPresenter.php)

## Hook call in codebase

```php
Hook::exec('overrideMinimalPurchasePrice', [
            'minimalPurchase' => &$minimalPurchase,
        ])
```