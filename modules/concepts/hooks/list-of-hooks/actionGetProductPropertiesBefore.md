---
menuTitle: actionGetProductPropertiesBefore
Title: actionGetProductPropertiesBefore
hidden: true
hookTitle: 
files:
  - classes/Product.php
locations:
  - front office
type: action
hookAliases:
---

# Hook actionGetProductPropertiesBefore

## Information

Hook locations: 
  - front office

Hook type: action

Located in: 
  - [classes/Product.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/Product.php)

## Call of the Hook in the origin file

```php
Hook::exec('actionGetProductPropertiesBefore', [
            'id_lang' => $id_lang,
            'product' => &$row,
            'context' => $context,
        ])
```