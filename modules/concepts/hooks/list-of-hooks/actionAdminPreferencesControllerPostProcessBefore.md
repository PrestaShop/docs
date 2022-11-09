---
menuTitle: actionAdminPreferencesControllerPostProcessBefore
Title: actionAdminPreferencesControllerPostProcessBefore
hidden: true
hookTitle: 
files:
  - src/PrestaShopBundle/Controller/Admin/Configure/ShopParameters/PreferencesController.php
locations:
  - backoffice
types:
  - symfony
---

# Hook : actionAdminPreferencesControllerPostProcessBefore

## Informations

Hook locations: 
  - backoffice

Hook types: 
  - symfony

Located in: 
  - src/PrestaShopBundle/Controller/Admin/Configure/ShopParameters/PreferencesController.php

## Hook call with parameters

```php
dispatchHook('actionAdminPreferencesControllerPostProcessBefore', ['controller' => $this]);
```