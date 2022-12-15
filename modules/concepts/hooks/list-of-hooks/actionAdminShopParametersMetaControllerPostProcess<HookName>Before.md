---
menuTitle: actionAdminShopParametersMetaControllerPostProcess<HookName>Before
Title: actionAdminShopParametersMetaControllerPostProcess<HookName>Before
hidden: true
hookTitle: 
files:
  - src/PrestaShopBundle/Controller/Admin/Configure/ShopParameters/MetaController.php
locations:
  - back office
type: action
hookAliases:
---

# Hook actionAdminShopParametersMetaControllerPostProcess&lt;HookName>Before

## Information

Hook locations: 
  - back office

Hook type: action

Located in: 
  - [src/PrestaShopBundle/Controller/Admin/Configure/ShopParameters/MetaController.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Controller/Admin/Configure/ShopParameters/MetaController.php)

## Call of the Hook in the origin file

```php
dispatchHook(
            'actionAdminShopParametersMetaControllerPostProcess' . $hookName . 'Before',
            ['controller' => $this]
        )
```