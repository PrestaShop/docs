---
Title: actionFeatureSave
hidden: true
hookTitle: "Saving attributes' features"
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/Feature.php'
        file: classes/Feature.php
locations:
    - 'front office'
type: action
hookAliases:
    - afterSaveFeature
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook is called while saving an attributes features'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec('actionFeatureSave', ['id_feature' => $this->id])
```
