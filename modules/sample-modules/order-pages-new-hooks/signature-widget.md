---
title: Signature card 
weight: 2
---

# Signature card 

## displayAdminOrderSide hook

We use this hook to display a scanned customer signature.

Let's create custom repository `OrderSignatureRepository` class inside `demovieworderhooks/src/Repository` folder.
Symfony Repository classes (https://symfony.com/doc/4.4/doctrine/repository.html) help to interact with the database by providing frequently used functions
like `findOneBy` to get the data (for example filtered data by a certain criteria - `orderId` 
field from `OrderSignature` entity).

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

namespace PrestaShop\Module\DemoViewOrderHooks\Repository;

use Doctrine\ORM\EntityRepository;

class OrderSignatureRepository extends EntityRepository
{
    /**
     * @param int $orderId
     *
     * @return object|null
     */
    public function findOneByOrderId(int $orderId)
    {
        return $this->findOneBy(['orderId' => $orderId]);
    }
}
```

{{% notice note %}}
It is important that custom repository name represent the database table name. In this case we have `order_signature`
table created and the repository starts with the same wording `OrderSignatureRepository`.
{{% /notice %}}

Let's create `OrderSignature` entity class inside `demovieworderhooks/src/Entity` folder and use 
[Doctrine Object Relational Mapping (ORM) annotations]({{< relref "/8/modules/concepts/doctrine/#define-an-entity" >}}).
Also we map this entity with the repository with 
`repositoryClass="PrestaShop\Module\DemoViewOrderHooks\Repository\OrderSignatureRepository"`.
This mapping allows to use functions of `SignatureRepository` instead of only the `EntityRepository`.

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

namespace PrestaShop\Module\DemoViewOrderHooks\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="PrestaShop\Module\DemoViewOrderHooks\Repository\OrderSignatureRepository")
 */
class OrderSignature
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
     * @return self
     */
    public function setId(int $id): self
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
     * @return self
     */
    public function setFilename(string $filename): self
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

Let's put our signature picture, `john_doe.png` inside `demovieworderhooks/signatures/` folder.

 {{< figure src="../../img/view-order-hooks-demo/john_doe.png" title="Signature" >}}

Let's create Order Repository and data structures for interacting with Orders data.
Data Transfer Object (https://en.wikipedia.org/wiki/Data_transfer_object)
`Order.php` in `src/DTO` to carry data between processes. The main benefit is that it reduces
the amount of data that needs to be sent inside application and encapsulates parameters for
method calls (This can be useful if a method takes more than 4 or 5 parameters.). Also it is more 
convenient than using associative array where you need to remember it's indexes to get the 
certain values (no autocomplete is provided).

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

    public function getOrderStateId(): int
    {
        return $this->orderStateId;
    }

    public function getOrderDate(): DateTimeImmutable
    {
        return $this->orderDate;
    }
}
```

`OrderCollection.php` in `src/Collection`:

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

namespace PrestaShop\Module\DemoViewOrderHooks\Collection;

use PrestaShop\Module\DemoViewOrderHooks\DTO\Order;
use PrestaShop\PrestaShop\Core\Data\AbstractTypedCollection;

final class OrderCollection extends AbstractTypedCollection
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

namespace PrestaShop\Module\DemoViewOrderHooks\Repository;

use DateTimeImmutable;
use Db;
use Order as PrestaShopOrder;
use PrestaShop\Module\DemoViewOrderHooks\Collection\OrderCollection;
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
    public function getCustomerOrders(int $customerId, array $excludeOrderIds = []): OrderCollection
    {
        $orders = PrestaShopOrder::getCustomerOrders($customerId);
        $ordersCollection = new OrderCollection();

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

{{% notice note %}}
Unlike the previous `OrderSignatureRepository` this repository uses legacy PrestaShop classes, 
it performs the request using the `Db` class. We have to do this because core objects
 from PrestaShop do not use Doctrine entities, so we can't use a Doctrine repository to manage them.
{{% /notice %}}

Let's create `OrderSignaturePresenter` class responsible for returning order customer data  
in `src/Presenter/`:

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

namespace PrestaShop\Module\DemoViewOrderHooks\Presenter;

use Gender;
use Order;
use PrestaShop\Module\DemoViewOrderHooks\Entity\OrderSignature;

class OrderSignaturePresenter
{
    /**
     * @var string
     */
    private $signatureImgDir;

    public function __construct(string $signatureImgDir)
    {
        $this->signatureImgDir = $signatureImgDir;
    }

    public function present(OrderSignature $signature, int $languageId): array
    {
        $order = new Order($signature->getOrderId());
        $customer = $order->getCustomer();
        $gender = new Gender($customer->id_gender, $languageId);

        return [
            'firstName' => $customer->firstname,
            'lastName' => $customer->lastname,
            'gender' => $gender->name,
            'imagePath' => $this->signatureImgDir.$signature->getFilename()
        ];
    }
}
```

Then let's use Symfony Dependency Injection 
(https://www.freecodecamp.org/news/a-quick-intro-to-dependency-injection-what-it-is-and-when-to-use-it-7578c84fa88f/).
and [create services configuration]({{< relref "/8/modules/concepts/services/#symfony-services" >}}) for the above 
classes in `demovieworderhooks/config/services.yml`.
The intention behind dependency injection is to achieve Separation of Concerns of construction and use of objects. 
This can increase readability and code reuse, reduce dependencies, lead to more testable code.
It also reduces memory consumption as services are, by default, created once and shared 
in the whole project.
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

  prestashop.module.demovieworderhooks.repository.order_signature_repository:
    class: PrestaShop\Module\DemoViewOrderHooks\Repository\OrderSignatureRepository
    factory: ['@doctrine.orm.default_entity_manager', getRepository]
    arguments:
      - PrestaShop\Module\DemoViewOrderHooks\Entity\OrderSignature

  prestashop.module.demovieworderhooks.presenter.order_signature_presenter:
    class: PrestaShop\Module\DemoViewOrderHooks\Presenter\OrderSignaturePresenter
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
      <img src="{{ signature.imagePath }}" alt="">
    </div>
  </div>
{% endblock %}
```

Let's add several methods to `DemoViewOrderHooks` class.
`getModuleTemplatePath` - get the path of the templates folder.

```php
<?php
    /**
     * Get path to this module's template directory
     */
    private function getModuleTemplatePath(): string
    {
        return sprintf('@Modules/%s/views/templates/admin/', $this->name);
    }
```

Render a twig template method:

```php
<?php
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
([read this article for more information]({{< relref "/8/modules/concepts/hooks#execution" >}})).
We add this code at the bottom of the main module class `demovieworderhooks.php`
and also add the missing `use` statements for new classes.

```php
<?php
    /**
     * Displays customer's signature.
     */
    public function hookDisplayAdminOrderSide(array $params)
    {
        /** @var OrderSignatureRepository $signatureRepository */
        $signatureRepository = $this->get(
            'prestashop.module.demovieworderhooks.repository.order_signature_repository'
        );

        /** @var OrderSignaturePresenter $signaturePresenter */
        $signaturePresenter = $this->get(
            'prestashop.module.demovieworderhooks.presenter.order_signature_presenter'
        );

        $signature = $signatureRepository->findOneByOrderId($params['id_order']);

        if (!$signature) {
            return '';
        }

        return $this->render($this->getModuleTemplatePath() . 'customer_signature.html.twig', [
            'signature' => $signaturePresenter->present($signature, (int) $this->context->language->id),
        ]);
    }
```

The full main module file with dependencies could be:

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

use PrestaShop\Module\DemoViewOrderHooks\Collection\OrderCollection;
use PrestaShop\Module\DemoViewOrderHooks\Install\InstallerFactory;
use PrestaShop\Module\DemoViewOrderHooks\Presenter\OrderSignaturePresenter;
use PrestaShop\Module\DemoViewOrderHooks\Repository\OrderRepository;
use PrestaShop\Module\DemoViewOrderHooks\Repository\OrderSignatureRepository;

if (!defined('_PS_VERSION_')) {
    exit;
}

// need it because InstallerFactory is not autoloaded during the install
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

    /**
     * Displays customer's signature.
     */
    public function hookDisplayBackOfficeOrderActions(array $params)
    {
        /** @var OrderSignatureRepository $signatureRepository */
        $signatureRepository = $this->get(
            'prestashop.module.demovieworderhooks.repository.order_signature_repository'
        );

        /** @var OrderSignaturePresenter $signaturePresenter */
        $signaturePresenter = $this->get(
            'prestashop.module.demovieworderhooks.presenter.order_signature_presenter'
        );

        $signature = $signatureRepository->findOneByOrderId($params['id_order']);

        if (!$signature) {
            return '';
        }

        return $this->render($this->getModuleTemplatePath() . 'customer_signature.html.twig', [
            'signature' => $signaturePresenter->present($signature, (int) $this->context->language->id),
        ]);
    }

    /**
     * Render a twig template.
     */
    private function render(string $template, array $params = []): string
    {
        /** @var Twig_Environment $twig */
        $twig = $this->get('twig');

        return $twig->render($template, $params);
    }

    /**
     * Get path to this module's template directory
     */
    private function getModuleTemplatePath(): string
    {
        return sprintf('@Modules/%s/views/templates/admin/', $this->name);
    }
}

```

Now we have all the code needed so let's go to the `Modules->Module Manager`. Find our module with search `demo`
and click the drop down near the `disable` button and select `reset` to reload the module with the newly 
described symfony services.

## Result

After completing the steps above the result should be visible inside the selected Order View page:

 - Signature card:

 {{< figure src="../../img/view-order-hooks-demo/view-order-demo-result.png" title="Signature card" >}}

Feel free to experiment with other Order view page hooks! You can find demo implementation of these hooks in 
PrestaShop `example-modules` repository: https://github.com/PrestaShop/example-modules/tree/master/demovieworderhooks
