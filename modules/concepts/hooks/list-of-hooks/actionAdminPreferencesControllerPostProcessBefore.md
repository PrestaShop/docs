---
menuTitle: actionAdminPreferencesControllerPostProcessBefore
Title: actionAdminPreferencesControllerPostProcessBefore
hidden: true
hookTitle: 
files:
  - src/PrestaShopBundle/Controller/Admin/Configure/ShopParameters/PreferencesController.php
locations:
  - back office
type: action
hookAliases:
---

# Hook actionAdminPreferencesControllerPostProcessBefore

## Information

Hook locations: 
  - back office

Hook type: action

Located in: 
  - [src/PrestaShopBundle/Controller/Admin/Configure/ShopParameters/PreferencesController.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Controller/Admin/Configure/ShopParameters/PreferencesController.php)

## Call of the Hook in the origin file

```php
dispatchHook('actionAdminPreferencesControllerPostProcessBefore', ['controller' => $this])
```