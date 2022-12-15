---
menuTitle: actionAdminAdminWebserviceControllerPostProcessBefore
Title: actionAdminAdminWebserviceControllerPostProcessBefore
hidden: true
hookTitle: 
files:
  - src/PrestaShopBundle/Controller/Admin/Configure/AdvancedParameters/WebserviceController.php
locations:
  - back office
type: action
hookAliases:
---

# Hook actionAdminAdminWebserviceControllerPostProcessBefore

## Information

Hook locations: 
  - back office

Hook type: action

Located in: 
  - [src/PrestaShopBundle/Controller/Admin/Configure/AdvancedParameters/WebserviceController.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Controller/Admin/Configure/AdvancedParameters/WebserviceController.php)

## Call of the Hook in the origin file

```php
dispatchHook('actionAdminAdminWebserviceControllerPostProcessBefore', ['controller' => $this])
```