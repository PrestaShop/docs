---
title: Theme Hooks
weight: 3
aliases:
  - /1.7/themes/hooks/
  - /themes/hooks/index.html
---

# Create hooks available in Front Office

This section of the documentation is only about front office hooks: display and action.


## Creating a dynamic hook

When your module or theme calls a hook, PrestaShop executes it.

From a regular PHP file:

```php
<?php
Hook::exec('MyCustomHook');
```

From a Smarty template:

```html
{hook h='MyCustomHook'}
```

## Making your hook visible and reusable

If you want the user to be able to see your hook in PrestaShop's
Position page (in the back office), it has to be registered.

You can register your hook from your theme's [theme.yml file]({{< ref "1.7/themes/getting-started/theme-yml.md" >}}):

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
