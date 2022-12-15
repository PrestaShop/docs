---
menuTitle: actionDeliveryPriceByWeight
Title: actionDeliveryPriceByWeight
hidden: true
hookTitle: 
files:
  - classes/Carrier.php
locations:
  - front office
type: action
hookAliases:
---

# Hook actionDeliveryPriceByWeight

## Information

Hook locations: 
  - front office

Hook type: action

Located in: 
  - [classes/Carrier.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/Carrier.php)

## Call of the Hook in the origin file

```php
Hook::exec('actionDeliveryPriceByWeight', ['id_carrier' => $id_carrier, 'total_weight' => $total_weight, 'id_zone' => $id_zone])
```