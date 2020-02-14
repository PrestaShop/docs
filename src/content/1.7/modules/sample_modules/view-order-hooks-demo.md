---
title: Order view page new hooks demo tutorial 
weight: 10
---

# Order view page new hooks demo tutorial
{{< minver v="1.7.7.0" title="true" >}}

## Introduction

In this tutorial we are going to build module which extends Order view page. 
By the following tutorial you will learn to extend Order page with 
the following components:

 - User Signature card below the Customer card.
 - Package tracking card below the the card with 'Status', 'Documents',.. tabs.
 - Customer's review card below the Messages card
 - Other orders from this customer card at the bottom of the page
 - Previous / Next order buttons at the top of the Order page
 
While creating these components you will learn how to:

 - Use Repository classes extending Symfony EntityRepository (https://symfony.com/doc/3.4/doctrine/repository.html)
 - Use Twig templates to render HTML (https://twig.symfony.com/)

## Prerequisites

- To be familiar with basic module creation.

### Register hooks

On module installation the following hooks are being registered:

 - `displayBackOfficeOrderActions` - displayed between Customer and Messages cards in the Order page
 - `displayAdminOrderTabContent` - for adding tab content to Order page
 - `displayAdminOrderTabLink` - for adding tab links for tab content
 - `displayAdminOrderMain` - for adding Order main information
 - `displayAdminOrderSide` - for adding Order side information
 - `displayAdminOrder` - displayed at the bottom of the Order page
 - `displayAdminOrderTop` - displayed at the top of the Order page
 - `actionGetAdminOrderButtons` - gets back office order buttons
 
These hooks are visualized in the picture below:

 {{< figure src="../img/view-order-hooks-demo/ps-view-order-page-hooks.jpg" title="Order page hooks locations" >}}
 
 ```php
 
    private function registerHooks(Module $module): bool
    {
        // All hooks in the order view page.
        $hooks = [
            'displayBackOfficeOrderActions',
            'displayAdminOrderTabContent',
            'displayAdminOrderTabLink',
            'displayAdminOrderMain',
            'displayAdminOrderSide',
            'displayAdminOrder',
            'displayAdminOrderTop',
            'actionGetAdminOrderButtons',
        ];

        return (bool) $module->registerHook($hooks);
    }
 ```

### Create User Signature card below the Customer card.

Lets create `Installer` class responsible for creating `signature` table in the database:

```php
<?php

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

    /**
     * Install the database modifications required for this module.
     *
     * @return bool
     */
    private function installDatabase(): bool
    {
        $queries = [
            'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'signature` (
              `id_signature` int(11) NOT NULL AUTO_INCREMENT,
              `id_order` int(11) NOT NULL,
              `filename` varchar(64) NOT NULL,
              PRIMARY KEY (`id_signature`),
              UNIQUE KEY (`id_order`)
            ) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8;'
        return $this->executeQueries($queries);
    }
}
```
Also let's create `FixturesInstaller` class for populating our database with data

```php
<?php

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
        $this->db->insert('signature', [
            'id_order' => $orderId,
            'filename' => 'john_doe.png',
        ]);
    }
}

```
Then let's create `InstallerFactory` which will be used both to install and uninstall database:

```php
<?php

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

And use it in the `DemoViewOrderHooks` class which extends the `Module` class: 

```php
<?php

declare(strict_types=1);

use PrestaShop\Module\DemoViewOrderHooks\Install\InstallerFactory;

if (!defined('_PS_VERSION_')) {
    exit;
}

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

Lets create `SignatureRepository` class:

```php
<?php
declare(strict_types=1);

namespace PrestaShop\Module\DemoViewOrderHooks\Repository;

use Doctrine\ORM\EntityRepository;

class SignatureRepository extends EntityRepository
{
}
```

Lets create services configuration for the above classes to use dependency injection (DI) in `config/services.yml`:

```php
parameters:
  signatureImgDirectory: 'signatures/'

services:
  prestashop.module.demovieworderhooks:
    class: DemoViewOrderHooks
    factory: [Module, getInstanceByName]
    arguments:
      - 'demovieworderhooks'

  prestashop.module.demovieworderhooks.repository.order_repository:
    class: PrestaShop\Module\DemoViewOrderHooks\Repository\OrderRepository

  prestashop.module.demovieworderhooks.repository.signature_repository:
    class: PrestaShop\Module\DemoViewOrderHooks\Repository\SignatureRepository
    factory: ['@doctrine.orm.default_entity_manager', getRepository]
    arguments:
      - PrestaShop\Module\DemoViewOrderHooks\Entity\Signature
```
 

## Result

After completing the steps above the results should be:

 - Signature and Package tracking cards:

 {{< figure src="../img/view-order-hooks-demo/view-order-demo-result.png" title="Signature card" >}}
