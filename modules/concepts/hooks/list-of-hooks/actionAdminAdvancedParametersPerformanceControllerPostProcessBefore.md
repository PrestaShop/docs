---
menuTitle: actionAdminAdvancedParametersPerformanceControllerPostProcessBefore
Title: actionAdminAdvancedParametersPerformanceControllerPostProcessBefore
hidden: true
hookTitle: On post-process in Admin Configure Advanced Parameters Performance Controller
files:
  - src/PrestaShopBundle/Controller/Admin/Configure/AdvancedParameters/PerformanceController.php
locations:
  - backoffice
types:
  - symfony
---

# Hook : actionAdminAdvancedParametersPerformanceControllerPostProcessBefore

## Informations

{{% notice tip %}}
**On post-process in Admin Configure Advanced Parameters Performance Controller:** 

This hook is called on Admin Configure Advanced Parameters Performance post-process before processing any form
{{% /notice %}}

Hook locations: 
  - backoffice

Hook types: 
  - symfony

Located in: 
  - src/PrestaShopBundle/Controller/Admin/Configure/AdvancedParameters/PerformanceController.php

## Hook call with parameters

```php
dispatchHook('actionAdminAdvancedParametersPerformanceControllerPostProcessBefore', ['controller' => $this]);
```