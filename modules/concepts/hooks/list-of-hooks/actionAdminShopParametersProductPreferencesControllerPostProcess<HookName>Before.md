---
menuTitle: actionAdminShopParametersProductPreferencesControllerPostProcess<HookName>Before
Title: actionAdminShopParametersProductPreferencesControllerPostProcess<HookName>Before
hidden: true
hookTitle: 
files:
  - src/PrestaShopBundle/Controller/Admin/Configure/ShopParameters/ProductPreferencesController.php
locations:
  - backoffice
type:
  - action
hookAliases:
---

# Hook actionAdminShopParametersProductPreferencesControllerPostProcess<HookName>Before

## Information

Hook locations: 
  - backoffice

Hook type: 
  - action

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Controller/Admin/Configure/ShopParameters/ProductPreferencesController.php](src/PrestaShopBundle/Controller/Admin/Configure/ShopParameters/ProductPreferencesController.php)

## Hook call in codebase

```php
dispatchHook(
            'actionAdminShopParametersProductPreferencesControllerPostProcess' . $hookName . 'Before',
            ['controller' => $this]
        )
```