---
Title: actionDispatcherBefore
hidden: true
hookTitle: 'Before dispatch'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/classes/Dispatcher.php'
        file: classes/Dispatcher.php
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/src/PrestaShopBundle/EventListener/ActionDispatcherLegacyHooksSubscriber.php'
        file: src/PrestaShopBundle/EventListener/ActionDispatcherLegacyHooksSubscriber.php
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/9.1.x/src/PrestaShopBundle/Routing/LegacyRouterChecker.php'
        file: src/PrestaShopBundle/Routing/LegacyRouterChecker.php
locations:
    - 'front office'
type: action
hookAliases: 
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook is called at the beginning of the dispatch method of the Dispatcher'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
Hook::exec('actionDispatcherBefore', ['controller_type' => $this->front_controller])
```
