---
Title: actionPresentPaymentOptions
hidden: true
hookTitle: 'Payment options Presenter'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/checkout/PaymentOptionsFinder.php'
        file: classes/checkout/PaymentOptionsFinder.php
locations:
    - 'front office'
type: action
hookAliases: 
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook is called before payment options are presented'

---

{{% hookDescriptor %}}

## Parameters details

```php
    <?php
    [
        'paymentOptions' => (array) &$paymentOptions,
    ]
```

## Call of the Hook in the origin file

```php
Hook::exec('actionPresentPaymentOptions',
            ['paymentOptions' => &$paymentOptions]
        )
```
