---
menuTitle: actionSetInvoice
Title: actionSetInvoice
hidden: true
hookTitle: 
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/order/Order.php'
        file: classes/order/Order.php
locations:
    - 'front office'
type: action
hookAliases: 
array_return: false
check_exceptions: false
chain: false
origin: core
description: ''

---

{{% hookDescriptor %}}

## Parameters details

```php
    <?php
    array(
      'Order' => order object,
      'OrderInvoice' => order invoice object,
      'use_existing_payment' => (bool)
    );
```

## Call of the Hook in the origin file

```php
Hook::exec('actionSetInvoice', [
                    get_class($this) => $this,
                    get_class($order_invoice) => $order_invoice,
                    'use_existing_payment' => (bool) $use_existing_payment,
                ])
```
