---
menuTitle: actionGetIDZoneByAddressID
Title: actionGetIDZoneByAddressID
hidden: true
hookTitle: 
files:
  - classes/Address.php
locations:
  - front office
type: action
hookAliases:
---

# Hook actionGetIDZoneByAddressID

## Information

Hook locations: 
  - front office

Hook type: action

Located in: 
  - [classes/Address.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/Address.php)

## Call of the Hook in the origin file

```php
Hook::exec('actionGetIDZoneByAddressID', ['id_address' => $id_address])
```