---
menuTitle: actionAdminLogsControllerPostProcessBefore
Title: actionAdminLogsControllerPostProcessBefore
hidden: true
hookTitle: 
files:
  - src/PrestaShopBundle/Controller/Admin/Configure/AdvancedParameters/LogsController.php
locations:
  - back office
type: action
hookAliases:
---

# Hook actionAdminLogsControllerPostProcessBefore

## Information

Hook locations: 
  - back office

Hook type: action

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Controller/Admin/Configure/AdvancedParameters/LogsController.php](src/PrestaShopBundle/Controller/Admin/Configure/AdvancedParameters/LogsController.php)

## Call of the Hook in the origin file

```php
dispatchHook('actionAdminLogsControllerPostProcessBefore', ['controller' => $this])
```