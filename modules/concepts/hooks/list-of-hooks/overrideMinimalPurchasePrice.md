---
Title: overrideMinimalPurchasePrice
hidden: true
hookTitle: ''
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/classes/controller/ModuleFrontController.php'
        file: classes/controller/ModuleFrontController.php
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/src/Adapter/Presenter/Cart/CartLazyArray.php'
        file: src/Adapter/Presenter/Cart/CartLazyArray.php
locations:
    - 'front office'
type: action
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
Hook::exec('overrideMinimalPurchasePrice', [ 'minimalPurchase' => &$minimalPurchase, ])
```
