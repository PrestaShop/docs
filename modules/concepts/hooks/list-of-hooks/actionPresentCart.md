---
menuTitle: actionPresentCart
Title: actionPresentCart
hidden: true
hookTitle: 'Cart Presenter'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/Adapter/Presenter/Cart/CartPresenter.php'
        file: src/Adapter/Presenter/Cart/CartPresenter.php
locations:
    - 'front office'
type: action
hookAliases: 
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook is called before a cart is presented'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec('actionPresentCart',
            ['presentedCart' => &$result]
        )
```
