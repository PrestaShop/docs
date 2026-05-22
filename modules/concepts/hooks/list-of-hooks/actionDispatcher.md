---
Title: actionDispatcher
hidden: true
hookTitle: files:
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/classes/Dispatcher.php'
        file: classes/Dispatcher.php
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/src/PrestaShopBundle/Controller/Admin/LegacyController.php'
        file: src/PrestaShopBundle/Controller/Admin/LegacyController.php
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
Hook::exec('actionDispatcher', $params_hook_action_dispatcher)
```
