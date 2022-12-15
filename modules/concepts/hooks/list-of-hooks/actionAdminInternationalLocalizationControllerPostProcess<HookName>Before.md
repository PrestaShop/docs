---
menuTitle: actionAdminInternationalLocalizationControllerPostProcess<HookName>Before
Title: actionAdminInternationalLocalizationControllerPostProcess<HookName>Before
hidden: true
hookTitle: 
files:
  - src/PrestaShopBundle/Controller/Admin/Improve/International/LocalizationController.php
locations:
  - back office
type: action
hookAliases:
---

# Hook actionAdminInternationalLocalizationControllerPostProcess&lt;HookName>Before

## Information

Hook locations: 
  - back office

Hook type: action

Located in: 
  - [src/PrestaShopBundle/Controller/Admin/Improve/International/LocalizationController.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Controller/Admin/Improve/International/LocalizationController.php)

## Call of the Hook in the origin file

```php
dispatchHook(
            'actionAdminInternationalLocalizationControllerPostProcess' . $hookName . 'Before',
            ['controller' => $this]
        )
```