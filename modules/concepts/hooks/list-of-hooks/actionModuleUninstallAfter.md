---
menuTitle: actionModuleUninstallAfter
Title: actionModuleUninstallAfter
hidden: true
hookTitle: actionModuleUninstallAfter
files:
  - classes/module/Module.php
locations:
  - frontoffice
type:
  - action
hookAliases:
---

# Hook actionModuleUninstallAfter

## Information

{{% notice tip %}}
**actionModuleUninstallAfter:** 


{{% /notice %}}

Hook locations: 
  - frontoffice

Hook type: 
  - action

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/module/Module.php](classes/module/Module.php)

## Hook call in codebase

```php
Hook::exec('actionModuleUninstallAfter', ['object' => $this])
```