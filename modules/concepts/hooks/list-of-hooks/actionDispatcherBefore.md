---
menuTitle: actionDispatcherBefore
Title: actionDispatcherBefore
hidden: true
hookTitle: Before dispatch
files:
  - src/PrestaShopBundle/EventListener/ActionDispatcherLegacyHooksSubscriber.php
locations:
  - front office
type: action
hookAliases:
---

# Hook actionDispatcherBefore

## Information

{{% notice tip %}}
**Before dispatch:** 

This hook is called at the beginning of the dispatch method of the Dispatcher
{{% /notice %}}

Hook locations: 
  - front office

Hook type: action

Located in: 
  - [src/PrestaShopBundle/EventListener/ActionDispatcherLegacyHooksSubscriber.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/EventListener/ActionDispatcherLegacyHooksSubscriber.php)

## Call of the Hook in the origin file

```php
dispatchWithParameters(self::DISPATCHER_BEFORE_ACTION, [
            'controller_type' => $controllerType,
        ])
```