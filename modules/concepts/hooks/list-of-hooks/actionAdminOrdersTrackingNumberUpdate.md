---
menuTitle: actionAdminOrdersTrackingNumberUpdate
Title: actionAdminOrdersTrackingNumberUpdate
hidden: true
hookTitle: 'After setting the tracking number for the order'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/Adapter/Order/CommandHandler/UpdateOrderShippingDetailsHandler.php'
        file: src/Adapter/Order/CommandHandler/UpdateOrderShippingDetailsHandler.php
locations:
    - 'back office'
type: action
hookAliases: null
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook allows you to execute code after the unique tracking number for the order was added'

---

{{% hookDescriptor %}}

## Parameters details

```php
    <?php
    array(
      'order' => (Order),
      'customer' => (Customer),
      'carrier' => (Carrier)
    );
```

## Call of the Hook in the origin file

```php
Hook::exec('actionAdminOrdersTrackingNumberUpdate', [
                    'order' => $order,
                    'customer' => $customer,
                    'carrier' => $carrier,
                ], null, false, true, false, $order->id_shop)
```
