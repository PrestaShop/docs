---
menuTitle: actionDispatcherAfter
Title: actionDispatcherAfter
hidden: true
hookTitle: 'After dispatch'
files:
    -
        url: 'https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/EventListener/ActionDispatcherLegacyHooksSubscriber.php'
        file: src/PrestaShopBundle/EventListener/ActionDispatcherLegacyHooksSubscriber.php
locations:
    - 'front office'
type: action
hookAliases: null
array_return: false
check_exceptions: false
chain: false
origin: core
description: 'This hook is called at the end of the dispatch method of the Dispatcher'

---

{{% hookDescriptor %}}

## Call of the Hook in the origin file

```php
dispatchWithParameters(self::DISPATCHER_AFTER_ACTION, [
                'controller_type' => $requestAttributes->get('controller_type'),
                'controller_class' => $requestAttributes->get('controller_name'),
                'is_module' => 0,
            ])
```
