---
title: Templates
weight: 2
useMermaid: true
disableToc: true
---

# Templates

This section covers how PrestaShop uses Smarty templates to render front-office pages — from directory structure and layouts to inheritance, listing pages, and the notification system.

PrestaShop uses the [Smarty 4 template engine](https://smarty-php.github.io/smarty/). Templates define page content; layouts define page structure.

| Page | Description |
|------|-------------|
| [Templates and layouts]({{< relref "/9/themes/concepts/templates/templates-and-layouts" >}}) | Directory structure, templates vs layouts, layout examples, template resolution |
| [Template inheritance]({{< relref "/9/themes/concepts/templates/template-inheritance" >}}) | `{extends}`, `{block}`, building on parent templates |
| [Listing pages]({{< relref "/9/themes/concepts/templates/listing-pages" >}}) | Shared product list template, `$listing` variable, AJAX updates |
| [Head]({{< relref "/9/themes/concepts/templates/head" >}}) | Asset loading partials, SEO meta tags |
| [Notifications]({{< relref "/9/themes/concepts/templates/notifications" >}}) | Notification types, customization, pushing from PHP |
