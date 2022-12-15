---
menuTitle: actionAdminOrdersTrackingNumberUpdate
Title: actionAdminOrdersTrackingNumberUpdate
hidden: true
hookTitle: After setting the tracking number for the order
files:
  - src/Adapter/Order/CommandHandler/UpdateOrderShippingDetailsHandler.php
locations:
  - back office
type: action
hookAliases:
---

# Hook actionAdminOrdersTrackingNumberUpdate

## Information

{{% notice tip %}}
**After setting the tracking number for the order:** 

This hook allows you to execute code after the unique tracking number for the order was added
{{% /notice %}}

Hook locations: 
  - back office

Hook type: action

Located in: 
  - [src/Adapter/Order/CommandHandler/UpdateOrderShippingDetailsHandler.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/Adapter/Order/CommandHandler/UpdateOrderShippingDetailsHandler.php)

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