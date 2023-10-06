---
menuTitle: actionPresentOrderReturn
Title: actionPresentOrderReturn
hidden: true
hookTitle: 'Order Return Presenter'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/Adapter/Presenter/Order/OrderReturnPresenter.php'
        file: src/Adapter/Presenter/Order/OrderReturnPresenter.php
locations:
    - 'front office'
type: action
hookAliases: null
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook is called before an order return is presented'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec('actionPresentOrderReturn',
            ['presentedOrderReturn' => &$orderReturnLazyArray]
        )
```
