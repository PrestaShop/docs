---
menuTitle: actionCarrierUpdate
title: actionCarrierUpdate
hidden: true
files:
  - controllers/admin/AdminCarriersController.php
types:
  - backoffice
hookTypes:
  - legacy
---

# Hook : actionCarrierUpdate

Located in :

  - controllers/admin/AdminCarriersController.php

## Parameters

```php
Hook::exec('actionCarrierUpdate', [
                                    'id_carrier' => (int) $current_carrier->id,
                                    'carrier' => $new_carrier,
                                ]);
```