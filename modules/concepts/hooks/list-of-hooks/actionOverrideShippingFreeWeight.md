---
Title: actionOverrideShippingFreeWeight
hidden: true
hookTitle: 'Override weight that determines free shipping'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/classes/Cart.php'
        file: classes/Cart.php
locations:
    - 'front office'
type: action
hookAliases: 
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'Allows modules to override the free shipping weight and return their custom value, for example to specify it by zone or other criteria.'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec('actionOverrideShippingFreeWeight', ['shippingFreeWeight' => &$shippingFreeWeight, 'id_zone' => $id_zone, 'id_currency' => $this->id_currency]);
```
