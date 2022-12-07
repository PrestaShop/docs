---
menuTitle: actionModuleUnRegisterHookBefore
Title: actionModuleUnRegisterHookBefore
hidden: true
hookTitle: 
files:
  - classes/Hook.php
locations:
  - frontoffice
type:
  - action
hookAliases:
---

# Hook actionModuleUnRegisterHookBefore

## Information

Hook locations: 
  - frontoffice

Hook type: 
  - action

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/Hook.php](classes/Hook.php)

## Hook call in codebase

```php
Hook::exec('actionModuleUnRegisterHookBefore', ['object' => $module_instance, 'hook_name' => $hook_name])
```