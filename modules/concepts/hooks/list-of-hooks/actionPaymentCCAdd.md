---
menuTitle: actionPaymentCCAdd
Title: actionPaymentCCAdd
hidden: true
hookTitle: 'Payment CC added'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/order/OrderPayment.php'
        file: classes/order/OrderPayment.php
locations:
    - 'front office'
type: action
hookAliases:
    - paymentCCAdded
array_return: false
check_exceptions: false
chain: false
origin: core
description: ''

---

{{% hookDescriptor %}}

## Parameters details

```php
    <?php
    array(
      'paymentCC' => (object) OrderPayment object
    );
```

## Call of the Hook in the origin file

```php
Hook::exec('actionPaymentCCAdd', ['paymentCC' => $this])
```
