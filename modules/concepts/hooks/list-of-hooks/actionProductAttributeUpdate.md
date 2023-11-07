---
Title: actionProductAttributeUpdate
hidden: true
hookTitle: 'Product attribute update'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/Product.php'
        file: classes/Product.php
locations:
    - 'front office'
type: action
hookAliases:
    - updateProductAttribute
array_return: false
check_exceptions: false
chain: false
origin: core
description: "This hook is displayed when a product's attribute is updated"

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec('actionProductAttributeUpdate', ['id_product_attribute' => (int) $id_product_attribute])
```
