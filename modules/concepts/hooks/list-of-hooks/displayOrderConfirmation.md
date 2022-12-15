---
menuTitle: displayOrderConfirmation
Title: displayOrderConfirmation
hidden: true
hookTitle: Order confirmation page
files:
  - controllers/front/OrderConfirmationController.php
locations:
  - front office
type: display
hookAliases:
 - orderConfirmation
---

# Hook displayOrderConfirmation

Aliases: 
 - orderConfirmation



## Information

{{% notice tip %}}
**Order confirmation page:** 

This hook is called within an order's confirmation page
{{% /notice %}}

Hook locations: 
  - front office

Hook type: display

Located in: 
  - [controllers/front/OrderConfirmationController.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/controllers/front/OrderConfirmationController.php)

## Parameters details

```php
    <?php
    array(
      'order' => (object) Order
    );
```

## Call of the Hook in the origin file

```php
Hook::exec('displayOrderConfirmation', ['order' => $order])
```