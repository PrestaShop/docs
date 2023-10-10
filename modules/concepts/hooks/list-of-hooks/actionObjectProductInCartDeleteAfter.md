---
menuTitle: actionObjectProductInCartDeleteAfter
Title: actionObjectProductInCartDeleteAfter
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
hookAliases: 
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook is called after a product is removed from a cart'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec('actionObjectProductInCartDeleteAfter', $data)
```
