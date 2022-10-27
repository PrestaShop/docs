---
title: Configure with CLI
weight: 0
---

# Configure a module with CLI

From {{< minver v="1.7.2" >}}, Self Configurator feature was introduced in the `ModuleCommand`.

Self Configurator is a feature that allows module configuration management from a command, without having to connect on the back office of the shop.

From a configuration file, the command is able to do some configuration on a specific module, e.g.:

- change values in the `Configuration` table
- execute SQL statements from a `.sql` file
- copy files
- execute `php` scripts

Complete reference of Self Configurator: [ModuleSelfConfigurator.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/Adapter/Module/Configuration/ModuleSelfConfigurator.php)

## How to use it

You need to create a configuration file, with the `yaml` [format](https://symfony.com/doc/current/components/yaml/yaml_format.html), and execute:

`php bin/console prestashop:module configure <modulename> <configfilepath>`

{{% notice info %}}
Please note that the third argument `<configfilepath>` is optional. If not set, PrestaShop will try to find a file named `self_config.yml` in the module's folder (and sub-folders).
{{% /notice %}}

## Apply configuration file on a specific shop or group

The Prestashop `prestashop:module` command allows you to restrict its actions on a specific shop (or group).

To do so, add an `--id_shop` or an `--id_shop_group` argument to the command:

```bash
php bin/console prestashop:module configure <modulename> <configfilepath> --id_shop=<id>
php bin/console prestashop:module configure <modulename> <configfilepath> --id_shop_group=<id>
```

## Configuration file reference

### Change values in the Configuration table

The Self Configurator feature allows editing values in the `Configuration` table from the configuration file. 

To do so, add a `configuration:` line, choose if you want to update or delete a configuration value, and add the configuration key and its value like in those examples:

```yaml
configuration:
    update:
        PAYPAL_SANDBOX: 1
```

```yaml
configuration:
    delete:
        - "PAYPAL_ONBOARDING"
```

{{% notice info %}}
Please note that you can `create` values by specifying them in the `update` section.
{{% /notice %}}

### Execute SQL statements from a `.sql` file

The Self Configurator feature allows to execute a `.sql` file with statements on your database.

To do so, add the path of your `.sql` file like in this example:

```yaml
sql:
    - "myscript.sql"
```

{{% notice info %}}
Please note that your paths are relative to the configuration file.
{{% /notice %}}

### Copy files

The Self Configurator feature allows to copy files (or URLs) from the configuration file.

To do so, add your source and destination path like in those examples:

```yaml
files:
    - source: "../source/file.txt"
      dest: "docs/file.txt"
```

```yaml
files:
    - source: "https://www.prestashop-project.org"
      dest: "webpage.html"
```

```yaml
files:
    - source: "../source/file1.txt"
      dest: "docs/file1.txt"
    - source: "../source/file2.txt"
      dest: "docs/file2.txt"
```

{{% notice info %}}
Please note that if you use paths, your paths should be relative to the configuration file.
{{% /notice %}}

### Execute `php` scripts

For complex actions, you can execute `php` code from your configuration file. 

Your file must contain a class implementing the interface `PrestaShop\PrestaShop\Adapter\Module\Configuration\ModuleComplexConfigurationInterface`: [see reference here](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/Adapter/Module/Configuration/ModuleComplexConfigurationInterface.php).

**The class name needs to match the file name.**

You have to declare a method: `public function run(ModuleInterface $module, array $params);`

Create a file named `ConfigurationScript.php` with this content:

```php
use PrestaShop\PrestaShop\Adapter\Module\Configuration\ModuleComplexConfigurationInterface;

class ConfigurationScript implements ModuleComplexConfigurationInterface
{
    public function run(ModuleInterface $module, array $params)
    {

    }
}
```

And add to the configuration file:

```yaml
php:
    - file: "ConfigurationScript.php"
```

The method will receive the module's name, and an empty `array $params`.

To add a parameter with key `myParam1` and value `1`, do the following:

```yaml
php:
    - file: "ConfigurationScript.php"
      params:
        - myParam1: 1
```

To add a parameter of type `array`, with key `oneArrayParam` and the following value `["value1", "value2", "withSpecificKey" => "value3"]`, do the following: 

```yaml
php:
    - file: "ConfigurationScript.php"
      params:
        - oneArrayParam:
            - "value1"
            - "value2"
            - withSpecificKey: "value3"
```

## Complete config file example

```yaml
# This file is an example of data configuration which can be applied to a module
# Paths are relative to the config file!

# Update data in Configuration table
configuration:
    update:
        # Option 1: having a pair key/value
        PAYPAL_SANDBOX: 1
        PAYPAL_API_CARD: 0
        # Option 2: use "value" subkey. Will allow to use addtionnal keys later
        PAYPAL_SANDBOX_2:
            value: 1
    delete:
        - "PAYPAL_ONBOARDING"

# Execute sql files
sql:
    - "sql/default-config.sql"

# Copy files
files:
    - source: "../source/file.txt"
      dest: "docs/file.txt"
      
    - source: "https://www.prestashop.com"
      dest: "webpage.html"

# Execute php script
php:
    - file: "ConfigurationScript.php"
      params:
        - myParam1: 1
        - oneArrayParam:
            - "value1"
            - "value2"
            - withSpecificKey: "value3"
```