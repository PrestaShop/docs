---
menuTitle: actionAdminMaintenanceControllerPostProcessBefore
Title: actionAdminMaintenanceControllerPostProcessBefore
hidden: true
hookTitle: 
files:
  - src/PrestaShopBundle/Controller/Admin/Configure/ShopParameters/MaintenanceController.php
locations:
  - backoffice
types:
  - symfony
---

# Hook : actionAdminMaintenanceControllerPostProcessBefore

## Informations

Hook locations: 
  - backoffice

Hook types: 
  - symfony

Located in: 
  - src/PrestaShopBundle/Controller/Admin/Configure/ShopParameters/MaintenanceController.php

## Hook call with parameters

```php
dispatchHook('actionAdminMaintenanceControllerPostProcessBefore', ['controller' => $this]);
```