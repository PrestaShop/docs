---
menuTitle: actionPaymentCCAdd
Title: actionPaymentCCAdd
hidden: true
hookTitle: Payment CC added
files:
  - classes/order/OrderPayment.php
locations:
  - frontoffice
type:
  - action
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
  - frontoffice

Hook type: 
  - action

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/order/OrderPayment.php](classes/order/OrderPayment.php)

## Parameters details

```php
    <?php
    array(
      'paymentCC' => (object) OrderPayment object
    );
```

## Hook call in codebase

```php
Hook::exec('actionPaymentCCAdd', ['paymentCC' => $this])
```