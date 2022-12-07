---
menuTitle: displayAfterCarrier
Title: displayAfterCarrier
hidden: true
hookTitle: After carriers list
files:
  - classes/checkout/CheckoutDeliveryStep.php
locations:
  - frontoffice
type:
  - display
hookAliases:
---

# Hook displayAfterCarrier

## Information

{{% notice tip %}}
**After carriers list:** 

This hook is displayed after the carrier list in Front Office
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook type: 
  - display

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/checkout/CheckoutDeliveryStep.php](classes/checkout/CheckoutDeliveryStep.php)

## Hook call in codebase

```php
Hook::exec('displayAfterCarrier', ['cart' => $this->getCheckoutSession()->getCart()])
```