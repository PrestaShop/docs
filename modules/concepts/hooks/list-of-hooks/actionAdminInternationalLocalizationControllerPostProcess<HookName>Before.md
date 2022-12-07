---
menuTitle: actionAdminInternationalLocalizationControllerPostProcess<HookName>Before
Title: actionAdminInternationalLocalizationControllerPostProcess<HookName>Before
hidden: true
hookTitle: 
files:
  - src/PrestaShopBundle/Controller/Admin/Improve/International/LocalizationController.php
locations:
  - backoffice
type:
  - action
hookAliases:
---

# Hook actionAdminInternationalLocalizationControllerPostProcess<HookName>Before

## Information

Hook locations: 
  - backoffice

Hook type: 
  - action

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Controller/Admin/Improve/International/LocalizationController.php](src/PrestaShopBundle/Controller/Admin/Improve/International/LocalizationController.php)

## Hook call in codebase

```php
dispatchHook(
            'actionAdminInternationalLocalizationControllerPostProcess' . $hookName . 'Before',
            ['controller' => $this]
        )
```