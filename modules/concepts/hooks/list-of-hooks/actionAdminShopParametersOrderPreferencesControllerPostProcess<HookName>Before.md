---
menuTitle: actionAdminShopParametersOrderPreferencesControllerPostProcess<HookName>Before
Title: actionAdminShopParametersOrderPreferencesControllerPostProcess<HookName>Before
hidden: true
hookTitle: 
files:
  - src/PrestaShopBundle/Controller/Admin/Configure/ShopParameters/OrderPreferencesController.php
locations:
  - back office
type: action
hookAliases:
---

# Hook actionAdminShopParametersOrderPreferencesControllerPostProcess&lt;HookName>Before

## Information

Hook locations: 
  - back office

Hook type: action

Located in: 
  - [src/PrestaShopBundle/Controller/Admin/Configure/ShopParameters/OrderPreferencesController.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Controller/Admin/Configure/ShopParameters/OrderPreferencesController.php)

## Call of the Hook in the origin file

```php
dispatchHook(
            'actionAdminShopParametersOrderPreferencesControllerPostProcess' . $hookName . 'Before',
            ['controller' => $this]
        )
```