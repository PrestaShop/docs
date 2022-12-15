---
menuTitle: actionGetAdminOrderButtons
Title: actionGetAdminOrderButtons
hidden: true
hookTitle: Admin Order Buttons
files:
  - src/PrestaShopBundle/Controller/Admin/Sell/Order/OrderController.php
locations:
  - back office
type: action
hookAliases:
---

# Hook actionGetAdminOrderButtons

## Information

{{% notice tip %}}
**Admin Order Buttons:** 

This hook is used to generate the buttons collection on the order view page (see ActionsBarButtonsCollection)
{{% /notice %}}

Hook locations: 
  - back office

Hook type: action

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Controller/Admin/Sell/Order/OrderController.php](src/PrestaShopBundle/Controller/Admin/Sell/Order/OrderController.php)

## Parameters details

```php
    <?php
    array(
       'controller' => (OrderController) Symfony controller,
       'id_order' => (int) Order ID,
       'actions_bar_buttons_collection' => (ActionsBarButtonsCollection) Collection of ActionsBarButtonInterface
    );
```

## Call of the Hook in the origin file

```php
dispatchHook(
                'actionGetAdminOrderButtons',
                [
                    'controller' => $this,
                    'id_order' => $orderId,
                    'actions_bar_buttons_collection' => $back officeOrderButtons,
                ]
            )
```