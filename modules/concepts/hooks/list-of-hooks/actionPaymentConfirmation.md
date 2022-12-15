---
menuTitle: actionPaymentConfirmation
Title: actionPaymentConfirmation
hidden: true
hookTitle: Payment confirmation
files:
  - classes/order/OrderHistory.php
locations:
  - front office
type: action
hookAliases:
 - paymentConfirm
---

# Hook actionPaymentConfirmation

Aliases: 
 - paymentConfirm



## Information

{{% notice tip %}}
**Payment confirmation:** 

This hook displays new elements after the payment is validated
{{% /notice %}}

Hook locations: 
  - front office

Hook type: action

Located in: 
  - [classes/order/OrderHistory.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/order/OrderHistory.php)

## Parameters details

```php
    <?php
    array(
      'id_order' => (int) Order ID
    );
```

## Call of the Hook in the origin file

```php
Hook::exec('actionPaymentConfirmation', ['id_order' => (int) $order->id], null, false, true, false, $order->id_shop)
```