---
menuTitle: actionAdminAdministrationControllerPostProcessBefore
Title: actionAdminAdministrationControllerPostProcessBefore
hidden: true
hookTitle: On post-process in Admin Configure Advanced Parameters Administration Controller
files:
  - src/PrestaShopBundle/Controller/Admin/Configure/AdvancedParameters/AdministrationController.php
locations:
  - backoffice
types:
  - symfony
---

# Hook : actionAdminAdministrationControllerPostProcessBefore

## Informations

{{% notice tip %}}
**On post-process in Admin Configure Advanced Parameters Administration Controller:** 

This hook is called on Admin Configure Advanced Parameters Administration post-process before processing any form
{{% /notice %}}

Hook locations: 
  - backoffice

Hook types: 
  - symfony

Located in: 
  - src/PrestaShopBundle/Controller/Admin/Configure/AdvancedParameters/AdministrationController.php

## Hook call with parameters

```php
dispatchHook('actionAdminAdministrationControllerPostProcessBefore', ['controller' => $this]);
```