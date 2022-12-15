---
menuTitle: actionModuleInstallAfter
Title: actionModuleInstallAfter
hidden: true
hookTitle: actionModuleInstallAfter
files:
  - classes/module/Module.php
locations:
  - front office
type: action
hookAliases:
---

# Hook actionModuleInstallAfter

## Information

{{% notice tip %}}
**actionModuleInstallAfter:** 


{{% /notice %}}

Hook locations: 
  - front office

Hook type: action

Located in: 
  - [classes/module/Module.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/module/Module.php)

## Call of the Hook in the origin file

```php
Hook::exec('actionModuleInstallAfter', ['object' => $this])
```