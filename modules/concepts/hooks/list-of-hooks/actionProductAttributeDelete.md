---
Title: actionProductAttributeDelete
hidden: true
hookTitle: 'Product attribute deletion'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/Product.php'
        file: classes/Product.php
locations:
    - 'front office'
type: action
hookAliases:
    - deleteProductAttribute
array_return: false
check_exceptions: false
chain: false
origin: core
description: "This hook is displayed when a product's attribute is deleted"

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec('actionProductAttributeDelete', ['id_product_attribute' => 0, 'id_product' => (int) $this->id, 'deleteAllAttributes' => true])
```
