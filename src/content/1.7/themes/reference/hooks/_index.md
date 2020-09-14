---
title: Theme Hooks
weight: 3
aliases:
  - /1.7/themes/hooks/
  - /themes/hooks/index.html
---

# Create hooks available in Front Office

This section of the documentation is only about front office hooks: [display and action]({{< ref "1.7/development/components/hook/_index.md" >}}).

## Creating a dynamic hook

When your module or theme calls a hook, PrestaShop executes it.

This is how it is called from a PHP file:

```php
<?php
Hook::exec('MyCustomHook');
```

This is how it is called from a Smarty template:

```html
{hook h='MyCustomHook'}
```

## Register the hook to make it visible and reusable

If you add a hook call, it is better to register it.

This will enable Back Office user to:
- see it in the hooks list
- be able to plug some modules on it (in Position page)
- allow other modules to listen to this hook being called and add some extra behavior

You can register your hook from your theme's [theme.yml file]({{< ref "1.7/themes/getting-started/theme-yml" >}}):

```yaml
global_settings:
  hooks:
    custom_hooks:
      - name: displayFooterBefore
        title: displayFooterBefore
        description: Add a widget area above the footer
```

You can also register your hook from a module:

```php
<?php
// Create the function for the MyCustomHook hook public function
MyCustomHook($params) { // method body }

// Register the MyCustomHook hook
Hook::register('MyCustomHook');

// Call it from PHP
Hook::exec('MyCustomHook');
```
