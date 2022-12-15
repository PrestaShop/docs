---
menuTitle: actionAdminAdministrationControllerPostProcess<HookName>Before
Title: actionAdminAdministrationControllerPostProcess<HookName>Before
hidden: true
hookTitle: 
files:
  - src/PrestaShopBundle/Controller/Admin/Configure/AdvancedParameters/AdministrationController.php
locations:
  - back office
type: action
hookAliases:
---

# Hook actionAdminAdministrationControllerPostProcess&lt;HookName>Before

## Information

Hook locations: 
  - back office

Hook type: action

Located in: 
  - [src/PrestaShopBundle/Controller/Admin/Configure/AdvancedParameters/AdministrationController.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Controller/Admin/Configure/AdvancedParameters/AdministrationController.php)

## Call of the Hook in the origin file

```php
dispatchHook(
            'actionAdminAdministrationControllerPostProcess' . $hookName . 'Before',
            ['controller' => $this]
        )
```