---
menuTitle: actionAdminInternationalGeolocationControllerPostProcessBefore
Title: actionAdminInternationalGeolocationControllerPostProcessBefore
hidden: true
hookTitle: On post-process in Admin Improve International Geolocation Controller
files:
  - src/PrestaShopBundle/Controller/Admin/Improve/International/GeolocationController.php
locations:
  - backoffice
types:
  - symfony
---

# Hook : actionAdminInternationalGeolocationControllerPostProcessBefore

## Informations

{{% notice tip %}}
**On post-process in Admin Improve International Geolocation Controller:** 

This hook is called on Admin Improve International Geolocation post-process before processing any form
{{% /notice %}}

Hook locations: 
  - backoffice

Hook types: 
  - symfony

Located in: 
  - src/PrestaShopBundle/Controller/Admin/Improve/International/GeolocationController.php

## Hook call with parameters

```php
dispatchHook('actionAdminInternationalGeolocationControllerPostProcessBefore', ['controller' => $this]);
```