---
Title: actionFeatureValueDelete
hidden: true
hookTitle: "Deleting attributes' features' values"
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/FeatureValue.php'
        file: classes/FeatureValue.php
locations:
    - 'front office'
type: action
hookAliases:
    - afterDeleteFeatureValue
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook is called while deleting an attributes features value'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec('actionFeatureValueDelete', ['id_feature_value' => $this->id])
```
