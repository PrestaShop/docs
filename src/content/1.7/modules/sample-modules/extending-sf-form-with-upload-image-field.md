---
title: Extending Symfony form with upload image field
weight: 3
aliases: 
    - /1.7/modules/sample_modules/grid-and-identifiable-object-form-hooks-usage
---

# Grid and identifiable object form hooks usage example
{{< minver v="1.7.7" title="true" >}}


## Introduction

In this tutorial we are going to build a module which extends `Suppliers` form (SELL -> Catalog -> Brands & Suppliers).
You will learn how to:

- Main module class
- Installer class
- Create Symfony controller
- Doctrine entity
- Repository class
- Image Uploader class
- Twig View

### Main module class

Let's create main module class `DemoExtendSymfonyForm2`

```php
<?php
declare(strict_types=1);

// use statements

if (!defined('_PS_VERSION_')) {
    exit;
}

require_once __DIR__.'/vendor/autoload.php';

/**
 * Class demoextendsymfonyform
 */
class DemoExtendSymfonyForm2 extends Module
{
    private const SUPPLIER_EXTRA_IMAGE_PATH = '/img/su/';

    public function __construct()
    {
        $this->name = 'demoextendsymfonyform2';
        $this->author = 'PrestaShop';
        $this->version = '1.0.0';
        $this->ps_versions_compliancy = ['min' => '1.7.7.0', 'max' => _PS_VERSION_];

        parent::__construct();

        $this->displayName = $this->l('Demo Symfony Forms #2');
        $this->description = $this->l(
            'Demonstration of how to add an image upload field inside the Symfony form'
        );
    }
}
```

Let's create Installer class:

```php
declare(strict_types=1);

namespace PrestaShop\Module\DemoExtendSymfonyForm\Install;


use Db;
use Module;

/**
 * Class Installer
 * @package PrestaShop\Module\DemoExtendSymfonyForm\Install
 */
class Installer
{
    /**
     * Module's installation entry point.
     *
     * @param Module $module
     *
     * @return bool
     */
    public function install(Module $module): bool
    {
        if (!$this->registerHooks($module)) {
            return false;
        }

        if (!$this->installDatabase()) {
            return false;
        }

        return true;
    }

    /**
     * Module's uninstallation entry point.
     *
     * @return bool
     */
    public function uninstall(): bool
    {
        return $this->uninstallDatabase();
    }

    /**
     * Install the database modifications required for this module.
     *
     * @return bool
     */
    private function installDatabase(): bool
    {
        $queries = [
            'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'supplier_extra_image` (
              `id_extra_image` int(11) NOT NULL AUTO_INCREMENT,
              `id_supplier` int(11) NOT NULL,
              `image_name` varchar(64) NOT NULL,
              PRIMARY KEY (`id_extra_image`)
            ) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8;',
        ];

        return $this->executeQueries($queries);
    }

    /**
     * Uninstall database modifications.
     *
     * @return bool
     */
    private function uninstallDatabase(): bool
    {
        $queries = [
            'DROP TABLE IF EXISTS `'._DB_PREFIX_.'supplier_extra_image`',
        ];

        return $this->executeQueries($queries);
    }

    /**
     * Register hooks for the module.
     *
     * @param Module $module
     *
     * @return bool
     */
    private function registerHooks(Module $module): bool
    {
        $hooks = [
            'actionSupplierFormBuilderModifier',
            'actionAfterCreateSupplierFormHandler',
            'actionAfterUpdateSupplierFormHandler',
        ];

        return (bool) $module->registerHook($hooks);
    }

    /**
     * A helper that executes multiple database queries.
     *
     * @param array $queries
     *
     * @return bool
     */
    private function executeQueries(array $queries): bool
    {
        foreach ($queries as $query) {
            if (!Db::getInstance()->execute($query)) {
                return false;
            }
        }

        return true;
    }
}
```

Let's use Installer class inside the main module class

```php
    /**
     * @return bool
     */
    public function install()
    {
        if (!parent::install()) {
            return false;
        }

        $installer = new Installer();

        return $installer->install($this);
    }

    /**
     * @return bool
     */
    public function uninstall()
    {
        $installer = new Installer();

        return $installer->uninstall() && parent::uninstall();
    }
```

 
