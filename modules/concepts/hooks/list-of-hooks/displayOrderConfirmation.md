---
menuTitle: displayOrderConfirmation
Title: displayOrderConfirmation
hidden: true
hookTitle: 'Order confirmation page'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/controllers/front/OrderConfirmationController.php'
        file: controllers/front/OrderConfirmationController.php
locations:
    - 'front office'
type: display
hookAliases:
    - orderConfirmation
array_return: false
check_exceptions: false
chain: false
origin: core
description: "This hook is called within an order's confirmation page"

---

{{% hookDescriptor %}}

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
