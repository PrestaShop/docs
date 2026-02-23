---
title: Smarty helpers
weight: 3
---

# Smarty helpers

PrestaShop provides custom Smarty functions and modifiers for use in front-office templates. For full parameter documentation, see [Smarty extensions]({{< relref "/9/development/components/smarty-extensions" >}}).

## Functions

| Function | Purpose | Example |
|----------|---------|---------|
| `{l}` | Translate a string — see [Translation]({{< relref "/9/themes/concepts/translation" >}}) for domain naming rules and placeholders | `{l s='Add to cart' d='Shop.Theme.Actions'}` |
| `{url}` | Generate a URL for any entity | `{url entity='product' id=$product.id}` |
| `{hook}` | Invoke a hook and display its output | `{hook h='displayFooterBefore'}` |
| `{render}` | Render a template file with variables | `{render file='customer/_partials/login-form.tpl' ui=$login_form}` |
| `{form_field}` | Render a form field with consistent markup | `{form_field field=$field}` |
| `{widget}` | Display a module's content directly | `{widget name='ps_contactinfo'}` |
| `{widget_block}` | Display a module with an inline template override | `{widget_block name='ps_linklist'}...{/widget_block}` |

## Modifiers

| Modifier | Purpose | Example |
|----------|---------|---------|
| `classname` | Sanitize a string into a valid CSS class name | `{$value\|classname}` |
| `classnames` | Convert a key/boolean array into a space-separated class string | `{$page.body_classes\|classnames}` |

## `{url}` entities

The `{url}` function generates URLs for any front-office entity. Pass the entity type and its required parameters. All entities also accept `id_lang`, `id_shop`, `ssl`, and `params` (extra query string) as optional parameters.

| Entity | Required parameters | Example |
|--------|--------------------|---------|
| `product` | `id` | `{url entity='product' id=$product.id}` |
| `category` | `id` | `{url entity='category' id=$category.id}` |
| `categoryImage` | `id`, `name` | `{url entity='categoryImage' id=$category.id name=$category.name}` |
| `manufacturer` | `id` | `{url entity='manufacturer' id=$manufacturer.id}` |
| `manufacturerImage` | `id` | `{url entity='manufacturerImage' id=$manufacturer.id}` |
| `supplier` | `id` | `{url entity='supplier' id=$supplier.id}` |
| `supplierImage` | `id` | `{url entity='supplierImage' id=$supplier.id}` |
| `cms` | `id` | `{url entity='cms' id=$cms.id}` |
| `module` | `name`, `controller` | `{url entity='module' name='ps_cart' controller='cart'}` |
| `language` | `id` | `{url entity='language' id=$lang.id}` |
| `sf` | `route` | `{url entity='sf' route='my_route'}` — generates a URL from a Symfony route name; only available in Symfony context |
| *(any page name)* | — | `{url entity='contact'}` — falls back to `Link::getPageLink()` |

