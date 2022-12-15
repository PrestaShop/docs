---
menuTitle: actionPaymentCCAdd
Title: actionPaymentCCAdd
hidden: true
hookTitle: Payment CC added
files:
  - classes/order/OrderPayment.php
locations:
  - front office
type: action
hookAliases:
 - paymentCCAdded
---

# Hook actionPaymentCCAdd

Aliases: 
 - paymentCCAdded



## Information

{{% notice tip %}}
**Payment CC added:** 


{{% /notice %}}

Hook locations: 
  - front office

Hook type: action

Located in: 
  - [classes/order/OrderPayment.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/order/OrderPayment.php)

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