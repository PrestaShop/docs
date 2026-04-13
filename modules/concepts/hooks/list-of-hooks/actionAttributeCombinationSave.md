---
Title: actionAttributeCombinationSave
hidden: true
hookTitle: ''
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/src/Adapter/Product/Combination/Create/CombinationCreator.php'
        file: src/Adapter/Product/Combination/Create/CombinationCreator.php
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
$this->hookDispatcher->dispatchWithParameters(
                'actionAttributeCombinationSave',
                ['id_product_attribute' => (int) $combination->id, 'id_attributes' => $generatedCombination]
            );
```
