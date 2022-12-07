---
menuTitle: actionModuleInstallBefore
Title: actionModuleInstallBefore
hidden: true
hookTitle: actionModuleInstallBefore
files:
  - classes/module/Module.php
locations:
  - frontoffice
type:
  - action
hookAliases:
---

# Hook actionModuleInstallBefore

## Information

{{% notice tip %}}
**actionModuleInstallBefore:** 


{{% /notice %}}

Hook locations: 
  - frontoffice

Hook type: 
  - action

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/module/Module.php](classes/module/Module.php)

## Hook call in codebase

```php
Hook::exec('actionModuleInstallBefore', ['object' => $this])
```