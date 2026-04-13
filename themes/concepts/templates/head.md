---
title: Head
weight: 4
aliases:
  - /9/themes/reference/templates/head
---

# Head

This page covers how PrestaShop themes handle asset loading and SEO meta tags in the `<head>` section.

## Assets

Two partial templates handle asset loading:

- `_partials/stylesheets.tpl`: loops over registered stylesheets
- `_partials/javascript.tpl`: loops over registered scripts, supports async loading

```smarty
{block name='stylesheets'}
  {include file="_partials/stylesheets.tpl" stylesheets=$stylesheets}
{/block}

{block name='javascript_head'}
  {include file="_partials/javascript.tpl" javascript=$javascript.head vars=$js_custom_vars}
{/block}
```

`_partials/javascript.tpl` must also be included at the bottom of your layout for deferred scripts:

```smarty
{block name='javascript_bottom'}
  {include file="_partials/javascript.tpl" javascript=$javascript.bottom}
{/block}
```

The `$stylesheets` and `$javascript` variables are populated automatically by PrestaShop from all assets registered by the theme and modules. See [Asset management]({{< relref "/9/themes/concepts/asset-management" >}}) for the registration API.

The `$js_custom_vars` variable is a key/value array of PHP variables exposed to JavaScript before any scripts run. It allows controllers and modules to pass server-side values (IDs, URLs, translated strings) into the front-end without inline `<script>` blocks in templates.

{{% notice warning %}}
Every value in `$js_custom_vars` is rendered in the page source and visible to anyone. Never expose sensitive data such as API keys, authentication tokens, passwords, or private user information through this variable.
{{% /notice %}}

## SEO

SEO meta tags are grouped inside a `head_seo` block. Sub-blocks allow overriding individual tags without rewriting the entire block:

```smarty
{block name='head_seo'}
  <title>{block name='head_seo_title'}{$page.meta.title}{/block}</title>
  <meta name="description" content="{block name='head_seo_description'}{$page.meta.description}{/block}">
  <meta name="robots" content="{block name='head_seo_robots'}{$page.meta.robots}{/block}">
  <link rel="canonical" href="{block name='head_seo_canonical'}{$page.canonical}{/block}">
{/block}
```

To override a single tag in a child template or a child theme, target the specific sub-block:

```smarty
{block name='head_seo_robots'}noindex,nofollow{/block}
```
