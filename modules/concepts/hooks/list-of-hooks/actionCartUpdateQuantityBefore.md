---
menuTitle: actionCartUpdateQuantityBefore
Title: actionCartUpdateQuantityBefore
hidden: true
hookTitle: 
files:
  - classes/Cart.php
locations:
  - front office
type: action
hookAliases:
 - actionBeforeCartUpdateQty
---

# Hook actionCartUpdateQuantityBefore

Aliases: 
 - actionBeforeCartUpdateQty



## Information

Hook locations: 
  - front office

Hook type: action

Located in: 
  - [classes/Cart.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/Cart.php)

## Call of the Hook in the origin file

```php
Hook::exec('actionCartUpdateQuantityBefore', $data)
```