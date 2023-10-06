---
menuTitle: actionGetAdminOrderButtons
Title: actionGetAdminOrderButtons
hidden: true
hookTitle: 'Admin Order Buttons'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Controller/Admin/Sell/Order/OrderController.php'
        file: src/PrestaShopBundle/Controller/Admin/Sell/Order/OrderController.php
locations:
    - 'back office'
type: action
hookAliases: null
hasExample: true
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook is used to generate the buttons collection on the order view page (see ActionsBarButtonsCollection)'

---

{{% hookDescriptor %}}

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

## Example implementation

This hook has been implemented as an example in our [modules examples repository - demovieworderhooks](https://github.com/PrestaShop/example-modules/tree/master/demovieworderhooks).
