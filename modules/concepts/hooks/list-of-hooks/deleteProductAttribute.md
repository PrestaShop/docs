---
Title: deleteProductAttribute
hidden: true
hookTitle: files:
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/classes/Product.php'
        file: classes/Product.php
locations:
    - 'front office'
type: action
hookAliases: 
array_return: false
check_exceptions: false
chain: false
origin: core
description: ''

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
'deleteProductAttribute',
            [
                'id_product_attribute' => $id_product_attribute,
                'id_product' => $this->id,
                'deleteAllAttributes' => false,
            ]
```
