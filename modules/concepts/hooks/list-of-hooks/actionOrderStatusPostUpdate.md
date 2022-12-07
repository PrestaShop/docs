---
menuTitle: actionOrderStatusPostUpdate
Title: actionOrderStatusPostUpdate
hidden: true
hookTitle: Post update of order status
files:
  - classes/order/OrderHistory.php
locations:
  - frontoffice
type:
  - action
hookAliases:
 - postUpdateOrderStatus
---

# Hook actionOrderStatusPostUpdate

Aliases: 
 - postUpdateOrderStatus



## Information

{{% notice tip %}}
**Post update of order status:** 


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
Hook::exec('actionOrderStatusPostUpdate', [
            'newOrderStatus' => $new_os,
            'oldOrderStatus' => $old_os,
            'id_order' => (int) $order->id,
        ], null, false, true, false, $order->id_shop)
```