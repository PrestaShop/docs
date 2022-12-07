---
menuTitle: actionOrderSlipAdd
Title: actionOrderSlipAdd
hidden: true
hookTitle: Order slip creation
files:
  - src/Adapter/Order/Refund/OrderSlipCreator.php
locations:
  - frontoffice
type:
  - action
hookAliases:
 - orderSlip
---

# Hook actionOrderSlipAdd

Aliases: 
 - orderSlip



## Information

{{% notice tip %}}
**Order slip creation:** 

This hook is called when a new credit slip is added regarding client order
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook type: 
  - action

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/Adapter/Order/Refund/OrderSlipCreator.php](src/Adapter/Order/Refund/OrderSlipCreator.php)

## Parameters details

```php
    <?php
    array(
      'order' => Order,
      'productList' => array(
        (int) product ID 1,
        (int) product ID 2, 
        ...,
        (int) product ID n
      ),
      'qtyList' => array(
        (int) quantity 1,
        (int) quantity 2,
        ...,
        (int) quantity n 
      )
    );
    The order of IDs and quantities is important!
```

## Hook call in codebase

```php
Hook::exec('actionOrderSlipAdd', [
                'order' => $order,
                'productList' => $orderRefundSummary->getProductRefunds(),
                'qtyList' => $fullQuantityList,
            ], null, false, true, false, $order->id_shop)
```