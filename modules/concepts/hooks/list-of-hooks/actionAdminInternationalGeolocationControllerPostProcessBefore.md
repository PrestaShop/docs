---
menuTitle: actionAdminInternationalGeolocationControllerPostProcessBefore
Title: actionAdminInternationalGeolocationControllerPostProcessBefore
hidden: true
hookTitle: On post-process in Admin Improve International Geolocation Controller
files:
  - src/PrestaShopBundle/Controller/Admin/Improve/International/GeolocationController.php
locations:
  - backoffice
type:
  - action
hookAliases:
---

# Hook actionAdminInternationalGeolocationControllerPostProcessBefore

## Information

{{% notice tip %}}
**On post-process in Admin Improve International Geolocation Controller:** 

This hook is called on Admin Improve International Geolocation post-process before processing any form
{{% /notice %}}

Hook locations: 
  - backoffice

Hook type: 
  - action

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Controller/Admin/Improve/International/GeolocationController.php](src/PrestaShopBundle/Controller/Admin/Improve/International/GeolocationController.php)

## Hook call in codebase

```php
dispatchHook('actionAdminInternationalGeolocationControllerPostProcessBefore', ['controller' => $this])
```