---
menuTitle: actionDispatcherBefore
Title: actionDispatcherBefore
hidden: true
hookTitle: Before dispatch
files:
  - src/PrestaShopBundle/EventListener/ActionDispatcherLegacyHooksSubscriber.php
locations:
  - frontoffice
type:
  - action
hookAliases:
---

# Hook actionDispatcherBefore

## Information

{{% notice tip %}}
**Before dispatch:** 

This hook is called at the beginning of the dispatch method of the Dispatcher
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook type: 
  - action

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/EventListener/ActionDispatcherLegacyHooksSubscriber.php](src/PrestaShopBundle/EventListener/ActionDispatcherLegacyHooksSubscriber.php)

## Hook call in codebase

```php
dispatchWithParameters(self::DISPATCHER_BEFORE_ACTION, [
            'controller_type' => $controllerType,
        ])
```