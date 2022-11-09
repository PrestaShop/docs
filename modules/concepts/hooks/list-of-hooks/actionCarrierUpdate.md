---
menuTitle: actionCarrierUpdate
Title: actionCarrierUpdate
hidden: true
hookTitle: Carrier Update
files:
  - controllers/admin/AdminCarriersController.php
locations:
  - backoffice
types:
  - legacy
---

# Hook : actionCarrierUpdate

## Informations

{{% notice tip %}}
**Carrier Update:** 

This hook is called when a carrier is updated
{{% /notice %}}

Hook locations: 
  - backoffice

Hook types: 
  - legacy

Located in: 
  - controllers/admin/AdminCarriersController.php

## Hook call with parameters

```php
Hook::exec('actionCarrierUpdate', [
                                    'id_carrier' => (int) $current_carrier->id,
                                    'carrier' => $new_carrier,
                                ]);
```