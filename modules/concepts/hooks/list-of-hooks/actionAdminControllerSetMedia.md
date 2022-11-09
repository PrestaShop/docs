---
menuTitle: actionAdminControllerSetMedia
Title: actionAdminControllerSetMedia
hidden: true
hookTitle: 
files:
  - classes/controller/AdminController.php
  - src/PrestaShopBundle/Bridge/AdminController/LegacyControllerBridge.php
locations:
  - backoffice
types:
  - legacy
  - symfony
---

# Hook : actionAdminControllerSetMedia

## Informations

Hook locations: 
  - backoffice

Hook types: 
  - legacy

Located in: 
  - classes/controller/AdminController.php
  - src/PrestaShopBundle/Bridge/AdminController/LegacyControllerBridge.php

## Hook call with parameters

```php
Hook::exec('actionAdminControllerSetMedia');
```

```php
dispatchWithParameters('actionAdminControllerSetMedia');
```