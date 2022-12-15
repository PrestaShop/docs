---
menuTitle: actionSetInvoice
Title: actionSetInvoice
hidden: true
hookTitle: 
files:
  - classes/order/Order.php
locations:
  - front office
type: action
hookAliases:
---

# Hook actionSetInvoice

## Information

Hook locations: 
  - front office

Hook type: action

Located in: 
  - [classes/order/Order.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/order/Order.php)

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