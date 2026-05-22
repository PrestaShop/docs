---
Title: displayAfterCarrier
hidden: true
hookTitle: 'After carriers list'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/classes/checkout/CheckoutDeliveryStep.php'
        file: classes/checkout/CheckoutDeliveryStep.php
locations:
    - 'front office'
type: display
hookAliases: 
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook is displayed after the carrier list in Front Office'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
'hookDisplayAfterCarrier' => Hook::exec('displayAfterCarrier', ['cart' => $this->getCheckoutSession()->getCart()]), 'id_address' => $this->getCheckoutSession()->getIdAddressDelivery(), 'delivery_options' => $this->getCheckoutSession()->getDeliveryOptions(), 'delivery_option' => $this->getCheckoutSession()->getSelectedDeliveryOption(), 'recyclable' => $this->getCheckoutSession()->isRecyclable(), 'recyclablePackAllowed' => $this->isRecyclablePackAllowed(),
```
