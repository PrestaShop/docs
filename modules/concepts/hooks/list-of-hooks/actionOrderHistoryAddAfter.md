---
menuTitle: actionOrderHistoryAddAfter
Title: actionOrderHistoryAddAfter
hidden: true
hookTitle: 
files:
  - classes/order/OrderHistory.php
locations:
  - frontoffice
type:
  - action
hookAliases:
---

# Hook actionOrderHistoryAddAfter

## Information

Hook locations: 
  - frontoffice

Hook type: 
  - action

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/order/OrderHistory.php](classes/order/OrderHistory.php)

## Hook call in codebase

```php
Hook::exec('actionOrderHistoryAddAfter', ['order_history' => $this], null, false, true, false, $order->id_shop)
```