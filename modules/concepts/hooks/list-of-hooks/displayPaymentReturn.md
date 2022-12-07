---
menuTitle: displayPaymentReturn
Title: displayPaymentReturn
hidden: true
hookTitle: Payment return
files:
  - controllers/front/OrderConfirmationController.php
locations:
  - frontoffice
type:
  - display
hookAliases:
 - paymentReturn
---

# Hook displayPaymentReturn

Aliases: 
 - paymentReturn



## Information

{{% notice tip %}}
**Payment return:** 


{{% /notice %}}

Hook locations: 
  - frontoffice

Hook type: 
  - display

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/controllers/front/OrderConfirmationController.php](controllers/front/OrderConfirmationController.php)

## Hook call in codebase

```php
Hook::exec('displayPaymentReturn', ['order' => $order], $this->id_module)
```