---
menuTitle: actionProductDelete
Title: actionProductDelete
hidden: true
hookTitle: 'Product deletion'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/Product.php'
        file: classes/Product.php
locations:
    - 'front office'
type: action
hookAliases:
    - deleteproduct
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook is called when a product is deleted'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec('actionProductDelete', ['id_product' => (int) $this->id, 'product' => $this])
```
