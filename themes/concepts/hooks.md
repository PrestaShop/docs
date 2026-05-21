---
title: Theme hooks
weight: 4
---

# Theme hooks

Hooks are extension points that allow modules to inject content or execute logic at specific locations in the front office. There are two types:

- **Display hooks**: render HTML content in templates (e.g., `displayFooter`, `displayProductActions`)
- **Action hooks**: trigger PHP logic without producing output (e.g., `actionFrontControllerSetMedia`, `actionProductOutOfStock`)

As a theme developer, you mainly work with display hooks. For the full hook system, see [Hooks]({{< relref "/9/development/components/hook" >}}).

## Using hooks in templates

The `{hook}` Smarty function calls a hook and outputs the concatenated HTML returned by all modules attached to it:

```smarty
{hook h='displayFooter'}
```

### Parameters

| Parameter | Description |
|-----------|-------------|
| `h` | Hook name (required) |
| `mod` | Restrict output to a single module by name |
| `excl` | Exclude specific modules (comma-separated). Not recommended: prefer `modules_to_unhook` in `theme.yml` |

Any additional parameters are passed through to the modules:

```smarty
{* Only output from the "mymodule" module *}
{hook h='displayFooter' mod='mymodule'}

{* Exclude specific modules *}
{hook h='displayFooter' excl='blocknewsletter,ps_emailsubscription'}

{* Pass custom variables to modules *}
{hook h='displayFooterProduct' product=$product category=$category}
```

## Registering custom hooks

Register hooks in your `config/theme.yml` so they appear in the Back Office and modules can attach to them:

```yaml
global_settings:
  hooks:
    custom_hooks:
      - name: displayFooterBefore
        title: displayFooterBefore
        description: Add a widget area above the footer
```

Modules can also register hooks from PHP using `Hook::registerHook('MyCustomHook')`. See [Hooks]({{< relref "/9/modules/concepts/hooks" >}}) in the module documentation for the full module-side API.

## Unhooking and hooking modules

{{% notice info %}}
`modules_to_unhook` and `modules_to_hook` are only applied when the theme is activated. Changes to these keys have no effect on a theme that is already active.
{{% /notice %}}

Remove modules from hooks using `modules_to_unhook`:

```yaml
global_settings:
  hooks:
    modules_to_unhook:
      displayFooter:
        - ps_socialfollow
      displaySearch:
        - ps_searchbar
```

Attach modules to hooks through `modules_to_hook`:

```yaml
global_settings:
  hooks:
    modules_to_hook:
      displayHeaderTop:
        - blocklanguages
        - blockcurrencies
        - blockuserinfo
```

See [Theme structure]({{< relref "/9/themes/concepts/theme-structure#hooks" >}}) for the full syntax including prepend, append, and page-specific hooks.

For a visual map of all front-office hooks in the Hummingbird theme, see the [hook mapping]({{< relref "/9/themes/hummingbird/hooks" >}}).
