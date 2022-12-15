---
menuTitle: actionModuleRegisterHookAfter
Title: actionModuleRegisterHookAfter
hidden: true
hookTitle: 
files:
  - classes/Hook.php
locations:
  - front office
type: action
hookAliases:
---

# Hook actionModuleRegisterHookAfter

## Information

Hook locations: 
  - front office

Hook type: action

Located in: 
  - [classes/Hook.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/Hook.php)

## Call of the Hook in the origin file

```php
Hook::exec(
                'actionModuleRegisterHookAfter',
                [
                    'object' => $module_instance,
                    'hook_name' => $hook_name,
                ]
            )
```