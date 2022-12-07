---
menuTitle: actionAdminPreferencesControllerPostProcessBefore
Title: actionAdminPreferencesControllerPostProcessBefore
hidden: true
hookTitle: 
files:
  - src/PrestaShopBundle/Controller/Admin/Configure/ShopParameters/PreferencesController.php
locations:
  - backoffice
type:
  - action
hookAliases:
---

# Hook actionAdminPreferencesControllerPostProcessBefore

## Information

Hook locations: 
  - backoffice

Hook type: 
  - action

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Controller/Admin/Configure/ShopParameters/PreferencesController.php](src/PrestaShopBundle/Controller/Admin/Configure/ShopParameters/PreferencesController.php)

## Hook call in codebase

```php
dispatchHook('actionAdminPreferencesControllerPostProcessBefore', ['controller' => $this])
```