---
menuTitle: actionAdminAdvancedParametersPerformanceControllerPostProcess<HookName>Before
Title: actionAdminAdvancedParametersPerformanceControllerPostProcess<HookName>Before
hidden: true
hookTitle: 
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
description: ''

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
dispatchHook(
            'actionAdminAdvancedParametersPerformanceControllerPostProcess' . $hookName . 'Before',
            ['controller' => $this]
        )
```
