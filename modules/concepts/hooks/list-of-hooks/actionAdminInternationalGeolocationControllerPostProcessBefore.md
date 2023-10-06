---
menuTitle: actionAdminInternationalGeolocationControllerPostProcessBefore
Title: actionAdminInternationalGeolocationControllerPostProcessBefore
hidden: true
hookTitle: 'On post-process in Admin Improve International Geolocation Controller'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Controller/Admin/Improve/International/GeolocationController.php'
        file: src/PrestaShopBundle/Controller/Admin/Improve/International/GeolocationController.php
locations:
    - 'back office'
type: action
hookAliases: null
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook is called on Admin Improve International Geolocation post-process before processing any form'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
dispatchHook('actionAdminInternationalGeolocationControllerPostProcessBefore', ['controller' => $this])
```
