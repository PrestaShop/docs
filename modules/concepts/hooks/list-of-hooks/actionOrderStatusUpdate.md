---
menuTitle: actionOrderStatusUpdate
Title: actionOrderStatusUpdate
hidden: true
hookTitle: Order status update - Event
files:
  - classes/order/OrderHistory.php
locations:
  - frontoffice
type:
  - action
hookAliases:
 - updateOrderStatus
---

# Hook actionOrderStatusUpdate

Aliases: 
 - updateOrderStatus



## Information

{{% notice tip %}}
**Order status update - Event:** 

This hook launches modules when the status of an order changes
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook type: 
  - action

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/order/OrderHistory.php](classes/order/OrderHistory.php)

## Parameters details

```php
    <?php
    array(
      'newOrderStatus' => (object) OrderState,
      'oldOrderStatus' => (object) OrderState,
      'id_order' => (int) Order ID
    );
```

## Hook call in codebase

```php
Hook::exec('actionOrderStatusUpdate', [
            'newOrderStatus' => $new_os,
            'oldOrderStatus' => $old_os,
            'id_order' => (int) $order->id,
        ], null, false, true, false, $order->id_shop)
```