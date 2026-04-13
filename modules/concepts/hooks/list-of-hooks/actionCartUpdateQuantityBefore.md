---
Title: actionCartUpdateQuantityBefore
hidden: true
hookTitle: 'Triggers before product is added to cart'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/classes/Cart.php'
        file: classes/Cart.php
locations:
    - 'front office'
type: action
hookAliases: actionCartUpdateQuantityBefore
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'Allows responding to add to cart events.'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec('actionCartUpdateQuantityBefore', $data);
```
