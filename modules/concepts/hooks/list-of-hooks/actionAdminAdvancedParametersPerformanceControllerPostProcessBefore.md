---
menuTitle: actionAdminAdvancedParametersPerformanceControllerPostProcessBefore
Title: actionAdminAdvancedParametersPerformanceControllerPostProcessBefore
hidden: true
hookTitle: 'On post-process in Admin Configure Advanced Parameters Performance Controller'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Controller/Admin/Configure/AdvancedParameters/PerformanceController.php'
        file: src/PrestaShopBundle/Controller/Admin/Configure/AdvancedParameters/PerformanceController.php
locations:
    - 'back office'
type: action
hookAliases: 
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook is called on Admin Configure Advanced Parameters Performance post-process before processing any form'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
dispatchHook('actionAdminAdvancedParametersPerformanceControllerPostProcessBefore', ['controller' => $this])
```
