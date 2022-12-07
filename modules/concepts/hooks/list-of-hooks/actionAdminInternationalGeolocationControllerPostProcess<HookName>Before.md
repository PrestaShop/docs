---
menuTitle: actionAdminInternationalGeolocationControllerPostProcess<HookName>Before
Title: actionAdminInternationalGeolocationControllerPostProcess<HookName>Before
hidden: true
hookTitle: 
files:
  - src/PrestaShopBundle/Controller/Admin/Improve/International/GeolocationController.php
locations:
  - backoffice
type:
  - action
hookAliases:
---

# Hook actionAdminInternationalGeolocationControllerPostProcess<HookName>Before

## Information

Hook locations: 
  - backoffice

Hook type: 
  - action

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Controller/Admin/Improve/International/GeolocationController.php](src/PrestaShopBundle/Controller/Admin/Improve/International/GeolocationController.php)

## Hook call in codebase

```php
dispatchHook(
            'actionAdminInternationalGeolocationControllerPostProcess' . $hookName . 'Before',
            ['controller' => $this]
        )
```