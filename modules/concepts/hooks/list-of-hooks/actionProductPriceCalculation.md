---
Title: actionProductPriceCalculation
hidden: true
hookTitle: 'Product Price Calculation'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/classes/Product.php'
        file: classes/Product.php
locations:
    - 'front office'
type: action
hookAliases: 
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook is called into the priceCalculation method to be able to override the price calculation'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec('actionProductPriceCalculation', [ 'id_shop' => $id_shop, 'id_product' => $id_product, 'id_product_attribute' => $id_product_attribute, 'id_customization' => $id_customization, 'id_country' => $id_country,
```
