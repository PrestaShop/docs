---
Title: actionValidateOrderBefore
hidden: true
hookTitle: 'Before validating an order'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/classes/PaymentModule.php'
        file: classes/PaymentModule.php
locations:
    - 'front office'
type: action
hookAliases: 
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook is called before validating an order by core'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec('actionValidateOrderBefore', [
            'cart' => $this->context->cart,
            'customer' => $this->context->customer,
            'currency' => $this->context->currency,
            'id_order_state' => &$id_order_state,
            'payment_method' => $payment_method,
        ]);
```
