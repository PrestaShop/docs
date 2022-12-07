---
menuTitle: displayOrderDetail
Title: displayOrderDetail
hidden: true
hookTitle: Order detail
files:
  - controllers/front/OrderDetailController.php
locations:
  - frontoffice
type:
  - display
hookAliases:
 - orderDetailDisplayed
---

# Hook displayOrderDetail

Aliases: 
 - orderDetailDisplayed



## Information

{{% notice tip %}}
**Order detail:** 

This hook is displayed within the order's details in Front Office
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook type: 
  - display

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/controllers/front/OrderDetailController.php](controllers/front/OrderDetailController.php)

## Parameters details

```php
    <?php
    array(
      'order' => (object) Order object
    );
```

## Hook call in codebase

```php
Hook::exec('displayOrderDetail', ['order' => $order])
```