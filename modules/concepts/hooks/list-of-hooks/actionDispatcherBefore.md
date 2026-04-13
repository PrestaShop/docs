---
Title: actionDispatcherBefore
hidden: true
hookTitle: 'Before dispatch'
files:
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
$this->hookDispatcher->dispatchWithParameters('actionDispatcherBefore', ['controller_type' => Dispatcher::FC_ADMIN]);
```
