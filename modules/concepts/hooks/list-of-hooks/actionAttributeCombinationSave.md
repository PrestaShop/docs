---
menuTitle: actionAttributeCombinationSave
Title: actionAttributeCombinationSave
hidden: true
hookTitle: 
files:
  - classes/Combination.php
locations:
  - front office
type: action
hookAliases:
---

# Hook actionAttributeCombinationSave

## Information

Hook locations: 
  - front office

Hook type: action

Located in: 
  - [classes/Combination.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/Combination.php)

## Call of the Hook in the origin file

```php
Hook::exec('actionAttributeCombinationSave', ['id_product_attribute' => (int) $this->id, 'id_attributes' => $idsAttribute])
```