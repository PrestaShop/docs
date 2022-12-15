---
menuTitle: actionAdminInternationalLocalizationControllerPostProcessBefore
Title: actionAdminInternationalLocalizationControllerPostProcessBefore
hidden: true
hookTitle: On post-process in Admin Improve International Localization Controller
files:
  - src/PrestaShopBundle/Controller/Admin/Improve/International/LocalizationController.php
locations:
  - back office
type: action
hookAliases:
---

# Hook actionAdminInternationalLocalizationControllerPostProcessBefore

## Information

{{% notice tip %}}
**On post-process in Admin Improve International Localization Controller:** 

This hook is called on Admin Improve International Localization post-process before processing any form
{{% /notice %}}

Hook locations: 
  - back office

Hook type: action

Located in: 
  - [src/PrestaShopBundle/Controller/Admin/Improve/International/LocalizationController.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Controller/Admin/Improve/International/LocalizationController.php)

## Call of the Hook in the origin file

```php
dispatchHook('actionAdminInternationalLocalizationControllerPostProcessBefore', ['controller' => $this])
```