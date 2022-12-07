---
menuTitle: actionAdminAdministrationControllerPostProcessBefore
Title: actionAdminAdministrationControllerPostProcessBefore
hidden: true
hookTitle: On post-process in Admin Configure Advanced Parameters Administration Controller
files:
  - src/PrestaShopBundle/Controller/Admin/Configure/AdvancedParameters/AdministrationController.php
locations:
  - backoffice
type:
  - action
hookAliases:
---

# Hook actionAdminAdministrationControllerPostProcessBefore

## Information

{{% notice tip %}}
**On post-process in Admin Configure Advanced Parameters Administration Controller:** 

This hook is called on Admin Configure Advanced Parameters Administration post-process before processing any form
{{% /notice %}}

Hook locations: 
  - backoffice

Hook type: 
  - action

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Controller/Admin/Configure/AdvancedParameters/AdministrationController.php](src/PrestaShopBundle/Controller/Admin/Configure/AdvancedParameters/AdministrationController.php)

## Hook call in codebase

```php
dispatchHook('actionAdminAdministrationControllerPostProcessBefore', ['controller' => $this])
```