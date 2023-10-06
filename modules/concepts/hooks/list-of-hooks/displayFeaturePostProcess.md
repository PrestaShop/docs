---
menuTitle: displayFeaturePostProcess
Title: displayFeaturePostProcess
hidden: true
hookTitle: 'On post-process in admin feature'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/controllers/admin/AdminFeaturesController.php'
        file: controllers/admin/AdminFeaturesController.php
locations:
    - 'back office'
type: display
hookAliases:
    - postProcessFeature
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook is called on post-process in admin feature'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec(
                'displayFeaturePostProcess',
                ['errors' => &$this->errors]
            )
```
