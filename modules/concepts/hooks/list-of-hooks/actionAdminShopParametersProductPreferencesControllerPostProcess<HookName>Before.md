---
menuTitle: actionAdminShopParametersProductPreferencesControllerPostProcess<HookName>Before
Title: actionAdminShopParametersProductPreferencesControllerPostProcess<HookName>Before
hidden: true
hookTitle: 
files:
  - src/PrestaShopBundle/Controller/Admin/Configure/ShopParameters/ProductPreferencesController.php
locations:
  - back office
type: action
hookAliases:
---

# Hook actionAdminShopParametersProductPreferencesControllerPostProcess&lt;HookName>Before

## Information

Hook locations: 
  - back office

Hook type: action

Located in: 
  - [src/PrestaShopBundle/Controller/Admin/Configure/ShopParameters/ProductPreferencesController.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Controller/Admin/Configure/ShopParameters/ProductPreferencesController.php)

## Call of the Hook in the origin file

```php
dispatchHook(
            'actionAdminShopParametersProductPreferencesControllerPostProcess' . $hookName . 'Before',
            ['controller' => $this]
        )
```