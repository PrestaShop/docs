---
menuTitle: actionAdminShopParametersOrderPreferencesControllerPostProcessBefore
Title: actionAdminShopParametersOrderPreferencesControllerPostProcessBefore
hidden: true
hookTitle: On post-process in Admin Configure Shop Parameters Order Preferences Controller
files:
  - src/PrestaShopBundle/Controller/Admin/Configure/ShopParameters/OrderPreferencesController.php
locations:
  - backoffice
types:
  - symfony
---

# Hook : actionAdminShopParametersOrderPreferencesControllerPostProcessBefore

## Informations

{{% notice tip %}}
**On post-process in Admin Configure Shop Parameters Order Preferences Controller:** 

This hook is called on Admin Configure Shop Parameters Order Preferences post-process before processing any form
{{% /notice %}}

Hook locations: 
  - backoffice

Hook types: 
  - symfony

Located in: 
  - src/PrestaShopBundle/Controller/Admin/Configure/ShopParameters/OrderPreferencesController.php

## Hook call with parameters

```php
dispatchHook('actionAdminShopParametersOrderPreferencesControllerPostProcessBefore', ['controller' => $this]);
```