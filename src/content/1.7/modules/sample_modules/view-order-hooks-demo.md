---
title: Order view page new hooks demo tutorial 
weight: 10
---

# Order view page new hooks demo tutorial
{{< minver v="1.7.7.0" title="true" >}}

## Introduction

In this tutorial we are going to build a module to extend Order view page. 
The module will add the following components:

 - User Signature card below the Customer card.
 
While creating this component you will learn how to:

 - Use Doctrine (https://devdocs.prestashop.com/1.7/modules/concepts/doctrine/)
 - Use Repository classes extending Symfony EntityRepository (https://symfony.com/doc/3.4/doctrine/repository.html)
 - Use Symfony services (https://devdocs.prestashop.com/1.7/modules/concepts/services/)
 - Use Twig templates to render HTML (https://devdocs.prestashop.com/1.7/development/architecture/migration-guide/templating-with-twig/)
 - Various design patterns: Repository, Factory, Presenter

## Prerequisites

- To be familiar with basic module creation.

### Register hooks

On module installation the following hooks can be registered:

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

Let's start from the first one - `displayBackOfficeOrderActions` and create a demo for it. 

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
Then let's create `InstallerFactory` which will be used create `Installer` object.

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

Let's create `Signature` entity class and use Doctrine Object Relational Mapping (ORM) annotations.
For more information: https://devdocs.prestashop.com/1.7/modules/concepts/doctrine/#define-an-entity

```php
<?php

declare(strict_types=1);

namespace PrestaShop\Module\DemoViewOrderHooks\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table()
 * @ORM\Entity()
 */
class Signature
{
    /**
     * @var int|null
     *
     * @ORM\Id
     * @ORM\Column(name="id_signature", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="id_order", type="integer")
     */
    private $orderId;

    /**
     * @var string
     *
     * @ORM\Column(name="filename", type="string")
     */
    private $filename;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int $id
     *
     * @return Signature
     */
    public function setId(int $id): Signature
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getFilename(): string
    {
        return $this->filename;
    }

    /**
     * @param string $filename
     *
     * @return Signature
     */
    public function setFilename(string $filename): Signature
    {
        $this->filename = $filename;

        return $this;
    }

    /**
     * @return int
     */
    public function getOrderId(): int
    {
        return $this->orderId;
    }

    /**
     * @param int $orderId
     *
     * @return Signature
     */
    public function setOrderId(int $orderId): Signature
    {
        $this->orderId = $orderId;

        return $this;
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

Lets create services configuration for the above classes in `config/services.yml`. 
For more information: https://devdocs.prestashop.com/1.7/modules/concepts/services/#symfony-services

```yaml
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

Let's create `SignaturePresenter` class responsible for returning order customer data:

```php
<?php
declare(strict_types=1);

namespace PrestaShop\Module\DemoViewOrderHooks\Presenter;

use Gender;
use Order;
use PrestaShop\Module\DemoViewOrderHooks\Entity\Signature;

class SignaturePresenter
{
    /**
     * @var string
     */
    private $signatureImgDir;

    public function __construct(string $signatureImgDir)
    {
        $this->signatureImgDir = $signatureImgDir;
    }

    public function present(Signature $signature, int $languageId): array
    {
        $order = new Order($signature->getOrderId());
        $customer = $order->getCustomer();
        $gender = new Gender($customer->id_gender, $languageId);

        return [
            'firstName' => $customer->firstname,
            'lastName' => $customer->lastname,
            'gender' => $gender->name,
            'filename' => $this->signatureImgDir.$signature->getFilename()
        ];
    }
}
```

Let's create a twig template in `modules/demovieworderhooks/views/templates/admin/customer_signature.html.twig`:

```twig
{% extends '@Modules/demovieworderhooks/views/templates/admin/card.html.twig' %}

{% block card_title %}
  {{ 'Signature'|trans }}
{% endblock %}

{% block card_body %}
  <div class="col-lg">
    <div class="display-4 text-center">
      {{ signature.gender }} {{ signature.firstName }} {{ signature.lastName }}
    </div>
    <div class="text-center">
      <img src="{{ signature.filename }}" alt="">
    </div>
  </div>
{% endblock %}
```

Lets add several methods to `DemoViewOrderHooks` class.
`getModuleTemplatePath` - get's the path of the templates folder.

```php
    /**
     * Get path to this module's template directory
     */
    private function getModuleTemplatePath(): string
    {
        return "@Modules/$this->name/views/templates/admin/";
    }
```

For each registered hook, you must create a non-static public method, 
starting with the “hook” keyword followed by the name of the hook you want to use 
(starting with either “display” or “action”). In our case: `hookDisplayBackOfficeOrderActions`
For more information see: https://devdocs.prestashop.com/1.7/modules/concepts/hooks/#execution

```php
    /**
     * Displays customer's signature.
     */
    public function hookDisplayBackOfficeOrderActions(array $params)
    {
        /** @var SignatureRepository $signatureRepository */
        $signatureRepository = $this->get('prestashop.module.demovieworderhooks.repository.signature_repository');

        /** @var SignaturePresenter $signaturePresenter */
        $signaturePresenter = $this->get('prestashop.module.demovieworderhooks.presenter.signature_presenter');

        $signature = $signatureRepository->findOneBy(['orderId' => $params['id_order']]);

        if (!$signature) {
            return '';
        }

        return $this->render($this->getModuleTemplatePath() . 'customer_signature.html.twig', [
            'signature' => $signaturePresenter->present($signature, (int) $this->context->language->id),
        ]);
    }
```

## Result

After completing the steps above the result should be:

 - Signature card:

 {{< figure src="../img/view-order-hooks-demo/view-order-demo-result.png" title="Signature card" >}}

Feel free to experiment with other Order view page hooks!
