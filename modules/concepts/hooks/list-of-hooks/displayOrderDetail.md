---
menuTitle: displayOrderDetail
Title: displayOrderDetail
hidden: true
hookTitle: 'Order detail'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/controllers/front/OrderDetailController.php'
        file: controllers/front/OrderDetailController.php
locations:
    - 'front office'
type: display
hookAliases:
    - orderDetailDisplayed
array_return: false
check_exceptions: false
chain: false
origin: core
description: "This hook is displayed within the order's details in Front Office"

---

{{% hookDescriptor %}}

## Parameters details

```php
    <?php
    array(
      'order' => (object) Order object
    );
```

## Call of the Hook in the origin file

```php
Hook::exec('displayOrderDetail', ['order' => $order])
```
