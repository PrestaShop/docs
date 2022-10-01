---
title: Module base creation 
weight: 1
---

# Module base creation

### Composer autoloading

Let's create module folder `demovieworderhooks` inside `modules` directory (located in the root of
 PrestaShop project). Then create `composer.json` in the root of the module to autoload classes 
 with the namespaces  (PrestaShop\\Module\\DemoViewOrderHooks\\) we define from the `src` folder
 (https://getcomposer.org/doc/01-basic-usage.md#autoloading). Using composer PSR-4 `autoload` helps
  us autoload classes without the need to use `require_once __DIR__.'/vendor/autoload.php';` .
 
{{% notice note %}}
Even though using `autoload` block in `composer.json` helps us to autoload classes from the specified
folder `src` with the namespace `PrestaShop\\Module\\DemoViewOrderHooks\\` we might have some 
autoloading issues if we use our classes in our module main file `demovieworderhooks.php`.
For example, we might define a constant if one of our class and use it in
`demovieworderhooks.php` when we will get error: `the class is not defined`. Then a solution can be 
including `require_once __DIR__.'/vendor/autoload.php';` before the main module class 
`demovieworderhooks` is defined.
{{% /notice %}}

```json
{
    "name": "prestashop/demovieworderhooks",
    "authors": [
        {
            "name": "Name Surname",
            "email": "author@email.com"
        }
    ],
    "autoload": {
      "psr-4": {
        "PrestaShop\\Module\\DemoViewOrderHooks\\": "src/"
      },
      "config": {
        "prepend-autoloader": false
      },
      "type": "prestashop-module"
    }
}
```

Then run `composer install` on the terminal/command line inside `/modules/demovieworderhooks/` folder. 
Also run `composer dump-autoload` to re-generate the vendor/autoload.php file.
If files were autoloaded successfully you should see something similar to 
`PrestaShop\\Module\\DemoViewOrderHooks\\' => array($baseDir . '/src')` in 
`modules/demovieworderhooks/vendor/composer/autoload_psr4.php` generated.

### Module installation

Let's use SOLID principles (https://en.wikipedia.org/wiki/SOLID) to make code more understandable, 
flexible and maintainable. Create `FixturesInstaller` class inside `/demovieworderhooks/src/Install`
folder to represent `Single responsibility principle` 
(https://en.wikipedia.org/wiki/Single_responsibility_principle) responsible only for module 
fixtures data inserted to the database. 

```php
<?php
/**
 * Copyright since 2007 PrestaShop SA and Contributors
 * PrestaShop is an International Registered Trademark & Property of PrestaShop SA
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License version 3.0
 * that is bundled with this package in the file LICENSE.md.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/AFL-3.0
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * @author    PrestaShop SA and Contributors <contact@prestashop.com>
 * @copyright Since 2007 PrestaShop SA and Contributors
 * @license   https://opensource.org/licenses/AFL-3.0 Academic Free License version 3.0
 */

declare(strict_types=1);

namespace PrestaShop\Module\DemoViewOrderHooks\Install;

use Db;
use Order;

/**
 * Installs data fixtures for the module.
 */
class FixturesInstaller
{
    /**
     * @var Db
     */
    private $db;

    public function __construct(Db $db)
    {
        $this->db = $db;
    }

    public function install(): void
    {
        $orderIds = Order::getOrdersIdByDate('2000-01-01', '2100-01-01');

        foreach ($orderIds as $orderId) {
            $this->insertSignature($orderId);
        }
    }

    private function insertSignature(int $orderId): void
    {
        $this->db->insert('order_signature', [
            'id_order' => $orderId,
            'filename' => 'john_doe.png',
        ]);
    }
}
```

Let's create `Installer` class inside `/demovieworderhooks/src/Install` folder structure. 
It is responsible only for module installation (hook registration, database creation, 
population database data). When it comes to database creation we use PrestaShop `DbCore` class 
functions because [Doctrine](https://symfony.com/doc/4.4/doctrine) is [not fully supported for modules installation]({{< relref "/8/modules/concepts/doctrine/#creating-the-database" >}}) at 1.7.7.0 release.

```php
<?php
/**
 * Copyright since 2007 PrestaShop SA and Contributors
 * PrestaShop is an International Registered Trademark & Property of PrestaShop SA
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License version 3.0
 * that is bundled with this package in the file LICENSE.md.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/AFL-3.0
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * @author    PrestaShop SA and Contributors <contact@prestashop.com>
 * @copyright Since 2007 PrestaShop SA and Contributors
 * @license   https://opensource.org/licenses/AFL-3.0 Academic Free License version 3.0
 */

declare(strict_types=1);

namespace PrestaShop\Module\DemoViewOrderHooks\Install;

use Db;
use Module;

/**
 * Class responsible for modifications needed during installation/uninstallation of the module.
 */
class Installer
{
    /**
     * @var FixturesInstaller
     */
    private $fixturesInstaller;

    public function __construct(FixturesInstaller $fixturesInstaller)
    {
        $this->fixturesInstaller = $fixturesInstaller;
    }

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

        $this->fixturesInstaller->install();

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
            'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'order_signature` (
              `id_signature` int(11) NOT NULL AUTO_INCREMENT,
              `id_order` int(11) NOT NULL,
              `filename` varchar(64) NOT NULL,
              PRIMARY KEY (`id_signature`),
              UNIQUE KEY (`id_order`)
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
            'DROP TABLE IF EXISTS `'._DB_PREFIX_.'order_signature`',
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
        // Hooks available in the order view page.
        $hooks = [
            'displayBackOfficeOrderActions',
            'displayAdminOrderTabLink',
            'displayAdminOrderTabContent',
            'displayAdminOrderMain',
            'displayAdminOrderSide',
            'displayAdminOrder',
            'displayAdminOrderTop',
            'actionGetAdminOrderButtons',
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

Then let's create `InstallerFactory` inside `/demovieworderhooks/src/Install` which will be used 
to create `Installer` object. We call it factory because it deals with creating objects without 
having to specify the exact class of the object that will be created. 
More about factory design pattern: https://en.wikipedia.org/wiki/Factory_method_pattern

```php
<?php
/**
 * Copyright since 2007 PrestaShop SA and Contributors
 * PrestaShop is an International Registered Trademark & Property of PrestaShop SA
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License version 3.0
 * that is bundled with this package in the file LICENSE.md.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/AFL-3.0
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * @author    PrestaShop SA and Contributors <contact@prestashop.com>
 * @copyright Since 2007 PrestaShop SA and Contributors
 * @license   https://opensource.org/licenses/AFL-3.0 Academic Free License version 3.0
 */

declare(strict_types=1);

namespace PrestaShop\Module\DemoViewOrderHooks\Install;

use Db;

class InstallerFactory
{
    public static function create(): Installer
    {
        return new Installer(
            new FixturesInstaller(Db::getInstance())
        );
    }
}
```

Let's create main module file: `demovieworderhooks.php` inside the `modules/demovieworderhooks` folder. 
And create `DemoViewOrderHooks` class which extends the `Module` class:

```php
<?php
/**
 * Copyright since 2007 PrestaShop SA and Contributors
 * PrestaShop is an International Registered Trademark & Property of PrestaShop SA
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License version 3.0
 * that is bundled with this package in the file LICENSE.md.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/AFL-3.0
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * @author    PrestaShop SA and Contributors <contact@prestashop.com>
 * @copyright Since 2007 PrestaShop SA and Contributors
 * @license   https://opensource.org/licenses/AFL-3.0 Academic Free License version 3.0
 */

declare(strict_types=1);

use PrestaShop\Module\DemoViewOrderHooks\Install\InstallerFactory;

if (!defined('_PS_VERSION_')) {
    exit;
}

require_once __DIR__.'/vendor/autoload.php';

class DemoViewOrderHooks extends Module
{
    public function __construct()
    {
        $this->name = 'demovieworderhooks';
        $this->author = 'PrestaShop';
        $this->version = '1.0.0';
        $this->ps_versions_compliancy = ['min' => '1.7.7.0', 'max' => _PS_VERSION_];

        parent::__construct();

        $this->displayName = $this->l('Demo view order hooks');
        $this->description = $this->l('Demonstration of new hooks in PrestaShop 1.7.7 order view page');
    }

    public function install()
    {
        if (!parent::install()) {
            return false;
        }

        $installer = InstallerFactory::create();

        return $installer->install($this);
    }

    public function uninstall()
    {
        $installer = InstallerFactory::create();

        return $installer->uninstall() && parent::uninstall();
    }

}
```

Now we can install the module through PrestaShop Back Office `Modules\Module Catalog`. 
In the search box type `Demo`, click `Enter` and then you should see the module with name
`Demo view order hooks` suggested for Installation. Click `Install`, you should see the green box
at the top right corner telling you about the success! 

Let's go to create `Signature card` and `Additional action buttons`, I am getting excited now!
