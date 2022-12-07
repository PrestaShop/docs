---
menuTitle: actionDeliveryPriceByWeight
Title: actionDeliveryPriceByWeight
hidden: true
hookTitle: 
files:
  - classes/Carrier.php
locations:
  - frontoffice
type:
  - action
hookAliases:
---

# Hook actionDeliveryPriceByWeight

## Information

Hook locations: 
  - frontoffice

Hook type: 
  - action

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/Carrier.php](classes/Carrier.php)

## Hook call in codebase

```php
Hook::exec('actionDeliveryPriceByWeight', ['id_carrier' => $id_carrier, 'total_weight' => $total_weight, 'id_zone' => $id_zone])
```