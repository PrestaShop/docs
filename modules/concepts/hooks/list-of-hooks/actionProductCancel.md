---
menuTitle: actionProductCancel
Title: actionProductCancel
hidden: true
hookTitle: Product cancelled
files:
  - src/Adapter/Order/CommandHandler/IssueStandardRefundHandler.php
locations:
  - frontoffice
type:
  - action
hookAliases:
 - cancelProduct
---

# Hook actionProductCancel

Aliases: 
 - cancelProduct



## Information

{{% notice tip %}}
**Product cancelled:** 

This hook is called when you cancel a product in an order
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook type: 
  - action

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/Adapter/Order/CommandHandler/IssueStandardRefundHandler.php](src/Adapter/Order/CommandHandler/IssueStandardRefundHandler.php)

## Hook call in codebase

```php
Hook::exec('actionProductCancel', ['order' => $order, 'id_order_detail' => (int) $orderDetailId, 'cancel_quantity' => $productRefund['quantity'], 'action' => CancellationActionType::STANDARD_REFUND], null, false, true, false, $order->id_shop)
```