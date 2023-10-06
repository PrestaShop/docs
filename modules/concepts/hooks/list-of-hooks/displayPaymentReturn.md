---
menuTitle: displayPaymentReturn
Title: displayPaymentReturn
hidden: true
hookTitle: 'Payment return'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/controllers/front/OrderConfirmationController.php'
        file: controllers/front/OrderConfirmationController.php
locations:
    - 'front office'
type: display
hookAliases:
    - paymentReturn
array_return: false
check_exceptions: false
chain: false
origin: core
description: ''

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec('displayPaymentReturn', ['order' => $order], $this->id_module)
```
