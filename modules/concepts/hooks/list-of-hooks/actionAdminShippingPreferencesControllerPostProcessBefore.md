---
menuTitle: actionAdminShippingPreferencesControllerPostProcessBefore
Title: actionAdminShippingPreferencesControllerPostProcessBefore
hidden: true
hookTitle: On post-process in Admin Improve Shipping Preferences Controller
files:
  - src/PrestaShopBundle/Controller/Admin/Improve/Shipping/PreferencesController.php
locations:
  - backoffice
types:
  - symfony
---

# Hook : actionAdminShippingPreferencesControllerPostProcessBefore

## Informations

{{% notice tip %}}
**On post-process in Admin Improve Shipping Preferences Controller:** 

This hook is called on Admin Improve Shipping Preferences post-process before processing any form
{{% /notice %}}

Hook locations: 
  - backoffice

Hook types: 
  - symfony

Located in: 
  - src/PrestaShopBundle/Controller/Admin/Improve/Shipping/PreferencesController.php

## Hook call with parameters

```php
dispatchHook('actionAdminShippingPreferencesControllerPostProcessBefore', ['controller' => $this]);
```