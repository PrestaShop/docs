---
menuTitle: actionAdminAdvancedParametersPerformanceControllerPostProcess<HookName>Before
Title: actionAdminAdvancedParametersPerformanceControllerPostProcess<HookName>Before
hidden: true
hookTitle: 
files:
  - src/PrestaShopBundle/Controller/Admin/Configure/AdvancedParameters/PerformanceController.php
locations:
  - back office
type: action
hookAliases:
---

# Hook actionAdminAdvancedParametersPerformanceControllerPostProcess&lt;HookName>Before

## Information

Hook locations: 
  - back office

Hook type: action

Located in: 
  - [src/PrestaShopBundle/Controller/Admin/Configure/AdvancedParameters/PerformanceController.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Controller/Admin/Configure/AdvancedParameters/PerformanceController.php)

## Call of the Hook in the origin file

```php
dispatchHook(
            'actionAdminAdvancedParametersPerformanceControllerPostProcess' . $hookName . 'Before',
            ['controller' => $this]
        )
```