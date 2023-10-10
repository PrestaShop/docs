---
menuTitle: actionAdminShippingPreferencesControllerPostProcessHandlingBefore
Title: actionAdminShippingPreferencesControllerPostProcessHandlingBefore
hidden: true
hookTitle: 'On post-process in Admin Improve Shipping Preferences Controller'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Controller/Admin/Improve/Shipping/PreferencesController.php'
        file: src/PrestaShopBundle/Controller/Admin/Improve/Shipping/PreferencesController.php
locations:
    - 'back office'
type: action
hookAliases: 
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook is called on Admin Improve Shipping Preferences post-process before processing the Handling form'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
dispatchHook(
            'actionAdminShippingPreferencesControllerPostProcessHandlingBefore',
            ['controller' => $this]
        )
```
