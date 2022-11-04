---
title: Configuring PrestaShop
---

# Introduction to configuration

## Storage & access

Most of PrestaShop's configuration is stored in the `ps_configuration` database table and is accessible through the [Configuration storage service][configuration-storage].

Some settings are hard coded as constants.

## Configuration files

PrestaShop has four main configuration files:

* `/config/config.inc.php`
* `/config/defines.inc.php`
* `/config/smarty.config.inc.php`
* `/app/config/parameters.php`

### config.inc.php

It is the main configuration file for PrestaShop. You should not need to touch anything in there.

### defines.inc.php

This file contains PrestaShop constant values.

It also contains the location of all the files and folders. If you need to change their location, do not forget to keep the original path nearby, for instance in a PHP comment, in case you need to revert back to it later on.

You can override constant values from this file by setting them in `/config/defines_custom.inc.php`. This is also a great place to put your custom constants which needs to be available globally in the system.

### smarty.config.inc.php

This file contains all the Smarty-related settings.

The Smarty cache system should always be disabled, as it is not compatible with PrestaShop: keep `$smarty->caching = false;` as it is.

`$smarty->compile_check` should be left to `false` in development mode.

`$smarty->debugging` gives access to Smarty debug information when displaying a page. That setting is more easily modified in the “Performance” page of the advanced parameters menu: the “Debug console” option enables you to choose between never displaying Smarty’s debug information, always displaying it, or only displaying it when you add `?SMARTY_DEBUG` to the URL of the page you want to test, which can be very useful.

When in production mode, `$smarty->force_compile` must be kept to `false`, as it will give a 30% boost to your page load time.

On the other hand, when editing a `.tpl` file, you must delete the `/var/cache/(dev|prod)/smarty/compile` folder (except the `index.php` file) in order to see your changes applied or clear cache directly from Back-Office.

Note that this configuration can be set up directly from the back office, in the “Performance” page under the “Advanced parameters” menu.

### parameters.php

This file contains some of important settings such as database connection details and caching mechanism. If you change something in this file, make sure to delete cache files manually from `/var/cache/(dev|prod)` folder.

## Enabling debug mode

PrestaShop’s default settings prevent customers from seeing any server error message or debugging code.

You, on the other hand, might need this information in order to correct any potential problem. For this purpose, you can activate the Debug mode.

Open the `/config/defines.inc.php` file, and edit it to set `_PS_MODE_DEV_` to `true`:

```php
define('_PS_MODE_DEV_', true);
```

You can also enable developer mode directly from your Back office: go to _Advanced parameters > Performance_, then change the "Debug mode" setting to "Yes".

{{% notice tip %}}
**Inspecting variables**

You can use Symfony's powerful [`dump()`](https://symfony.com/doc/current/components/var_dumper.html#the-dump-function) function to display the content of a variable. This function is only available when the Debug mode is on.
{{% /notice %}}

**The Debug mode produces a significant performance hit**, don't forget to disable it as soon as you finish debugging your code!

## Disabling the cache and forcing Smarty compilation

When your development has an impact on the front office, whether you are building a theme or simply a module which displays information to the customer, you should force the template file compilation and disable the cache, in order to always see the result of your changes directly.

Go to the “Performance” page under the “Advanced parameters” menu to change the following Smarty settings:

* Template compilation: switch it to “Force compilation”.
* Cache: disable it.

Forcing the compilation of Smarty will always slow down the loading time of the page. Make sure that your production store is set to only recompile templates if there are updated files, and that its cache is enabled.


## Disable the Back office token protection

Back office pages require the use of a token. If needed, this protection can be disabled using an environment variable:

### Apache with mod_headers

```bash
SetEnv _TOKEN_ disabled
```

### Nginx with ngx_http_headers_module

```bash
add_header _TOKEN_ disabled;
```

[configuration-storage]: {{< relref "/8/development/components/configuration/" >}}

