---
menuTitle: actionAdminOrdersTrackingNumberUpdate
Title: actionAdminOrdersTrackingNumberUpdate
hidden: true
hookTitle: After setting the tracking number for the order
files:
  - src/Adapter/Order/CommandHandler/UpdateOrderShippingDetailsHandler.php
locations:
  - backoffice
types:
  - legacy
---

# Hook : actionAdminOrdersTrackingNumberUpdate

## Informations

{{% notice tip %}}
**After setting the tracking number for the order:** 

This hook allows you to execute code after the unique tracking number for the order was added
{{% /notice %}}

Hook locations: 
  - backoffice

Hook types: 
  - legacy

Located in: 
  - src/Adapter/Order/CommandHandler/UpdateOrderShippingDetailsHandler.php

## Hook call with parameters

```php
Hook::exec('actionAdminOrdersTrackingNumberUpdate', [
                    'order' => $order,
                    'customer' => $customer,
                    'carrier' => $carrier,
                ], null, false, true, false, $order->id_shop);
            }
        } finally {
            $this->contextStateManager->restorePreviousContext();
```