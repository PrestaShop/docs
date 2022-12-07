---
menuTitle: deleteProductAttribute
Title: deleteProductAttribute
hidden: true
hookTitle: 
files:
  - classes/Product.php
locations:
  - frontoffice
type:
  - 
hookAliases:
---

# Hook deleteProductAttribute

## Information

Hook locations: 
  - frontoffice

Hook type: 
  - 

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/Product.php](classes/Product.php)

## Hook call in codebase

```php
Hook::exec(
            'deleteProductAttribute',
            [
                'id_product_attribute' => $id_product_attribute,
                'id_product' => $this->id,
                'deleteAllAttributes' => false,
            ]
        )
```