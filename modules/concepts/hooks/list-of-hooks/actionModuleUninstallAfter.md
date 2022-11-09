---
menuTitle: actionModuleUninstallAfter
Title: actionModuleUninstallAfter
hidden: true
hookTitle: actionModuleUninstallAfter
files:
  - classes/module/Module.php
locations:
  - frontoffice
types:
  - legacy
---

# Hook : actionModuleUninstallAfter

## Informations

{{% notice tip %}}
**actionModuleUninstallAfter:** 


{{% /notice %}}

Hook locations: 
  - frontoffice

Hook types: 
  - legacy

Located in: 
  - classes/module/Module.php

## Hook call with parameters

```php
Hook::exec('actionModuleUninstallAfter', ['object' => $this]);
```