---
menuTitle: actionModuleInstallBefore
Title: actionModuleInstallBefore
hidden: true
hookTitle: actionModuleInstallBefore
files:
  - classes/module/Module.php
locations:
  - front office
type: action
hookAliases:
---

# Hook actionModuleInstallBefore

## Information

{{% notice tip %}}
**actionModuleInstallBefore:** 


{{% /notice %}}

Hook locations: 
  - front office

Hook type: action

Located in: 
  - [classes/module/Module.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/module/Module.php)

## Call of the Hook in the origin file

```php
Hook::exec('actionModuleInstallBefore', ['object' => $this])
```