---
title: Head
weight: 20
aliases:
  - /themes/templates/015-head.html
---

# Head

The head part is very important in term of SEO and performances.

Have look at Classic's head part to see real life examples.


## Assets

PrestaShop 1.7 changed the way asset works and it means the way to it's added
inside the `<head>` tag of your page changed a bit too.

There are 2 importants files to use:

* `_partials/stylesheets.tpl`
* `_partials/javascript.tpl`

These 2 files are used to take full advantage of the new features of 1.7, like async
loading for javascript or automatic inline for CSS.

{{% notice warning %}}
  The `_partials/javascript.tpl` has to be included at the bottom of your page as well.
{{% /notice %}}

```smarty
  {block name='stylesheets'}
    {include file="_partials/stylesheets.tpl" stylesheets=$stylesheets}
  {/block}

  {block name='javascript_head'}
    {include file="_partials/javascript.tpl" javascript=$javascript.head vars=$js_custom_vars}
  {/block}
```

Those 2 subtemplates are very simple, they loop and print each provided assets.


### SEO

A lot of meta and SEO information belong here, there is a special block for it
so template which extend this layout can easily redefine the page title or
description.

```smarty
  {block name='head_seo'}

    <title>{block name='head_seo_title'}{$page.meta.title}{/block}</title>
    <meta name="description" content="{block name='head_seo_description'}{$page.meta.description}{/block}">
    <meta name="keywords" content="{block name='head_seo_keywords'}{$page.meta.keywords}{/block}">

    {if $page.meta.robots !== 'index'}
      <meta name="robots" content="{$page.meta.robots}">
    {/if}

    {if $page.canonical}
      <link rel="canonical" href="{$page.canonical}">
    {/if}

  {/block}
```
