---
menuTitle: actionAdminInternationalLocalizationControllerPostProcessBefore
Title: actionAdminInternationalLocalizationControllerPostProcessBefore
hidden: true
hookTitle: On post-process in Admin Improve International Localization Controller
files:
  - src/PrestaShopBundle/Controller/Admin/Improve/International/LocalizationController.php
locations:
  - backoffice
types:
  - symfony
---

# Hook : actionAdminInternationalLocalizationControllerPostProcessBefore

## Informations

{{% notice tip %}}
**On post-process in Admin Improve International Localization Controller:** 

This hook is called on Admin Improve International Localization post-process before processing any form
{{% /notice %}}

Hook locations: 
  - backoffice

Hook types: 
  - symfony

Located in: 
  - src/PrestaShopBundle/Controller/Admin/Improve/International/LocalizationController.php

## Hook call with parameters

```php
dispatchHook('actionAdminInternationalLocalizationControllerPostProcessBefore', ['controller' => $this]);
```