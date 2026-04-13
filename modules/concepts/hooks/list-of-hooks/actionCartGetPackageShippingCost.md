---
Title: actionCartGetPackageShippingCost
hidden: true
hookTitle: 'After getting package shipping cost value'
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
description: 'This hook is called in order to allow to modify package shipping cost'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec(
            'actionCartGetPackageShippingCost',
            [
                'cart' => $this,
                'id_carrier' => $id_carrier,
                'use_tax' => $use_tax,
                'default_country' => $default_country,
                'product_list' => $product_list,
                'id_zone' => $id_zone,
                'keepOrderPrices' => $keepOrderPrices,
                'shippingCost' => &$shippingCost,
            ]
        );
```
