---
menuTitle: deleteProductAttribute
Title: deleteProductAttribute
hidden: true
hookTitle: 
files:
  - classes/Product.php
locations:
  - front office
type: 
hookAliases:
---

# Hook deleteProductAttribute

## Information

Hook locations: 
  - front office

Hook type: 

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/Product.php](classes/Product.php)

## Call of the Hook in the origin file

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