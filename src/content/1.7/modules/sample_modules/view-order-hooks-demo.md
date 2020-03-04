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
 
{{% notice note %}}
We use this module to demonstrate how to use these concepts/components because they bring some additional value
but this is not mandatory. These are just some of the "how to" examples. Would recommend to focus on your
project needs and don't hesitate to write a note to PrestaShop Core developers if we could do it better!
{{% /notice %}}

## Prerequisites

- To be familiar with basic module creation.
- To be familiar how Composer autoloads classes (https://devdocs.prestashop.com/1.7/modules/concepts/composer/)

### Register hooks

On module installation the following hooks can be registered:

 - `displayBackOfficeOrderActions` - displayed between Customer and Messages cards in the Order page
 - `displayAdminOrderTabContent` - for adding tab content to Order page
 - `displayAdminOrderTabLink` - for adding tab links for tab content
 - `displayAdminOrderMain` - for adding Order main information
 - `displayAdminOrderSide` - for adding Order side information
 - `displayAdminOrder` - displayed at the bottom of the Order page
 - `displayAdminOrderTop` - displayed at the top of the Order page
 
These hooks are visualized in the picture below:

 {{< figure src="../img/view-order-hooks-demo/ps-view-order-page-hooks.jpg" title="Order page hooks locations" >}}

Let's start from the first one - `displayBackOfficeOrderActions` and create a demo for it.

Let's create `composer.json` in the root of the module to autoload classes with the namespaces
 (PrestaShop\\Module\\DemoViewOrderHooks\\) we define from the `src` folder.
 (https://getcomposer.org/doc/01-basic-usage.md#autoloading). Using composer PSR-4 `autoload` helps
  us autoload classes without the need to use `require_once __DIR__.'/vendor/autoload.php';` .
 
{{% notice note %}}
Even though using `autoload` block in `composer.json` helps us to autoload classes from the specified
folder `src` with the namespace `PrestaShop\\Module\\DemoViewOrderHooks\\` we might have some 
autoloading issues if we use our classes in our module main file `demovieworderhooks.php` because
it is out of `src` scope. For example, we might define a constant if one of our class and use it in
`demovieworderhooks.php` when we will get error: `the class is not defined`. Then a solution can be 
including `require_once __DIR__.'/vendor/autoload.php';` before the main module class 
`demovieworderhooks.php` is defined.
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
      }
    }
}
```

Then run `composer install` on the terminal. 
Also run `composer dump-autoload` to re-generate the vendor/autoload.php file.
If files were autoloaded successfully you should see something similar to 
`PrestaShop\\Module\\DemoViewOrderHooks\\' => array($baseDir . '/src')` in 
`modules/demovieworderhooks/vendor/composer/autoload_psr4.php` generated.

### Create User Signature card below the Customer card.

Let's use SOLID principles (https://en.wikipedia.org/wiki/SOLID) to make code more understandable, 
flexible and maintainable. For example let's create `InstallerInterface` to represent 
`Interface segregation principle` (https://en.wikipedia.org/wiki/Interface_segregation_principle).
This principle splits interfaces that are very large into smaller and more specific ones so that
 clients will only have to know about the methods that are of interest to them.
 
 ```php
<?php
/**
 * 2007-2020 PrestaShop
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License 3.0 (AFL-3.0).
 * It is also available through the world-wide-web at this URL: https://opensource.org/licenses/AFL-3.0
 */

declare(strict_types=1);

namespace PrestaShop\Module\DemoViewOrderHooks\Install;

interface InstallerInterface
{
    public function install(): void;
}
```

Let's create `FixturesInstaller` class to represent `Single responsibility principle`
 (https://en.wikipedia.org/wiki/Single_responsibility_principle) responsible only for module 
 fixtures data inserted to the database. 

```php
<?php
/**
 * 2007-2020 PrestaShop
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License 3.0 (AFL-3.0).
 * It is also available through the world-wide-web at this URL: https://opensource.org/licenses/AFL-3.0
 */

declare(strict_types=1);

namespace PrestaShop\Module\DemoViewOrderHooks\Install;

use Configuration;
use Country;
use DateTime;
use Db;
use joshtronic\LoremIpsum;
use Order;

/**
 * Installs data fixtures for the module.
 */
class FixturesInstaller implements InstallerInterface
{
    /**
     * @var LoremIpsum
     */
    private $loremIpsum;

    /**
     * @var Db
     */
    private $db;

    public function __construct(Db $db)
    {
        $this->loremIpsum = new LoremIpsum();
        $this->db = $db;
    }

    public function install(): void
    {
        $orderIds = Order::getOrdersIdByDate('2000-01-01', '2100-01-01');

        foreach ($orderIds as $orderId) {
            $this->insertSignature($orderId);
            $this->insertOrderReview($orderId);

            $order = new Order($orderId);

            if ($order->hasBeenShipped()) {
                $this->insertPackageLocations($orderId);
            }
        }
    }

    private function insertOrderReview(int $orderId): void
    {
        $this->db->insert('order_review', [
            'id_order' => $orderId,
            'score' => rand(0, 3),
            'comment' => $this->loremIpsum->sentence(),
        ]);
    }

    private function insertSignature(int $orderId): void
    {
        $this->db->insert('signature', [
            'id_order' => $orderId,
            'filename' => 'john_doe.png',
        ]);
    }

    private function insertPackageLocations(int $orderId): void
    {
        $numberOfLocations = rand(4, 6);
        $countries = Country::getCountries(Configuration::get('PS_LANG_DEFAULT'));
        $numberOfCountries = count($countries);

        for ($i = 0; $i < $numberOfLocations; $i++) {
            // Last location will not have a date
            $date = $i === 0 ? null : (new DateTime('-'.$i.' days'))->format('Y-m-d H:i:s');

            $this->db->insert('package_location', [
                'id_order' => $orderId,
                'location' => $countries[rand(0, $numberOfCountries - 1)]['name'],
                'position' => $numberOfLocations - $i,
                'date' => $date,
            ]);
        }
    }
}
```
Lets create `Installer` class inside `/demovieworderhooks/src/Install` folder structure. 
It is responsible only for module installation (hook registration, database creation, 
population database data). When it comes to database creation we use PrestaShop `DbCore` class 
functions because doctrine is not fully supported for modules installation at 1.7.7.0 release
 (https://devdocs.prestashop.com/1.7/modules/concepts/doctrine/#creating-the-database).
```php
<?php
/**
 * 2007-2020 PrestaShop
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License 3.0 (AFL-3.0).
 * It is also available through the world-wide-web at this URL: https://opensource.org/licenses/AFL-3.0
 */

declare(strict_types=1);

namespace PrestaShop\Module\DemoViewOrderHooks\Install;

use Db;
use Module;

/**
 * Class responsible for modifications needed during installation/uninstallation of the module.
 */
class Installer implements InstallerInterface
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
            'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'signature` (
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
            'DROP TABLE IF EXISTS `'._DB_PREFIX_.'signature`',
            'DROP TABLE IF EXISTS `'._DB_PREFIX_.'order_review`',
            'DROP TABLE IF EXISTS `'._DB_PREFIX_.'package_location`',
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

Let's put our signature picture, `john_doe.png` inside `/signatures/` folder.

 {{< figure src="../img/view-order-hooks-demo/john_doe.png" title="Signature" >}}

Let's create Order Repository and data structures for interacting with Orders data:

Data Transfer Object `Order.php` in `src/DTO`

```php
<?php
declare(strict_types=1);

namespace PrestaShop\Module\DemoViewOrderHooks\DTO;

use DateTimeImmutable;

final class Order
{
    /**
     * @var int
     */
    private $orderId;

    /**
     * @var string
     */
    private $reference;

    /**
     * @var int
     */
    private $orderStateId;

    /**
     * @var DateTimeImmutable
     */
    private $orderDate;

    public function __construct(int $orderId, string $reference, int $orderStateId, DateTimeImmutable $orderDate)
    {
        $this->orderId = $orderId;
        $this->reference = $reference;
        $this->orderStateId = $orderStateId;
        $this->orderDate = $orderDate;
    }

    public function getOrderId(): int
    {
        return $this->orderId;
    }

    public function getReference(): string
    {
        return $this->reference;
    }
}
```

Orders collection `Orders.php` in `src/Collection`:

```php
<?php
declare(strict_types=1);

namespace PrestaShop\Module\DemoViewOrderHooks\Collection;

use PrestaShop\Module\DemoViewOrderHooks\DTO\Order;
use PrestaShop\PrestaShop\Core\Data\AbstractTypedCollection;

final class Orders extends AbstractTypedCollection
{
    /**
     * {@inheritdoc}
     */
    protected function getType()
    {
        return Order::class;
    }
}
```

`OrderRepository` in `src\Repository`:

```php
<?php
declare(strict_types=1);

namespace PrestaShop\Module\DemoViewOrderHooks\Repository;

use DateTimeImmutable;
use Db;
use Order as PrestaShopOrder;
use PrestaShop\Module\DemoViewOrderHooks\Collection\Orders;
use PrestaShop\Module\DemoViewOrderHooks\DTO\Order;

class OrderRepository
{
    /**
     * @var Db
     */
    private $db;

    public function __construct()
    {
        $this->db = Db::getInstance();
    }

    /**
     * Get all orders that a customer has placed.
     */
    public function getCustomerOrders(int $customerId, array $excludeOrderIds = []): Orders
    {
        $orders = PrestaShopOrder::getCustomerOrders($customerId);
        $ordersCollection = new Orders();

        foreach ($orders as $order) {
            if (in_array($order['id_order'], $excludeOrderIds)) {
                continue;
            }

            $ordersCollection->add(new Order(
                (int) $order['id_order'],
                $order['reference'],
                (int) $order['current_state'],
                new DateTimeImmutable($order['date_add'])
            ));
        }

        return $ordersCollection;
    }
}

```

Let's create `SignaturePresenter` class responsible for returning order customer data  
in `src/Presenter/`:

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

Then lets create services configuration for the above classes in `config/services.yml`. 
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

  prestashop.module.demovieworderhooks.presenter.signature_presenter:
    class: PrestaShop\Module\DemoViewOrderHooks\Presenter\SignaturePresenter
    arguments:
      - '@=service("prestashop.module.demovieworderhooks").getPathUri() ~ parameter("signatureImgDirectory")'

```

Let's create a twig templates in `modules/demovieworderhooks/views/templates/admin/`:

card.html.twig

```twig
{% trans_default_domain 'Module.Demovieworderhooks.Admin' %}

<div class="card">
  <div class="card-header">
    <h3 class="card-header-title">
      {% block card_title %}
      {% endblock %}
    </h3>
  </div>

  <div class="card-body">
    {% block card_body %}
    {% endblock %}
  </div>
</div>
```

`customer_signature.html.twig` extending `card.html.twig`

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

Render a twig template method:

```php
    /**
     * Render a twig template.
     */
    private function render(string $template, array $params = []): string
    {
        /** @var Twig_Environment $twig */
        $twig = $this->get('twig');

        return $twig->render($template, $params);
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

Feel free to experiment with other Order view page hooks! You can find demo implementation of these hooks in PrestaShop `example-modules` repository:
https://github.com/PrestaShop/example-modules/tree/master/demovieworderhooks
