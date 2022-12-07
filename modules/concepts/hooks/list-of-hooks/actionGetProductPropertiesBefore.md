---
menuTitle: actionGetProductPropertiesBefore
Title: actionGetProductPropertiesBefore
hidden: true
hookTitle: 
files:
  - classes/Product.php
locations:
  - frontoffice
type:
  - action
hookAliases:
---

# Hook actionGetProductPropertiesBefore

## Information

Hook locations: 
  - frontoffice

Hook type: 
  - action

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/Product.php](classes/Product.php)

## Hook call in codebase

```php
Hook::exec('actionGetProductPropertiesBefore', [
            'id_lang' => $id_lang,
            'product' => &$row,
            'context' => $context,
        ])
```