---
Title: actionDispatcherAfter
hidden: true
hookTitle: 'After dispatch'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/classes/Dispatcher.php'
        file: classes/Dispatcher.php
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/src/PrestaShopBundle/Controller/Admin/LegacyController.php'
        file: src/PrestaShopBundle/Controller/Admin/LegacyController.php
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/src/PrestaShopBundle/EventListener/ActionDispatcherLegacyHooksSubscriber.php'
        file: src/PrestaShopBundle/EventListener/ActionDispatcherLegacyHooksSubscriber.php
locations:
    - 'front office'
type: action
hookAliases: 
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook is called at the end of the dispatch method of the Dispatcher'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec('actionDispatcherAfter', $params_hook_action_dispatcher)
```
