---
title: Hooks
weight: 40
---

# How to migrate hooks

[Hooks][hooks-component] are the most important feature for the PrestaShop developers because they allow them to improve PrestaShop by adding code or content in multiple points of the application. For Symfony developers, you can see that as Events on steroids.
To keep some degree of compatibility with 1.6 or 1.7 (pre-Symfony migration) modules, we need to ensure that hooks are still available, invoked and/or rendered at the right place.

Getting the list of available Hooks in modern pages is really easy. Thanks to the hook profiler, the Symfony debug bar displays the list of available hooks (alongside some useful information) on a given page. Sadly, this is only available on Symfony pages, since the legacy system doesn't have any way to get the list of hooks dispatched for a page.

## Getting the list of hooks on a legacy page

Use this trick to find out which hooks are called on a legacy page.

In ``classes/Hook``, find the [exec() function](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/Hook.php#L735) and add the following code:

```php
<?php
file_put_contents('hooks.txt', PHP_EOL. $hook_name, FILE_APPEND | LOCK_EX);
```

After applying this change, access the url of the page you want to migrate. In ``admin-dev/hooks.txt``, you'll see the list of available hooks in the legacy page.
 
Now, create a simple module that hooks on each one of these hooks and renders something visible that you can retrieve in the new page.

{{% notice note %}}
Note that only hooks that are prefixed by "display" are rendered to a page. For the others ones in modern pages, you can register the hook, use the `dump()` function and then check if the dump() call has been registered by the profiler.
{{% /notice %}}

This is an example with the Logs page (still in progress as of 12/12/2017):

{{< figure src="../img/logs-page-before.png" title="Legacy page" >}}

{{< figure src="../img/logs-page-after.png" title="Modern page" >}}

## Dispatching hooks in a modern Controller

You can dispatch a hook using the controller helper `dispatchHook($name, array $parameters)`:

```php
<?php
$this->dispatchHook('actionAdminPerformanceControllerPostProcessBefore', array('controller' => $this));
```

## Dispatching hooks using the Hook dispatcher

If you need to dispatch a hook from a non-controller class, you'll need to inject the [HookDispatcher](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/Core/Hook/HookDispatcher.php) class.
 
If your class is defined as a Symfony service, the HookDispatcher is available as a service called `prestashop.core.hook.dispatcher`.

```php
<?php
use PrestaShopBundle\Service\Hook\HookEvent;
use PrestaShop\PrestaShop\Core\Hook\HookDispatcher;

$hookEvent = new HookEvent();
$this->hookDispacher->dispatchWithParameters($eventName, $parameters);
```

{{% notice tip %}}
Under the hood, we use an instance of Symfony `EventDispatcher`.
{{% /notice %}}

## Dispatching/rendering hooks in Twig templates

Some hooks are directly rendered in templates, because PrestaShop developers want to add/remove information from blocks. Of course you can do it using template override but you may lose compatibility if templates are updated in later versions of PrestaShop.

```twig
{{ renderhook(
    'hookName',
    {
        'param1': 'value1',
        'param2': 'value2'
    }
) }}
```

[hooks-component]: {{< ref "/8/development/components/hook/" >}}
