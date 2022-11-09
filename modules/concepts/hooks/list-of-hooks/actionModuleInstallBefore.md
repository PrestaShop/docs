---
menuTitle: actionModuleInstallBefore
Title: actionModuleInstallBefore
hidden: true
hookTitle: actionModuleInstallBefore
files:
  - classes/module/Module.php
locations:
  - frontoffice
types:
  - legacy
---

# Hook : actionModuleInstallBefore

## Informations

{{% notice tip %}}
**actionModuleInstallBefore:** 


{{% /notice %}}

Hook locations: 
  - frontoffice

Hook types: 
  - legacy

Located in: 
  - classes/module/Module.php

## Hook call with parameters

```php
Hook::exec('actionModuleInstallBefore', ['object' => $this]);
```