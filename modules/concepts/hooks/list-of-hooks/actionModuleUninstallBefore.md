---
menuTitle: actionModuleUninstallBefore
Title: actionModuleUninstallBefore
hidden: true
hookTitle: actionModuleUninstallBefore
files:
  - classes/module/Module.php
locations:
  - frontoffice
types:
  - legacy
---

# Hook : actionModuleUninstallBefore

## Informations

{{% notice tip %}}
**actionModuleUninstallBefore:** 


{{% /notice %}}

Hook locations: 
  - frontoffice

Hook types: 
  - legacy

Located in: 
  - classes/module/Module.php

## Hook call with parameters

```php
Hook::exec('actionModuleUninstallBefore', ['object' => $this]);
```