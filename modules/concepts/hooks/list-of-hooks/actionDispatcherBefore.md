---
Title: actionDispatcherBefore
hidden: true
hookTitle: 'Before dispatch'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/EventListener/ActionDispatcherLegacyHooksSubscriber.php'
        file: src/PrestaShopBundle/EventListener/ActionDispatcherLegacyHooksSubscriber.php
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
dispatchWithParameters(self::DISPATCHER_BEFORE_ACTION, [
            'controller_type' => $controllerType,
        ])
```
