---
title: Commands
weight: 10
---

# Commands
{{< minver v="1.7.5" title="true" >}}

Since version 1.7 of PrestaShop, everyone have access to the PrestaShop console using the following instruction in a terminal:

``
./bin/console
``

Since v1.7.5, you can add and provide your own commands into the PrestaShop console using modules.

{{% notice warning %}}
If you load and use PrestaShop Core legacy classes such as an ObjectModel within a Command context, you might run into issues. This is a known limitation of the Commands.
Removing this limitation is being explored for future PS versions.
{{% /notice %}}

Let's see an example of a really common task when we usually use CRON scripts: you want to export your products into an XML file in order to import them into an another platform (a PIM or an ERP).

You could rely on the webservices, but they are not really easy to configure. This is how you can do it using a PrestaShop command.

## Create a command in the module

You need to create the file and register it as a "command".

### Setup composer

First you need to setup your composer file, you will find more info about it in [Setup composer][setup-composer]

[setup-composer]: {{< ref "/1.7/modules/concepts/services/_index.md#setup-composer" >}}

### Creation of the command

At this moment, the only requirement is that you PHP file needs to be a class that extends `Symfony\Component\Console\Command`. Let's create ExportCommand file:

```php
<?php
// your-module/src/Command/ExportCommand.php
namespace YourCompany\YourModule\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ExportCommand extends Command
{
    protected function configure()
    {
        // The name of the command (the part after "bin/console")
        $this->setName('your-module:export');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        // Here your business logic.
        $output->write('Export done!');
    }
}
```

### Registration of the command

Now, in order to make this really simple command available in the console, we register it in the services.yml file:

```yaml
# your-module/config/services.yml
services:
    your_company.your_module.export_command:
        class: YourCompany\YourModule\Command\ExportCommand
        tags:
            - { name: 'console.command' }
```

The command should be now available using `./bin/console your-module:export`.


### Autoloading

The instructions above are assuming the module is installed via composer. In case you follow the same procedure but wish to add the command in your already existing module in `modules/<module_directory>` then the procedure requires an extra step. 

For example with a structure like this 

```tree
modules/module_directory/
├── config
│   └── services.yml
├── config.xml
├── module_directory.php
├── src
│   └── Command
│       └── SyncCommand.php
```

You would also need to namespace your src directory in `docroot/composer.json`

By appending the following 

```
    "autoload": {
        "psr-4": {
            "PrestaShop\\PrestaShop\\": "src/",
            "PrestaShopBundle\\": "src/PrestaShopBundle/",
            "Vendor\\Module\\": "modules/module_directory/src/"
        },
        "classmap": [
            "app/AppKernel.php",
            "app/AppCache.php"
        ]
    },
```

And follow through using the correct namespaces throught your module commands. 

### Predefined Constants

If you would like to use existing PS constants like `_DB_PREFIX_` you also need to require the file `config/config.inc.php` 

e.g. 

```php
$basePath = realpath(__DIR__ . '/../../../../');
require_once $basePath . '/config/config.inc.php';
```

### Loading Module Classes 

Commands by default won't have module classes loaded. You need to explicitly require the modules before you can use their classes

e.g. 

```php
require_once $basePath . '/modules/<module_directory>/<module_directory>.php';
```        
        

## Learn more about the PrestaShop Console

We use the Symfony Console with nothing specific to PrestaShop.

You can learn everything about this component in [their documentation](https://symfony.com/doc/3.4/console.html) in version 3.4.

To sum up, there is a list of useful links:

* [Create a new command](https://symfony.com/doc/3.4/console.html#creating-a-command);
* [Manage the Command arguments](https://symfony.com/doc/3.4/console/input.html);
* [Manage the Command output](https://symfony.com/doc/3.4/console/style.html);
* [How to inject dependencies](https://symfony.com/doc/3.4/console.html#getting-services-from-the-service-container) in a Command;
* [How to test a Command](https://symfony.com/doc/3.4/console.html#testing-commands);
* [Example module how to create console command](https://github.com/PrestaShop/example-modules/tree/master/democonsolecommand);
