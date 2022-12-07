---
menuTitle: actionAttributeCombinationSave
Title: actionAttributeCombinationSave
hidden: true
hookTitle: 
files:
  - classes/Combination.php
locations:
  - frontoffice
type:
  - action
hookAliases:
---

# Hook actionAttributeCombinationSave

## Information

Hook locations: 
  - frontoffice

Hook type: 
  - action

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/Combination.php](classes/Combination.php)

## Hook call in codebase

```php
Hook::exec('actionAttributeCombinationSave', ['id_product_attribute' => (int) $this->id, 'id_attributes' => $idsAttribute])
```