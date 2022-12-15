---
menuTitle: actionOrderReturn
Title: actionOrderReturn
hidden: true
hookTitle: Returned product
files:
  - controllers/front/OrderFollowController.php
locations:
  - front office
type: action
hookAliases:
 - orderReturn
---

# Hook actionOrderReturn

Aliases: 
 - orderReturn



## Information

{{% notice tip %}}
**Returned product:** 

This hook is displayed when a customer returns a product 
{{% /notice %}}

Hook locations: 
  - front office

Hook type: action

Located in: 
  - [controllers/front/OrderFollowController.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/controllers/front/OrderFollowController.php)

## Parameters details

```php
    <?php
    array(
      'orderReturn' => (object) OrderReturn
    );
```

## Call of the Hook in the origin file

```php
Hook::exec('actionOrderReturn', ['orderReturn' => $orderReturn])
```