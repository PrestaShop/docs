---
menuTitle: actionObjectProductInCartDeleteBefore
Title: actionObjectProductInCartDeleteBefore
hidden: true
hookTitle: 'Cart product removal'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/controllers/front/CartController.php'
        file: controllers/front/CartController.php
locations:
    - 'back office'
    - 'front office'
type: action
hookAliases: null
array_return: true
check_exceptions: false
chain: false
origin: core
description: 'This hook is called before a product is removed from a cart'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec('actionObjectProductInCartDeleteBefore', $data, null, true)
```
