---
menuTitle: actionAdminShippingPreferencesControllerPostProcessBefore
Title: actionAdminShippingPreferencesControllerPostProcessBefore
hidden: true
hookTitle: On post-process in Admin Improve Shipping Preferences Controller
files:
  - src/PrestaShopBundle/Controller/Admin/Improve/Shipping/PreferencesController.php
locations:
  - backoffice
type:
  - action
hookAliases:
---

# Hook actionAdminShippingPreferencesControllerPostProcessBefore

## Information

{{% notice tip %}}
**On post-process in Admin Improve Shipping Preferences Controller:** 

This hook is called on Admin Improve Shipping Preferences post-process before processing any form
{{% /notice %}}

Hook locations: 
  - backoffice

Hook type: 
  - action

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Controller/Admin/Improve/Shipping/PreferencesController.php](src/PrestaShopBundle/Controller/Admin/Improve/Shipping/PreferencesController.php)

## Hook call in codebase

```php
dispatchHook('actionAdminShippingPreferencesControllerPostProcessBefore', ['controller' => $this])
```