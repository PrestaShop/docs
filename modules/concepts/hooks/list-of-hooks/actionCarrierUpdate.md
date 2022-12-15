---
menuTitle: actionCarrierUpdate
Title: actionCarrierUpdate
hidden: true
hookTitle: Carrier Update
files:
  - controllers/admin/AdminCarriersController.php
locations:
  - back office
type: action
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
  - back office

Hook type: action

Located in: 
  - [controllers/admin/AdminCarriersController.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/controllers/admin/AdminCarriersController.php)

## Call of the Hook in the origin file

```php
Hook::exec('actionCarrierUpdate', [
                                    'id_carrier' => (int) $current_carrier->id,
                                    'carrier' => $new_carrier,
                                ])
```