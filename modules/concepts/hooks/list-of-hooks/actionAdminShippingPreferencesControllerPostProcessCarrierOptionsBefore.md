---
menuTitle: actionAdminShippingPreferencesControllerPostProcessCarrierOptionsBefore
Title: actionAdminShippingPreferencesControllerPostProcessCarrierOptionsBefore
hidden: true
hookTitle: On post-process in Admin Improve Shipping Preferences Controller
files:
  - src/PrestaShopBundle/Controller/Admin/Improve/Shipping/PreferencesController.php
locations:
  - back office
type: action
hookAliases:
---

# Hook actionAdminShippingPreferencesControllerPostProcessCarrierOptionsBefore

## Information

{{% notice tip %}}
**On post-process in Admin Improve Shipping Preferences Controller:** 

This hook is called on Admin Improve Shipping Preferences post-process before processing the Carrier Options form
{{% /notice %}}

Hook locations: 
  - back office

Hook type: action

Located in: 
  - [src/PrestaShopBundle/Controller/Admin/Improve/Shipping/PreferencesController.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Controller/Admin/Improve/Shipping/PreferencesController.php)

## Call of the Hook in the origin file

```php
dispatchHook(
            'actionAdminShippingPreferencesControllerPostProcessCarrierOptionsBefore',
                ['controller' => $this]
        )
```