---
menuTitle: actionAdminAdvancedParametersPerformanceControllerPostProcess<HookName>Before
Title: actionAdminAdvancedParametersPerformanceControllerPostProcess<HookName>Before
hidden: true
hookTitle: 
files:
  - src/PrestaShopBundle/Controller/Admin/Configure/AdvancedParameters/PerformanceController.php
locations:
  - backoffice
type:
  - action
hookAliases:
---

# Hook actionAdminAdvancedParametersPerformanceControllerPostProcess<HookName>Before

## Information

Hook locations: 
  - backoffice

Hook type: 
  - action

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Controller/Admin/Configure/AdvancedParameters/PerformanceController.php](src/PrestaShopBundle/Controller/Admin/Configure/AdvancedParameters/PerformanceController.php)

## Hook call in codebase

```php
dispatchHook(
            'actionAdminAdvancedParametersPerformanceControllerPostProcess' . $hookName . 'Before',
            ['controller' => $this]
        )
```