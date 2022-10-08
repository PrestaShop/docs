---
title: Templating with Twig
weight: 10
---

# Templating with Twig

This is mostly the easy part. Legacy pages use Smarty while modern pages use Twig. These templating engines are actually similar in many ways.

For instance, this is a legacy template:

```html
<span class="employee_avatar_small">
    <img class="img" alt="" src="{$employee_image}" />
</span>
{$employee_name}
```

{{% notice note %}}
All of the legacy templates are located in the `admin-dev/themes/default/template/controller` folder
{{% /notice %}}

... and here is a possible migration of it to Twig:

```twig
<span class="employee_avatar_small">
    <img class="img" alt="{{ employee.name }}" src="{{ employee.image }}" />
</span>
{{ employee.name }}
```

The syntax of both engines is really similar. Find out more about Twig by reading the [Twig documentation](https://twig.symfony.com/doc/1.x/).

## Helpers

All our custom helpers have been ported from Smarty to Twig:

| Smarty                                 | Twig                                                      |
|----------------------------------------|-----------------------------------------------------------|
| `{ l s='foo' d='domain' }`             | `{{< raw >}}{{ 'foo'|trans({}, 'domain') }}{{< /raw >}}`  |
| `{ hook h='hookName' }`                | `{{ renderhook('hookName') }}`                            |
| `{$link->getAdminLink('AdminAccess')}` | `{{ getAdminLink('LegacyControllerName') }}`              |

## Macros

Macros/functions are specific to the modern pages to help with recurrent blocks:

{{% funcdef %}}

form_label_tooltip(name, tooltip, placement)
: Renders a form label (by name) with an informational tooltip on rollover.

check(variable)
: Checks if a variable is defined and not empty.

tooltip(text, icon, position)
: Renders a tooltip with information in roll hover (doesn't render a label).

infotip(text)\
warningtip(text)
: Renders information and warning tips (more like alert messages).

label_with_help(label, help)
: Renders a label with a help box beside it.

{{% /funcdef %}}

## Bootstrap

Legacy templates use [Bootstrap 3](https://getbootstrap.com/docs/3.3/) while modern pages use the [PrestaShop UI Kit](https://build.prestashop-project.org/prestashop-ui-kit/) that is based on [Bootstrap 4](https://getbootstrap.com/docs/4.0/getting-started/introduction/). This means that you'll need to update some markup (especially CSS classes).

{{% notice tip %}}
If you aren't familiar with Bootstrap 4, check out their [article on migrating to v4](https://getbootstrap.com/docs/4.0/migration/), which explains the major changes from v3 to v4.
{{% /notice %}}

## jQuery

Since we use the jQuery version that is bundled with Bootstrap, old pages use jQuery 1.11 and new ones jQuery 3.3. In addition to this, javascript from old pages was included as separate files without any compilation, while new pages we use modules which are compiled and bundled using Webpack.

Depending on the page you are migrating, this task may be straightforward or more complex.

## Translations

{{% notice warning %}}
Be careful when copying translatable wordings, you must use the exact same strings in order to keep the translation working.
{{% /notice %}}

Example:

```php
<?php
// legacy controller
$this->trans('Before activating the webservice, you must be sure to: ', array(), 'Admin.Advparameters.Help');
```

... must become:

```twig
{{ 'Before activating the webservice, you must be sure to: '|trans({}, 'Admin.Advparameters.Help') }}
```

## Manage modern assets with Webpack

PrestaShop uses Webpack to build and bundle static assets in PrestaShop, like Javascript and stylesheets. 

{{% notice note %}}
The root folder for the modern theme is `/admin-dev/themes/new-theme`.
{{% /notice %}}

To find out more, read [How to compile assets][compile-assets].

[compile-assets]: {{< ref "/8/development/compile-assets" >}}
