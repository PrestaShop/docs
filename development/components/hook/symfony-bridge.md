---
title: Symfony bridge for hooks
weight: 40
---

# Symfony bridge for hooks

In Back-Office, migrated pages are powered by Symfony. The powerful [Symfony Event Dispatcher][sf-event-dispatcher] has been chosen to replace, in the long term, hooks. However, in order to preserve backward compatibility, both systems coexist.

It is important that modules which subscribe to a hook are correctly notified no matter where the hook is dispatched from, be it in legacy code or modern code.

In legacy code, hooks are dispatched using `Hook::exec()`.

In Symfony-powered code, two services work together to achieve this:

- The class [LegacyHookSubscriber][legacy-hook-subscriber] acts as a registry for hook subscriptions and as gateway between the legacy `Hook` class and Symfony.
- The class [HookDispatcher][sf-hook-dispatcher-class] is actually a wrapper of Symfony's Event Dispatcher.

## Registry

First, on setup, `LegacyHookSubscriber` will retrieve all legacy hooks using `Hook::getHooks()`.

Then it will create as many event subscriptions as there are hooks, following a naming convention based on database IDs.

For example, if module with `id_module` 267 has subscribed to hook with `id_hook` 82, `LegacyHookSubscriber` will create a subscription `call_82_267`.

## Dispatching

In Symfony-powered pages, to dispatch hook one must use the HookDispatcher:

```php
$this->hookDispatcher->dispatchWithParameters("actionModifyForm", ['form_builder' => $formBuilder]);
```

The HookDispatcher will act as standard dispatcher and call the eligible event listeners and subscribers, including LegacyHookSubscriber.

Using a dedicated magic method `__call()`, the `LegacyHookSubscriber` will parse the called method (ex: `call_82_267`) to retrieve the appropriate hook and module (using their respective IDs) and trigger the related `Hook::exec()` call with the appropriate parameters.

## To sum up

When a hook is dispatched inside Symfony-powered controllers, `HookDispatcher` dispatches the hook similarly to a regular Symfony event; this event is being listened to by `LegacyHookSubscriber` who will then trigger the related `Hook::exec()` call.

[sf-event-dispatcher]: https://symfony.com/doc/current/components/event_dispatcher.html
[sf-hook-dispatcher-class]: https://github.com/PrestaShop/PrestaShop/blob/develop/src/Core/Hook/HookDispatcher.php
[legacy-hook-subscriber]: https://github.com/PrestaShop/PrestaShop/blob/develop/src/Adapter/LegacyHookSubscriber.php
