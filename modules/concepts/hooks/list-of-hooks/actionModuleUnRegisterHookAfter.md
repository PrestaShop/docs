---
menuTitle: actionModuleUnRegisterHookAfter
Title: actionModuleUnRegisterHookAfter
hidden: true
hookTitle: 
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/Hook.php'
        file: classes/Hook.php
locations:
    - 'front office'
type: action
hookAliases: 
array_return: false
check_exceptions: false
chain: false
origin: core
description: ''

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec(
            'actionModuleUnRegisterHookAfter',
            [
                'object' => $module_instance,
                'hook_name' => $hook_name,
            ]
        )
```
