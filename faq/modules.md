---
title: Modules FAQ
---

# Modules FAQ

[module-commands]: {{< ref "/1.7/modules/concepts/commands" >}}

**Q:** How do I add a command to an existing module with autoloading?

**A:** [In the modules section of the documentation, about module commands][module-commands], the instructions assume the module is installed via Composer. If you follow the same procedure but wish to add the command in your existing module in `modules/<module_directory>`, then the procedure requires an extra step. 

For example, with a structure like this:

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

You would also need to namespace your `src` directory in `composer.json` located in the base directory of your project, by appending the following:

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

And follow through using the correct namespaces throughout your module commands. 

**Predefined Constants**: If you would like to use existing PS constants like `_DB_PREFIX_`, you also need to require the file `config/config.inc.php`. 

e.g. 

```php
$basePath = realpath(__DIR__ . '/../../../../');
require_once $basePath . '/config/config.inc.php';
```

**Loading Module Classes**: Commands, by default, won't have module classes loaded. You must require the module's main file before using their classes.

e.g. 

```php
require_once _PS_MODULE_DIR_ . '/<module_directory>/<module_directory>.php';
```        