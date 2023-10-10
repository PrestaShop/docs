---
menuTitle: overrideMinimalPurchasePrice
Title: overrideMinimalPurchasePrice
hidden: true
hookTitle: 
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/Adapter/Presenter/Cart/CartPresenter.php'
        file: src/Adapter/Presenter/Cart/CartPresenter.php
locations:
    - 'front office'
type: null
hookAliases: 
array_return: false
check_exceptions: false
chain: false
origin: core
description: ''

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec('overrideMinimalPurchasePrice', [
            'minimalPurchase' => &$minimalPurchase,
        ])
```
