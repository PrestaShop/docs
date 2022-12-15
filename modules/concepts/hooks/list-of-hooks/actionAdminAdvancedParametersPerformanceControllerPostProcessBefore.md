---
menuTitle: actionAdminAdvancedParametersPerformanceControllerPostProcessBefore
Title: actionAdminAdvancedParametersPerformanceControllerPostProcessBefore
hidden: true
hookTitle: On post-process in Admin Configure Advanced Parameters Performance Controller
files:
  - src/PrestaShopBundle/Controller/Admin/Configure/AdvancedParameters/PerformanceController.php
locations:
  - back office
type: action
hookAliases:
---

# Hook actionAdminAdvancedParametersPerformanceControllerPostProcessBefore

## Information

{{% notice tip %}}
**On post-process in Admin Configure Advanced Parameters Performance Controller:** 

This hook is called on Admin Configure Advanced Parameters Performance post-process before processing any form
{{% /notice %}}

Hook locations: 
  - back office

Hook type: action

Located in: 
  - [src/PrestaShopBundle/Controller/Admin/Configure/AdvancedParameters/PerformanceController.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Controller/Admin/Configure/AdvancedParameters/PerformanceController.php)

## Call of the Hook in the origin file

```php
dispatchHook('actionAdminAdvancedParametersPerformanceControllerPostProcessBefore', ['controller' => $this])
```