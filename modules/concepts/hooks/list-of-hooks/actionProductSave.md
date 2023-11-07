---
Title: actionProductSave
hidden: true
hookTitle: 'Saving products'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/Product.php'
        file: classes/Product.php
locations:
    - 'front office'
type: action
hookAliases:
    - afterSaveProduct
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook is called while saving products'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec('actionProductSave', ['id_product' => (int) $this->id, 'product' => $this])
```
