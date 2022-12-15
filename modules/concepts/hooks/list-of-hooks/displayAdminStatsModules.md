---
menuTitle: displayAdminStatsModules
Title: displayAdminStatsModules
hidden: true
hookTitle: Stats - Modules
files:
  - controllers/admin/AdminStatsTabController.php
locations:
  - back office
type: display
hookAliases:
 - AdminStatsModules
---

# Hook displayAdminStatsModules

Aliases: 
 - AdminStatsModules



## Information

{{% notice tip %}}
**Stats - Modules:** 


{{% /notice %}}

Hook locations: 
  - back office

Hook type: display

Located in: 
  - [controllers/admin/AdminStatsTabController.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/controllers/admin/AdminStatsTabController.php)

## Call of the Hook in the origin file

```php
Hook::exec('displayAdminStatsModules', [], $module_instance->id)
```