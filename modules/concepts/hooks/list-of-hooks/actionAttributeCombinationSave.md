---
menuTitle: actionAttributeCombinationSave
Title: actionAttributeCombinationSave
hidden: true
hookTitle: null
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/Combination.php'
        file: classes/Combination.php
locations:
    - 'front office'
type: action
hookAliases: null
array_return: false
check_exceptions: false
chain: false
origin: core
description: ''

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec('actionAttributeCombinationSave', ['id_product_attribute' => (int) $this->id, 'id_attributes' => $idsAttribute])
```
