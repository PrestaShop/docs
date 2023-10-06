---
menuTitle: actionCartSave
Title: actionCartSave
hidden: true
hookTitle: 'Cart creation and update'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/Cart.php'
        file: classes/Cart.php
locations:
    - 'front office'
type: action
hookAliases:
    - cart
array_return: false
check_exceptions: false
chain: false
origin: core
description: "This hook is displayed when a product is added to the cart or if the cart's content is modified"

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec('actionCartSave', ['cart' => $this])
```
