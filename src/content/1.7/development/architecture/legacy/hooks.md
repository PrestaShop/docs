---
title: Hooks
---

# Legacy Hooks

[Hooks][hooks-concept] are a powerful mechanism of PrestaShop.

In the legacy part of PrestaShop, the system is mainly powered by the PHP class [Hook][hook-php-class].

## How it works

This class acts both as a dispatcher and a registry:

- it registers every existing hooks into PrestaShop, modules can subscribe to them
- any php class of PrestaShop is able to dispatch one hook

When modules are installed in PrestaShop, they indicate what hooks they subscribe to and the hooks registry is updated. Here is an example of how one can achieve that:

```php
    public function install()
    {
        return parent::install() && $this->registerHook('registerGDPRConsent');
    }
```

When a hook is dispatched, Hook class will look into the registry to check what modules should be appropriately called. This is how a hook is dispatched:

```php
$id = Hook::exec('actionModifyZoning', ['address_id' => $addressID]);
```

The modules which have previously subscribed to this hook will be called and will be able to act on this hook. Depending on the hook nature, they can alter the data being passed, trigger an event or even return a result (a data structure or raw HTML) to be used within PrestaShop.

The calls will happen thanks to `Hook::coreCallHook`. The function being called is a dynamic function whose name is built from the hook name: `hook+hookName`.

In other words, if module Foo has subscribed to hook `actionModifyZoning`, then on dispatch the class Hook will call
```php
$module->hookActionModifyZoning($hookArguments);
```

# With Symfony

In Back-Office, migrated pages are powered by Symfony. The use of the powerful [EventDispatcher][sf-event-dispatcher] of Symfony has been chosen to replace, in the long term, hooks. However for now both systems are used in order to preserve backward compatibility.

In Symfony, there is a [HookDispatcher][sf-hook-dispatcher-class] class that actually uses the dispatch system of Symfony.

## Bridge between Symfony and legacy

It is important that modules which subscribe to a hook X are correctly triggered, whether the hook is being dispatched in legacy code or in modern code.

In legacy code, the class Hook acts as usual.

In Symfony-powered code, multiple classes work together to achieve this.

The class [LegacyHookSubscriber][legacy-hook-subscriber] acts as a registry for legacy hooks and gateway between legacy and Symfony.

Class HookDispatcher is actually a wrapper of Symfony EventDispatcher.

### Registry

First, on setup, class LegacyHookSubscriber will retrieve all legacy hooks using `hooks = Hook::getHooks();`.

Then it will create as many event subscriptions as there are hooks, following a naming convention based on database IDs.

For example if module with `id_module` 267 has subscribed to hook with `id_hook` 82, `LegacyHookSubscriber` will create a subscription `call_82_267`.

### Dispatching

In Symfony-powered pages, to dispatch hook one must use the HookDispatcher:

```php
$this->hookDispatcher->dispatchWithParameters("actionModifyForm", ['form_builder' => $formBuilder]);
```

The HookDispatcher will act as standard dispatcher and call the eligible event listeners and subscribers, including LegacyHookSubscriber.

Using a dedicated magic method `__call()`, the `LegacyHookSubscriber` will parse the called method (ex: `call_82_267`) to retrieve the appropriate hook and module (using their respective IDs) and trigger the related `Hook::exec()` call with the appropriate parameters.

### To sum up

When a hook is dispatched inside Symfony-powered pages of the Back-office, the HookDispatcher dispatches the hook similarly to a regular Symfony event, and this event is being listened to by LegacyHookSubscriber that will then trigger the related `Hook::exec()` call.

[hooks-concept]: {{< ref "/1.7/modules/concepts/hooks/_index.md" >}}
[hook-php-class]: https://github.com/PrestaShop/PrestaShop/blob/develop/classes/Hook.php
[sf-event-dispatcher]: https://symfony.com/doc/current/components/event_dispatcher.html
[sf-hook-dispatcher-class]: https://github.com/PrestaShop/PrestaShop/blob/develop/src/Core/Hook/HookDispatcher.php
[legacy-hook-subscriber]: https://github.com/PrestaShop/PrestaShop/blob/develop/src/Adapter/LegacyHookSubscriber.php
