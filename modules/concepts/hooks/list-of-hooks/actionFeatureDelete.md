---
menuTitle: actionFeatureDelete
Title: actionFeatureDelete
hidden: true
hookTitle: "Deleting attributes' features"
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/Feature.php'
        file: classes/Feature.php
locations:
    - 'front office'
type: action
hookAliases:
    - afterDeleteFeature
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook is called while deleting an attributes features'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec('actionFeatureDelete', ['id_feature' => $this->id])
```
