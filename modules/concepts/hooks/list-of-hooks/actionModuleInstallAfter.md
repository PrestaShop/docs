---
menuTitle: actionModuleInstallAfter
Title: actionModuleInstallAfter
hidden: true
hookTitle: actionModuleInstallAfter
files:
  - classes/module/Module.php
locations:
  - frontoffice
type:
  - action
hookAliases:
---

# Hook actionModuleInstallAfter

## Information

{{% notice tip %}}
**actionModuleInstallAfter:** 


{{% /notice %}}

Hook locations: 
  - frontoffice

Hook type: 
  - action

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/module/Module.php](classes/module/Module.php)

## Hook call in codebase

```php
Hook::exec('actionModuleInstallAfter', ['object' => $this])
```