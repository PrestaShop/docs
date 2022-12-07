---
menuTitle: displayAdminStatsModules
Title: displayAdminStatsModules
hidden: true
hookTitle: Stats - Modules
files:
  - controllers/admin/AdminStatsTabController.php
locations:
  - backoffice
type:
  - display
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
  - backoffice

Hook type: 
  - display

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/controllers/admin/AdminStatsTabController.php](controllers/admin/AdminStatsTabController.php)

## Hook call in codebase

```php
Hook::exec('displayAdminStatsModules', [], $module_instance->id)
```