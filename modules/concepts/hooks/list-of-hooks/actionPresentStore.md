---
Title: actionPresentStore
hidden: true
hookTitle: 'Store Presenter'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/src/Adapter/Presenter/Store/StorePresenter.php'
        file: src/Adapter/Presenter/Store/StorePresenter.php
locations:
    - 'front office'
type: action
hookAliases: 
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook is called before a store is presented'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec('actionPresentStore', ['presentedStore' => &$storeLazyArray] )
```
