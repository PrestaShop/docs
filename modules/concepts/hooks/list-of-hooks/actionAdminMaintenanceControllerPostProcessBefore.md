---
menuTitle: actionAdminMaintenanceControllerPostProcessBefore
Title: actionAdminMaintenanceControllerPostProcessBefore
hidden: true
hookTitle: 
files:
  - src/PrestaShopBundle/Controller/Admin/Configure/ShopParameters/MaintenanceController.php
locations:
  - back office
type: action
hookAliases:
---

# Hook actionAdminMaintenanceControllerPostProcessBefore

## Information

Hook locations: 
  - back office

Hook type: action

Located in: 
  - [src/PrestaShopBundle/Controller/Admin/Configure/ShopParameters/MaintenanceController.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Controller/Admin/Configure/ShopParameters/MaintenanceController.php)

## Call of the Hook in the origin file

```php
dispatchHook('actionAdminMaintenanceControllerPostProcessBefore', ['controller' => $this])
```