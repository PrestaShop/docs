---
menuTitle: actionModuleRegisterHookBefore
Title: actionModuleRegisterHookBefore
hidden: true
hookTitle: 
files:
  - classes/Hook.php
locations:
  - front office
type: action
hookAliases:
---

# Hook actionModuleRegisterHookBefore

## Information

Hook locations: 
  - front office

Hook type: action

Located in: 
  - [classes/Hook.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/Hook.php)

## Call of the Hook in the origin file

```php
Hook::exec(
                'actionModuleRegisterHookBefore',
                [
                    'object' => $module_instance,
                    'hook_name' => $hook_name,
                ]
            )
```