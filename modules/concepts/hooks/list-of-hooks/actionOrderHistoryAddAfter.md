---
menuTitle: actionOrderHistoryAddAfter
Title: actionOrderHistoryAddAfter
hidden: true
hookTitle: 
files:
  - classes/order/OrderHistory.php
locations:
  - front office
type: action
hookAliases:
---

# Hook actionOrderHistoryAddAfter

## Information

Hook locations: 
  - front office

Hook type: action

Located in: 
  - [classes/order/OrderHistory.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/order/OrderHistory.php)

## Call of the Hook in the origin file

```php
Hook::exec('actionOrderHistoryAddAfter', ['order_history' => $this], null, false, true, false, $order->id_shop)
```