---
menuTitle: overrideMinimalPurchasePrice
Title: overrideMinimalPurchasePrice
hidden: true
hookTitle: 
files:
  - src/Adapter/Presenter/Cart/CartPresenter.php
locations:
  - front office
type: 
hookAliases:
---

# Hook overrideMinimalPurchasePrice

## Information

Hook locations: 
  - front office

Located in: 
  - [src/Adapter/Presenter/Cart/CartPresenter.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/Adapter/Presenter/Cart/CartPresenter.php)

## Call of the Hook in the origin file

```php
Hook::exec('overrideMinimalPurchasePrice', [
            'minimalPurchase' => &$minimalPurchase,
        ])
```