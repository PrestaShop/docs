---
Title: actionAdminInternationalLocalizationControllerPostProcessBefore
hidden: true
hookTitle: 'On post-process in Admin Improve International Localization Controller'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Controller/Admin/Improve/International/LocalizationController.php'
        file: src/PrestaShopBundle/Controller/Admin/Improve/International/LocalizationController.php
locations:
    - 'back office'
type: action
hookAliases: 
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook is called on Admin Improve International Localization post-process before processing any form'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
dispatchHook('actionAdminInternationalLocalizationControllerPostProcessBefore', ['controller' => $this])
```
