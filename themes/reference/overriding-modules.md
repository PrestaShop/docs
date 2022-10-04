---
title: Overriding modules
---

# Overriding modules

When you write a theme, you often need to override the templates and assets coming from a module so that they match your theme's specific markup needs.
Themes can override modules' assets (CSS and JavaScript only) by placing the corresponding file at a specific location.

All module overriding code goes to the `modules` directory (in your module's own directory).

{{% notice note %}}
  If your asset override is empty, PrestaShop will load nothing (neither the module one nor your override). This is useful
  if you want to fully remove this module style and add your own to your compiled `theme.css`.
{{% /notice %}}

Examples in this page are based on this sample module directory structure:

```
.
├── css
│   ├── external-lib.css
│   └── style.css
├── js
│   └── app.js
├── moduledemo.php
└── views
    └── templates
        └── front
            ├── included-template.tpl
            └── moduledemo.tpl

5 directories, 6 files
```

## Overriding templates and assets

Here are the folder paths to create in order to override templates and assets:

```
.
└── modules
    ├── css
    │   ├── external-lib.css
    │   └── style.css
    ├── js
    │   └── app.js
    └── views
        └── templates
            └── front
                ├── included-template.tpl
                └── moduledemo.tpl

6 directories, 5 files
```

Compared to what was needed in PrestaShop 1.6, it is much simpler:

```
.
├── css
│   └── modules
│       └── css
│           ├── external-lib.css
│           └── style.css
├── js
│   └── modules
│       └── js
│           └── app.js
└── modules
    └── views
        └── templates
            └── front
                ├── included-template.tpl
                └── moduledemo.tpl

10 directories, 5 files
```

## Overriding with the 'include' method

There is one very important issue that you should be aware of.
When loading a template file (for instance 'moduledemo.tpl'), PrestaShop will look for overriding first, in the following order:

1. /themes/THEME_NAME/modules/MODULE_NAME/views/templates/front/moduledemo.tpl
2. /modules/MODULE_NAME/views/templates/front/moduledemo.tpl

But if your `moduledemo.tpl` file includes the `included-template.tpl` file, you will have to override 'included-template.tpl' as well, even if you don't want to modify it (nor to edit the path). This means that every file that an overridden file includes needs to be copy-pasted as-is in order for your override to work properly.

The issue goes both ways: if you want to modify the `included-template.tpl` file, you will have to override the `moduledemo.tpl` file that includes it.

```smarty
{include file='./included-template.tpl'}
```

PrestaShop 1.7 introduced a way to include files in module templates. By using this method, all the expected rules will be followed:

```smarty
{include file='module:MODULE_NAME/views/templates/front/included-template.tpl'}
```

## SmartyDev helps you debug!

PrestaShop 1.7 also introduced our own SmartyDev tool, a Smarty extension which allows you to see the template's name within your generated HTML markup. This will help debugging a lot, especially because of template override.

Here an example of generated markup with SmartyDev activated:

```html
[...]
      <a href="http://prestashop.ps/en/" class="dropdown-item">English</a>
    </li>
  </ul>
</div>
<!-- end /var/www/html/PrestaShop/themes/classic/modules/ps_languageselector/ps_languageselector.tpl -->

<!-- begin /var/www/html/PrestaShop/themes/classic/modules/ps_customersignin/ps_customersignin.tpl -->
<div class="user-info">
  <a class="logout hidden-sm-down" href="http://prestashop.ps/en/?mylogout=" rel="nofollow">
    <i class="material-icons">&#xE7FF;</i>
    Sign out
  </a>
  <a class="account" href="http://prestashop.ps/en/my-account" title="View my customer account" rel="nofollow" >
    <i class="material-icons hidden-md-up logged">&#xE7FF;</i>
    <span class="hidden-sm-down">Julien Bourdeau</span>
  </a>
</div>

<!-- end /var/www/html/PrestaShop/themes/classic/modules/ps_customersignin/ps_customersignin.tpl -->

<!-- begin /var/www/html/PrestaShop/themes/classic/modules/ps_shoppingcart/ps_shoppingcart.tpl -->
<div class="blockcart cart-preview " data-refresh-url="http://prestashop.ps/en/module/ps_shoppingcart/ajax">
  <div class="header">
    <i class="material-icons shopping-cart">shopping_cart</i>

[...]
```

To use it, simply set the `_PS_MODE_DEV_` constant to `true` in your installation's `/config/defines.inc.php` file: add the `define('_PS_MODE_DEV_', true);` line to that file in order to turn the PrestaShop Developer Mode on, which features SmartyDev.
