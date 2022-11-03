---
menuTitle: actionDeliveryPriceByWeight
title: actionDeliveryPriceByWeight
hidden: true
files:
  - classes/Carrier.php
types:
  - frontoffice
hookTypes:
  - legacy
---

# Hook : actionDeliveryPriceByWeight

Located in :

  - classes/Carrier.php

## Parameters

```php
Hook::exec('actionDeliveryPriceByWeight', ['id_carrier' => $id_carrier, 'total_weight' => $total_weight, 'id_zone' => $id_zone]);
```