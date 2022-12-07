---
menuTitle: actionAdminShopParametersProductPreferencesControllerPostProcessBefore
Title: actionAdminShopParametersProductPreferencesControllerPostProcessBefore
hidden: true
hookTitle: 
files:
  - src/PrestaShopBundle/Controller/Admin/Configure/ShopParameters/ProductPreferencesController.php
locations:
  - backoffice
type:
  - action
hookAliases:
---

# Hook actionAdminShopParametersProductPreferencesControllerPostProcessBefore

## Information

Hook locations: 
  - backoffice

Hook type: 
  - action

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Controller/Admin/Configure/ShopParameters/ProductPreferencesController.php](src/PrestaShopBundle/Controller/Admin/Configure/ShopParameters/ProductPreferencesController.php)

## Hook call in codebase

```php
dispatchHook('actionAdminShopParametersProductPreferencesControllerPostProcessBefore', ['controller' => $this])
```