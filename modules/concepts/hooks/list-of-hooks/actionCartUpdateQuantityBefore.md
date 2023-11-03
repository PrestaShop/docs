---
Title: actionCartUpdateQuantityBefore
hidden: true
hookTitle: 
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/Cart.php'
        file: classes/Cart.php
locations:
    - 'front office'
type: action
hookAliases:
    - actionBeforeCartUpdateQty
array_return: false
check_exceptions: false
chain: false
origin: core
description: ''

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec('actionCartUpdateQuantityBefore', $data)
```
