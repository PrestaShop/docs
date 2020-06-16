---
title: Configuration
weight: 15
---

# Configuring PrestaShop

By default, PrestaShop is configured to provide a secure and stable environment to both the shop administrator and the customers.

As a developer, there are several changes that you could and should bring to the default installation in order to help you code better, spot bugs faster, and generally make a great PrestaShop product.

## Disabling the cache and forcing Smarty compilation

When your development has an impact on the front office, whether you are building a theme or simply a module which displays information to the customer, you should force the template file compilation and disable the cache, so as to always see the result of your changes directly.

Go to the “Performances” page under the “Advanced parameters” menu to change the following Smarty settings:

* Template cache: switch it to “Force compilation”.
* Cache: disable it.

Forcing the compilation of Smarty will always slow down the loading time of the page. Make sure that your production store is set to only recompile templates if there are updated files, and that its cache is enabled.

## Displaying error messages

PrestaShop’s default settings prevent the customer to see any server error message or any debugging code.

You, on the other hand, need this information in order to correct any potential mistake in your code. To that end, open the `/config/defines.inc.php` file, and edit it to set `_PS_MODE_DEV_` to `true`:

```php
<?php
/* Debug only */
define('_PS_MODE_DEV_', true);
```

## Using the dump() method

These two methods enable you to check for the state of a given variable at a specific place within your code.

PrestaShop used to have custom debug methods available for developers: `p($variable)` and `d($variable)`. They were used to display the content of a variable, and were really a wrapper around the well-known `print_r()` method. On top of that, PrestaShop had the `ppp()` and `ddd()` methods, which were respectively the aliases of `p()` and `d()`; and the various `fd()`, `epr()` and `dieObject()` methods.

All of this has changed with PrestaShop 1.7: we now rely solely on Symfony’s `VarDumper::dump()` function. You can now rely on a single method instead of having multiple debug functions. The dump() function is very powerful, and is always available on output (even without `die()`). Moreover, you can use it in your console scripts because this function also has a formatter in CLI mode.

The `dump()` method is not activated by default. To activate it, you must enable the Debug mode, by setting `_PS_MODE_DEV_` to `true` (see above).

## Enabling the multistore mode

Since version 1.5, PrestaShop is able to host more than one store within a single installation of the software. Many shop administrators choose to enable this feature, and it can have a significant impact on the way PrestaShop works. You should therefore make sure that anything you code for PrestaShop works in both single and multistore mode.

Enabling the multistore mode is easy: go to the general preferences page, and put the “Enable Multistore” option to “Yes”.

You can switch back and forth between single store and multistore mode? In single store mode, only the main store is used.

You can read more about the multistore mode in the PrestaShop 1.6 User Guide: https://doc.prestashop.com/display/PS16/Managing+Multiple+Shops.

## About the configuration files

There are three main configuration files, all located in the `/config` folder:

* `config.inc.php`
* `defines.inc.php`
* `smarty.config.inc.php`

### config.inc.php

It is the main configuration file for PrestaShop. You should not have to touch anything in there.

### defines.inc.php

This file contains PrestaShop constant values.

It also contains the location of all the files and folders. If you need to change their location, do not forget to keep the original path nearby, for instance in a PHP comment, in case you need to revert back to it later on.

When in development/test mode, you must make sure that all the error messages are displayed:

* Set `define('_PS_MODE_DEV_', false);` to `true`.

On the contrary, when in production mode, you must hide error messages as much as possible!

* Make sure that `define('_PS_MODE_DEV_', false);` is set to `false`.

### smarty.config.inc.php

This file contains all the Smarty-related settings.

The Smarty cache system should always be disabled, as it is not compatible with PrestaShop: keep `$smarty->caching = false;` as it is.

`$smarty->compile_check` should be left to `false` in development mode.

`$smarty->debugging` gives access to Smarty debug information when displaying a page. That setting is more easily modified in the “Performance” page of the advanced parameters menu : the “Debug console” option enables you to choose between never displaying Smarty’s debug information, always displaying it, or only displaying it when you add `?SMARTY_DEBUG` to the URL of the page you want to test, which can be very useful.

When in production mode, `$smarty->force_compile` must be set to `false`, as it will give a 30% boost to your page load time.

On the other hand, when editing a `.tpl` file, you must delete the `/tools/smarty/compile` folder (except the `index.php` file) in order to see your changes applied.

Note that this setting can be made directly from the back office, in the “Performance” page under the “Advanced parameters” menu.
