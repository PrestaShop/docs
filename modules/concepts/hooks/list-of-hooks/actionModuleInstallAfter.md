---
menuTitle: actionModuleInstallAfter
Title: actionModuleInstallAfter
hidden: true
hookTitle: actionModuleInstallAfter
files:
  - classes/module/Module.php
locations:
  - frontoffice
types:
  - legacy
---

# Hook : actionModuleInstallAfter

## Informations

{{% notice tip %}}
**actionModuleInstallAfter:** 


{{% /notice %}}

Hook locations: 
  - frontoffice

Hook types: 
  - legacy

Located in: 
  - classes/module/Module.php

## Hook call with parameters

```php
Hook::exec('actionModuleInstallAfter', ['object' => $this]);
```