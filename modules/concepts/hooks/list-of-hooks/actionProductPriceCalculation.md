---
Title: actionProductPriceCalculation
hidden: true
hookTitle: 'Product Price Calculation'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.1.x/classes/Product.php'
        file: classes/Product.php
locations:
    - 'back office'
type: action
hookAliases: 
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook is called into the priceCalculation method to be able to override the price calculatio'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec('actionProductPriceCalculation', [
    'id_shop' => $id_shop,
    'id_product' => $id_product,
    'id_product_attribute' => $id_product_attribute,
    'id_customization' => $id_customization,
    'id_country' => $id_country,
    'id_state' => $id_state,
    'zip_code' => $zipcode,
    'id_currency' => $id_currency,
    'id_group' => $id_group,
    'id_cart' => $id_cart,
    'id_customer' => $id_customer,
    'use_customer_price' => $use_customer_price,
    'quantity' => $quantity,
    'real_quantity' => $real_quantity,
    'use_tax' => $use_tax,
    'decimals' => $decimals,
    'only_reduc' => $only_reduc,
    'use_reduc' => $use_reduc,
    'with_ecotax' => $with_ecotax,
    'specific_price' => &$specific_price,
    'use_group_reduction' => $use_group_reduction,
    'address' => $address,
    'context' => $context,
    'specific_price_reduction' => &$specific_price_reduction,
    'price' => &$price,
]);
```
