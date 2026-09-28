---
Title: displayOrderDetailProductLine
hidden: true
hookTitle: 'Order detail product line'
files:
    -
        url: 'https://github.com/PrestaShop/hummingbird/blob/2.x/templates/customer/_partials/order-detail-product-line-return.tpl'
        file: themes/hummingbird/templates/customer/_partials/order-detail-product-line-return.tpl
locations:
    - 'front office'
type: display
hookAliases: 
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook is displayed on each product line of the order''s details in Front Office'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
{hook h='displayOrderDetailProductLine' id_order=$product.id_order id_order_detail=$product.id_order_detail id_product=$product.id_product};
```
