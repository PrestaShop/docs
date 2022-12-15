---
menuTitle: actionAdminInternationalGeolocationControllerPostProcessBefore
Title: actionAdminInternationalGeolocationControllerPostProcessBefore
hidden: true
hookTitle: On post-process in Admin Improve International Geolocation Controller
files:
  - src/PrestaShopBundle/Controller/Admin/Improve/International/GeolocationController.php
locations:
  - back office
type: action
hookAliases:
---

# Hook actionAdminInternationalGeolocationControllerPostProcessBefore

## Information

{{% notice tip %}}
**On post-process in Admin Improve International Geolocation Controller:** 

This hook is called on Admin Improve International Geolocation post-process before processing any form
{{% /notice %}}

Hook locations: 
  - back office

Hook type: action

Located in: 
  - [src/PrestaShopBundle/Controller/Admin/Improve/International/GeolocationController.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Controller/Admin/Improve/International/GeolocationController.php)

## Call of the Hook in the origin file

```php
dispatchHook('actionAdminInternationalGeolocationControllerPostProcessBefore', ['controller' => $this])
```