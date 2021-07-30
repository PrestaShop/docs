---
title: The Hook component
menuTitle: Hook
---

# The Hook component


The preferred way to customize PrestaShop is using Modules. Modules allow to customize PrestaShop in many ways.

The main path for Module integration are extension points called "Hooks", which are placed throughout the system. Modules can subscribe to hooks in order to provide or alter features.

There are two types of hooks:

- **Display hooks** – Integrated mainly (but not exclusively) in templates, they allow modules to provide content that will be injected somewhere in a page.
- **Action hooks** – Allow modules to be informed of something happening in the system, and optionally alter the system’s behavior by modifying provided data.

## Subscription registry

PrestaShop's `Hook` component acts as a registry for hook subscriptions. It stores which modules have subscribed to which hook. Multiple modules can subscribe to the same hook, and a single module can subscribe to multiple hooks.

Here is how a Module subscribes to hook `registerGDPRConsent`:

```php
<?php
class Somemodule extends Module
{
    public function install()
    {
        return parent::install() && $this->registerHook('registerGDPRConsent');
    }
}
```
You can also register multiple hooks. Here is how a Module subscribes to hook `registerGDPRConsent` and `displayProductAdditionalInfo`:


```php
<?php
class Somemodule extends Module
{
    const AVAILABLE_HOOKS = [
        'registerGDPRConsent',
        'displayProductAdditionalInfo',
    ]; 

    public function install()
    {
        return parent::install() && $this->registerHook(self::AVAILABLE_HOOKS);
    }
}
```


## Hook dispatcher

Throughout the software, multiple hooks are dispatched: this means at some point the system will look at all modules which subscribe to a given hook and trigger them, waiting for a result.

 This is how a hook can be dispatched using `Hook` class:

```php
$id = Hook::exec('actionModifyZoning', ['address_id' => $addressID]);
```

## Module callback

Modules which have previously subscribed to this hook will be notified and will be able to act on this hook. Depending on the hook's nature, they can alter the data being passed, trigger an event or even return a result (a data structure or raw HTML) to be used within PrestaShop.

In order to be notified when the subscribed hooks are dispatched, in addition to subscribing to them, modules must also declare one public callback function per subscribed hook, following this naming schema: `hook<SubscribedHookName>`. That way, when a hook is dispatched, the dispatcher will be able to identify and call the appropriate callback on each subscriber.

This means that in order to fully subscribe to a hook, a module must call `registerHook()` **and** declare a callback. For example:

```php
<?php
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

{{% notice tip %}}
Notice how hook names start with a lower case letter (`registerGDPRConsent`), and hook callbacks use the capitalized name `hookRegisterGDPRConsent`.
{{% /notice %}}
