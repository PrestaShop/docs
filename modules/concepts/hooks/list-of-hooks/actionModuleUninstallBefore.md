---
menuTitle: actionModuleUninstallBefore
Title: actionModuleUninstallBefore
hidden: true
hookTitle: actionModuleUninstallBefore
files:
  - classes/module/Module.php
locations:
  - frontoffice
type:
  - action
hookAliases:
---

# Hook actionModuleUninstallBefore

## Information

{{% notice tip %}}
**actionModuleUninstallBefore:** 


{{% /notice %}}

Hook locations: 
  - frontoffice

Hook type: 
  - action

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/module/Module.php](classes/module/Module.php)

## Hook call in codebase

```php
Hook::exec('actionModuleUninstallBefore', ['object' => $this])
```