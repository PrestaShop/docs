---
menuTitle: actionAdminLogsControllerPostProcessBefore
Title: actionAdminLogsControllerPostProcessBefore
hidden: true
hookTitle: 
files:
  - src/PrestaShopBundle/Controller/Admin/Configure/AdvancedParameters/LogsController.php
locations:
  - backoffice
types:
  - symfony
---

# Hook : actionAdminLogsControllerPostProcessBefore

## Informations

Hook locations: 
  - backoffice

Hook types: 
  - symfony

Located in: 
  - src/PrestaShopBundle/Controller/Admin/Configure/AdvancedParameters/LogsController.php

## Hook call with parameters

```php
dispatchHook('actionAdminLogsControllerPostProcessBefore', ['controller' => $this]);
```