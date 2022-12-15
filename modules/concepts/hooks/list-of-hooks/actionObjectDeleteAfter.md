---
menuTitle: actionObjectDeleteAfter
Title: actionObjectDeleteAfter
hidden: true
hookTitle: 
files:
  - classes/ObjectModel.php
locations:
  - back office
  - front office
type: action
hookAliases:
---

# Hook actionObjectDeleteAfter

## Information

Hook locations: 
  - back office
  - front office

Hook type: action

Located in: 
  - [classes/ObjectModel.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/ObjectModel.php)

## Call of the Hook in the origin file

```php
Hook::exec('actionObjectDeleteAfter', ['object' => $this])
```