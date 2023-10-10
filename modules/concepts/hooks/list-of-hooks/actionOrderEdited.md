---
menuTitle: actionOrderEdited
Title: actionOrderEdited
hidden: true
hookTitle: 'Order edited'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/Adapter/Order/CommandHandler/UpdateProductInOrderHandler.php'
        file: src/Adapter/Order/CommandHandler/UpdateProductInOrderHandler.php
locations:
    - 'front office'
type: action
hookAliases: 
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook is called when an order is edited'

---

{{% hookDescriptor %}}

## Parameters details

```php
      <?php
        array( 'order' => (object) Order
      );
```

## Call of the Hook in the origin file

```php
Hook::exec('actionOrderEdited', ['order' => $order])
```
