---
Title: actionCheckoutRender
hidden: true
hookTitle: 'Modify checkout process'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/controllers/front/OrderController.php'
        file: controllers/front/OrderController.php
locations:
    - 'front office'
type: action
hookAliases: 
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook is called when constructing the checkout process'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec('actionCheckoutRender', ['checkoutProcess' => &$this->checkoutProcess])
```
