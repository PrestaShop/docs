---
menuTitle: displayAfterCarrier
Title: displayAfterCarrier
hidden: true
hookTitle: 'After carriers list'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/checkout/CheckoutDeliveryStep.php'
        file: classes/checkout/CheckoutDeliveryStep.php
locations:
    - 'front office'
type: display
hookAliases: null
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook is displayed after the carrier list in Front Office'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec('displayAfterCarrier', ['cart' => $this->getCheckoutSession()->getCart()])
```
