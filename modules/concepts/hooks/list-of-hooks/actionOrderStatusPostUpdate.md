---
menuTitle: actionOrderStatusPostUpdate
Title: actionOrderStatusPostUpdate
hidden: true
hookTitle: Post update of order status
files:
  - classes/order/OrderHistory.php
locations:
  - front office
type: action
hookAliases:
 - postUpdateOrderStatus
---

# Hook actionOrderStatusPostUpdate

Aliases: 
 - postUpdateOrderStatus



## Information

{{% notice tip %}}
**Post update of order status:** 
Allows to be notified after order status is changed.
{{% /notice %}}

Hook locations: 
  - front office

Hook type: action

Located in: 
  - [classes/order/OrderHistory.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/order/OrderHistory.php)

## Parameters details

```php
    <?php
    array(
      'newOrderStatus' => (object) OrderState,
      'oldOrderStatus' => (object) OrderState,
      'id_order' => (int) Order ID
    );
```

## Call of the Hook in the origin file

```php
Hook::exec('actionOrderStatusPostUpdate', [
            'newOrderStatus' => $new_os,
            'oldOrderStatus' => $old_os,
            'id_order' => (int) $order->id,
        ], null, false, true, false, $order->id_shop)
```