---
menuTitle: actionModuleUninstallBefore
Title: actionModuleUninstallBefore
hidden: true
hookTitle: actionModuleUninstallBefore
files:
  - classes/module/Module.php
locations:
  - front office
type: action
hookAliases:
---

# Hook actionModuleUninstallBefore

## Information

{{% notice tip %}}
**actionModuleUninstallBefore:** 


{{% /notice %}}

Hook locations: 
  - front office

Hook type: action

Located in: 
  - [classes/module/Module.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/module/Module.php)

## Call of the Hook in the origin file

```php
Hook::exec('actionModuleUninstallBefore', ['object' => $this])
```