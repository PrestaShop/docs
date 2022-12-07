---
menuTitle: actionCarrierUpdate
Title: actionCarrierUpdate
hidden: true
hookTitle: Carrier Update
files:
  - controllers/admin/AdminCarriersController.php
locations:
  - backoffice
type:
  - action
hookAliases:
 - updateCarrier
---

# Hook actionCarrierUpdate

Aliases: 
 - updateCarrier



## Information

{{% notice tip %}}
**Carrier Update:** 

This hook is called when a carrier is updated
{{% /notice %}}

Hook locations: 
  - backoffice

Hook type: 
  - action

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/controllers/admin/AdminCarriersController.php](controllers/admin/AdminCarriersController.php)

## Hook call in codebase

```php
Hook::exec('actionCarrierUpdate', [
                                    'id_carrier' => (int) $current_carrier->id,
                                    'carrier' => $new_carrier,
                                ])
```