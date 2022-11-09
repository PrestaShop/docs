---
menuTitle: actionModuleUnRegisterHookBefore
Title: actionModuleUnRegisterHookBefore
hidden: true
hookTitle: 
files:
  - classes/Hook.php
locations:
  - frontoffice
types:
  - legacy
---

# Hook : actionModuleUnRegisterHookBefore

## Informations

Hook locations: 
  - frontoffice

Hook types: 
  - legacy

Located in: 
  - classes/Hook.php

## Hook call with parameters

```php
Hook::exec('actionModuleUnRegisterHookBefore', ['object' => $module_instance, 'hook_name' => $hook_name]);
```