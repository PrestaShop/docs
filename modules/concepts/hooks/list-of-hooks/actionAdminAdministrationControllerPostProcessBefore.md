---
menuTitle: actionAdminAdministrationControllerPostProcessBefore
Title: actionAdminAdministrationControllerPostProcessBefore
hidden: true
hookTitle: On post-process in Admin Configure Advanced Parameters Administration Controller
files:
  - src/PrestaShopBundle/Controller/Admin/Configure/AdvancedParameters/AdministrationController.php
locations:
  - back office
type: action
hookAliases:
---

# Hook actionAdminAdministrationControllerPostProcessBefore

## Information

{{% notice tip %}}
**On post-process in Admin Configure Advanced Parameters Administration Controller:** 

This hook is called on Admin Configure Advanced Parameters Administration post-process before processing any form
{{% /notice %}}

Hook locations: 
  - back office

Hook type: action

Located in: 
  - [src/PrestaShopBundle/Controller/Admin/Configure/AdvancedParameters/AdministrationController.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Controller/Admin/Configure/AdvancedParameters/AdministrationController.php)

## Call of the Hook in the origin file

```php
dispatchHook('actionAdminAdministrationControllerPostProcessBefore', ['controller' => $this])
```