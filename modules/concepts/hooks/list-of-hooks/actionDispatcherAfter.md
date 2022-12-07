---
menuTitle: actionDispatcherAfter
Title: actionDispatcherAfter
hidden: true
hookTitle: After dispatch
files:
  - src/PrestaShopBundle/EventListener/ActionDispatcherLegacyHooksSubscriber.php
locations:
  - frontoffice
type:
  - action
hookAliases:
---

# Hook actionDispatcherAfter

## Information

{{% notice tip %}}
**After dispatch:** 

This hook is called at the end of the dispatch method of the Dispatcher
{{% /notice %}}

Hook locations: 
  - frontoffice

Hook type: 
  - action

Located in: 
  - [https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/EventListener/ActionDispatcherLegacyHooksSubscriber.php](src/PrestaShopBundle/EventListener/ActionDispatcherLegacyHooksSubscriber.php)

## Hook call in codebase

```php
dispatchWithParameters(self::DISPATCHER_AFTER_ACTION, [
                'controller_type' => $requestAttributes->get('controller_type'),
                'controller_class' => $requestAttributes->get('controller_name'),
                'is_module' => 0,
            ])
```