---
title: Subscribing to a Hook
weight: 10
mostViewedPage: true
---

# Subscribing to a Hook

The `Hook` component acts as a registry for hook subscriptions, storing which modules have subscribed to which hook. Multiple modules can subscribe to the same hook, and a single module can subscribe to multiple hooks.

Modules subscribe to hooks through the `registerHook()` static function:

```php
Hook::registerHook(Module $moduleInstance, string|string[] $subscribedHooks, ?int[] $shopIds = null): bool
```

This method returns `true` if the operation is successful, `false` otherwise.

##### Parameters

`$moduleInstance`
:
Instance of the module subscribing to the hook

`$subscribedHooks`
:
This parameter takes a string or an array of strings containing the name of the hook(s) the module is subscribing to.

`$shopIds`
:
This parameter is related to multishop and receives an array of shop ids.  
By default, hook registrations are valid for all shops. If this parameter is defined, the hook subscription will only be registered for the specified shops.

##### Example

Here is how a Module subscribes to the `registerGDPRConsent` during the install process:

```php
class Somemodule extends Module
{
    public function install()
    {
        return (
            parent::install() 
            && $this->registerHook('registerGDPRConsent') // <-- shorthand to Hook::registerHook()
        );
    }
}
```

Modules can subscribe to multiple hooks at once. Here is how a Module subscribes to hook `registerGDPRConsent` and `displayProductAdditionalInfo`:

```php
class Somemodule extends Module
{
    const AVAILABLE_HOOKS = [
        'registerGDPRConsent',
        'displayProductAdditionalInfo',
    ]; 

    public function install()
    {
        return (
            parent::install()
            && $this->registerHook(self::AVAILABLE_HOOKS)
        );
    }
}
```

## Module callback

Modules having subscribed to a hook are notified when the hook is dispatched and are able to react in consequence.

In order to receive the notification, modules must declare one public callback function per subscribed hook, following this naming convention: `hook<SubscribedHookName>`. This way, when a hook is dispatched, the dispatcher will be able to identify and call the appropriate callback on each subscriber.

This means that in order to fully subscribe to a hook, a module must call `registerHook()` **and** declare a callback. For example:

```php
class Somemodule extends Module
{
    public function install()
    {
        return parent::install() && $this->registerHook('registerGDPRConsent');
    }

    public function hookRegisterGDPRConsent($parameters)
    {
    	// This is where you can modify/alter the behavior of PrestaShop.
    	// The content of $parameters will depend on what is sent when the hook is dispatched.
    }
}
```

Depending on the hook's specifics, callbacks can alter the parameters being passed (when they are passed by reference), trigger an action, or even return a result (a data structure or raw HTML) to be used by PrestaShop.


{{% notice tip %}}
Notice how hook names start with a lower case letter (`registerGDPRConsent`), and hook callbacks use the capitalized name `hookRegisterGDPRConsent`.
{{% /notice %}}
