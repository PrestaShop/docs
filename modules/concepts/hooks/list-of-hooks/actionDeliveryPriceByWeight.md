---
menuTitle: actionDeliveryPriceByWeight
Title: actionDeliveryPriceByWeight
hidden: true
hookTitle: 
files:
  - classes/Carrier.php
locations:
  - frontoffice
types:
  - legacy
---

# Hook : actionDeliveryPriceByWeight

## Informations

Hook locations: 
  - frontoffice

Hook types: 
  - legacy

Located in: 
  - classes/Carrier.php

## Hook call with parameters

```php
Hook::exec('actionDeliveryPriceByWeight', ['id_carrier' => $id_carrier, 'total_weight' => $total_weight, 'id_zone' => $id_zone]);
```