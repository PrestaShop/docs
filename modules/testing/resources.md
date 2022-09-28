---
title: Testing Resources
weight: 10
---

# Testing Resources

## Docker images

Docker isolate your application in containers, making their isolation and deployment easier.
If you're confident with using it, we created several images for easier deployment of PrestaShop:

* [https://hub.docker.com/r/prestashop/prestashop/](https://hub.docker.com/r/prestashop/prestashop/), in which all PrestaShop releases between 1.4 and 1.7 can be found. Covers most needs and is perfect for a quick start.
* [https://hub.docker.com/r/prestashop/prestashop-git/](https://hub.docker.com/r/prestashop/prestashop-git/), containing the git repository content with different PHP version. For advanced users.
* [https://hub.docker.com/r/prestashop/base/](https://hub.docker.com/r/prestashop/base/), containing the required stack to run PrestaShop, without the core files. Recommended if you already have the shop files on your disk.

Please note we try to follow best practices, and MySQL service is NOT provided with these images. You have to deploy your own server in a dedicated container.


When your environment is ready, it's time to configure it before running tests.

## Module management in command line
{{< minver v="1.7.2" title="true" >}}

Managing your modules was only possible from the administration interface. Continuous integration of modules may require preliminary steps like their installation, that's why we added a simple way to manage them in command line.

```bash
php bin/console prestashop:module --help
```

```term
Usage:
  prestashop:module <action> <module name> [<file path>]

Arguments:
  action                Action to execute (Allowed actions: install / uninstall / enable / disable / enable_mobile / disable_mobile / reset / upgrade / configure).
  module name           Module on which the action will be executed
  file path             YML file path for configuration

```

{{% notice note %}}
Use `php app/console` instead of `php bin/console` for versions prior to {{< minver v="1.7.4" >}}
{{% /notice %}}

### Basic actions

The basic actions are the same as you can see on the module list and only require the module name.

* install
* uninstall
* enable
* disable
* enable_mobile
* disable_mobile
* reset
* upgrade

Example:
```term
php bin/console prestashop:module install paypal
```

{{% notice note %}}
Use `php app/console` instead of `php bin/console` for versions prior {{< minver v="1.7.4" >}}
{{% /notice %}}

#### Multishop
In case you want to run your action for a specific shop or shop group, you have two optionnal parameters ``--id_shop=<id>`` and ``--id_shop_group=<id>`` which modifies the current shop context before calling the actual command.

### Configuration

This feature allows an automatic configuration of your module but DOES NOT display the configuration page.

This feature is intended for developers wishing to test their modules after an installation without having to pass the configuration screen, or a PrestaShop agency who has a generic configuration to set on every shops.
With only one command, we expect a module to be totally functional for tests or production.

If we reuse the previous command, we could expect something like this:
```term
php bin/console prestashop:module configure <module name> [<YML file path>]
```

{{% notice note %}}
Use `php app/console` instead of `php bin/console` for versions prior {{< minver v="1.7.4" >}}
{{% /notice %}}


#### Source of data configuration
When not provided, we use by default a file `self_config.yml` stored in the module folder. You can use another file by setting the `<YML file path>`.

#### Format supported
We are going to make it simple and allow only file extension: yaml.

Example:

```yml
# This file is an example of data configuration which can be applied to a module

# Data to be updated in Configuration table
configuration:
    update:
        # Option 1: having a pair key/value
        PAYPAL_SANDBOX: 1
        PAYPAL_API_CARD: 0
        # Option 2: use "value" subkey. Will allow to use additional keys later
        PAYPAL_SANDBOX:
            value: 1
            multilang: false
        # Question: how to handle multi lang values ?
    delete:
        - "PAYPAL_ONBOARDING"

# SQL files to execute
sql:
    - file: "path/to/file1.sql"
    # But key is optional
    - "path/to/file2.sql"
    - "sql/default-config.sql"

# File to copy from local disk or website
files:
    - source: "/path/to/source/file.txt"
      dest: "/module/path/docs/file.txt"

    - source: "https://www.domain.wow/uri/of/file"
      dest: "/module/path/docs/another_file.txt"

# Fox complex configuration data, allow PHP code to be executed
php:
    - file: "path/to/file.php"
       # Must have a class which implements interface PrestaShop\PrestaShop\Adapter\Module\Configuration\ModuleComplexConfigurationInterface
      params:
        - myParam1: 1
        - oneArrayParam:
            - "value1"
            - "value2"
            - withSpecificKey: "value3"
```


## Core Functional tests

PrestaShop provides its own test suite, running with [Playwright](https://playwright.dev). It covers the features of PrestaShop and grows each time a bug is resolved or a feature is added.

These tests are launched every time a change is suggested to the core, but you can also run them with your module installed. This will ensure your module code does not break a critical feature of the core.

This section will be completed when these tests are available on a dedicated repository. In the meantime, you can already reach them on GitHub, in the [tests/UI](https://github.com/PrestaShop/PrestaShop/tree/8.0.x/tests/UI) of PrestaShop files.
