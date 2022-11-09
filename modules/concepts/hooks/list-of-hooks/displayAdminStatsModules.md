---
menuTitle: displayAdminStatsModules
Title: displayAdminStatsModules
hidden: true
hookTitle: Stats - Modules
files:
  - controllers/admin/AdminStatsTabController.php
locations:
  - backoffice
types:
  - legacy
---

# Hook : displayAdminStatsModules

## Informations

{{% notice tip %}}
**Stats - Modules:** 


{{% /notice %}}

Hook locations: 
  - backoffice

Hook types: 
  - legacy

Located in: 
  - controllers/admin/AdminStatsTabController.php

## Hook call with parameters

```php
Hook::exec('displayAdminStatsModules', [], $module_instance->id);
```