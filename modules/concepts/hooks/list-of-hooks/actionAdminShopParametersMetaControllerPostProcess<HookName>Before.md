---
menuTitle: actionAdminShopParametersMetaControllerPostProcess<HookName>Before
Title: actionAdminShopParametersMetaControllerPostProcess<HookName>Before
hidden: true
hookTitle: 
files:
  - src/PrestaShopBundle/Controller/Admin/Configure/ShopParameters/MetaController.php
locations:
  - backoffice
type:
  - action
hookAliases:
---

# Hook actionAdminShopParametersMetaControllerPostProcess<HookName>Before

## Information

Hook locations: 
  - backoffice

Hook type: 
  - action

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Controller/Admin/Configure/ShopParameters/MetaController.php](src/PrestaShopBundle/Controller/Admin/Configure/ShopParameters/MetaController.php)

## Hook call in codebase

```php
dispatchHook(
            'actionAdminShopParametersMetaControllerPostProcess' . $hookName . 'Before',
            ['controller' => $this]
        )
```