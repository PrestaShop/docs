---
menuTitle: actionAdminSecurityControllerPostProcessBefore
Title: actionAdminSecurityControllerPostProcessBefore
hidden: true
hookTitle: On post-process in Admin Security Controller
files:
  - src/PrestaShopBundle/Controller/Admin/Configure/AdvancedParameters/SecurityController.php
locations:
  - backoffice
types:
  - symfony
---

# Hook : actionAdminSecurityControllerPostProcessBefore

## Informations

{{% notice tip %}}
**On post-process in Admin Security Controller:** 

This hook is called on Admin Security Controller post-process before processing any form
{{% /notice %}}

Hook locations: 
  - backoffice

Hook types: 
  - symfony

Located in: 
  - src/PrestaShopBundle/Controller/Admin/Configure/AdvancedParameters/SecurityController.php

## Hook call with parameters

```php
dispatchHook('actionAdminSecurityControllerPostProcessBefore', ['controller' => $this]);
```