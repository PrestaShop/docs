---
title: Signature card 
weight: 10
---

# Signature card 

## Signature card (displayBackOfficeOrderActions hook)

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

Lets create custom repository `SignatureRepository` class (https://symfony.com/doc/3.3/doctrine/repository.html):
Symfony Repository classes help to interact with the database by providing frequently used functions to
get the data (for example filtered data by a certain criteria).

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

Let's create Order Repository and data structures for interacting with Orders data.
Data Transfer Object (https://en.wikipedia.org/wiki/Data_transfer_object)
`Order.php` in `src/DTO` to carry data between processes. The main benefit is that it reduces
the amount of data that needs to be sent inside application and encapsulates parameters for
method calls (This can be useful if a method takes more than 4 or 5 parameters.). Also it is more 
convenient than using associative array where you need to remember it's indexes to get the 
certain values (no autocomplete is provided).

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
Then lets use Symfony Dependency Injection 
(https://www.freecodecamp.org/news/a-quick-intro-to-dependency-injection-what-it-is-and-when-to-use-it-7578c84fa88f/).
and create services configuration for the above 
classes in `config/services.yml`. For more information: 
https://devdocs.prestashop.com/1.7/modules/concepts/services/#symfony-services
The intent behind dependency injection is to achieve Separation of Concerns of construction and use of objects. 
This can increase readability and code reuse, reduce dependencies, lead to more testable code.
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
