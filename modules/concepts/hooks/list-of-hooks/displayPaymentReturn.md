---
menuTitle: displayPaymentReturn
Title: displayPaymentReturn
hidden: true
hookTitle: Payment return
files:
  - controllers/front/OrderConfirmationController.php
locations:
  - front office
type: display
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
  - front office

Hook type: display

Located in: 
  - [controllers/front/OrderConfirmationController.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/controllers/front/OrderConfirmationController.php)

## Call of the Hook in the origin file

```php
Hook::exec('displayPaymentReturn', ['order' => $order], $this->id_module)
```