---
title: How to handle multi lang Doctrine entity
menuTitle: Multi Lang Entity
weight: 1
---

# How to handle multi lang Doctrine entity
{{< minver v="1.7.7" title="true" >}}


## Multi lang fields in PrestaShop

A common use case in a CMS (Content Management System) is to handle translatable fields (or multi lang fields). In the legacy model of PrestaShop this is managed via an automatic mechanism and some configuration
in the ObjectModel, thus all translatable fields are stored in a dedicated table. Let's say you have a `quote` table then its translatable fields will be stored in a `quote_lang` each
row being an association between a `quote` row and a `lang` row (containing the languages installed on a PrestaShop shop).

We are going to use the same strategy here so that developers used to legacy objects will be able to understand the database structure easily as it follows the same architecture. It could
also be useful if you want to create a Doctrine entity compatible with a legacy ObjectModel, the structure will remain the same so you could access/edit the data with two different Data layers.

{{% notice note %}}
**What about doctrine plugins?**

There are several Doctrine plugins which allows to handle multi lang fields easily but for now no solution has been integrated in PrestaShop, so you will have to handle it "manually".
{{% /notice %}}

{{% notice note %}}
**Namespace and autoload**
The content of this documentation relies on **namespaces** which need to be defined in your module's autoload, we won't cover this part here if you need more information please read [how to setup composer in a module]({{< ref "8/modules/concepts/composer#setup-composer-in-a-module" >}})
{{% /notice %}}

{{% notice tip %}}
**Example module**
All the content of this documentation can be found in this [Doctrine example module](https://github.com/PrestaShop/example-modules/tree/master/demodoctrine) which covers all the content of this page and more:
- Multi lang entities
- Doctrine repositories
- Form handling
- Grid listing
- Symfony controller
- Symfony Services
{{% /notice %}}


## Define your entities

This example will be based on an example of quotes from various authors that need to be translated (so that it matches the user's language), these quotes can then be randomly be displayed on the Frontend.

### Quote entity

This is the base entity, it contains:
- the author name (no need to translate it)
- a collection of `QuoteLang` which contains all the translatable fields using a [OneToMany Bidirectional relation](https://www.doctrine-project.org/projects/doctrine-orm/en/2.7/reference/association-mapping.html#one-to-many-bidirectional)
- the dates of creation and updates (which rely on [Doctrine lifecycle callbacks](https://symfony.com/doc/4.4/doctrine/lifecycle_callbacks.html) to be filled automatically)
- the definition of the associated repository `PrestaShop\Module\DemoDoctrine\Repository\QuoteRepository`

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

namespace PrestaShop\Module\DemoDoctrine\Entity;

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="PrestaShop\Module\DemoDoctrine\Repository\QuoteRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Quote
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\Column(name="id_quote", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="author", type="string", length=255)
     */
    private $author;

    /**
     * @ORM\OneToMany(targetEntity="PrestaShop\Module\DemoDoctrine\Entity\QuoteLang", cascade={"persist", "remove"}, mappedBy="quote")
     */
    private $quoteLangs;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="date_add", type="datetime")
     */
    private $dateAdd;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="date_upd", type="datetime")
     */
    private $dateUpd;

    public function __construct()
    {
        $this->quoteLangs = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return ArrayCollection
     */
    public function getQuoteLangs(): ArrayCollection
    {
        return $this->quoteLangs;
    }

    /**
     * @param int $langId
     * @return QuoteLang|null
     */
    public function getQuoteLangByLangId(int $langId): ?QuoteLang
    {
        foreach ($this->quoteLangs as $quoteLang) {
            if ($langId === $quoteLang->getLang()->getId()) {
                return $quoteLang;
            }
        }

        return null;
    }

    /**
     * @param QuoteLang $quoteLang
     * @return $this
     */
    public function addQuoteLang(QuoteLang $quoteLang): self
    {
        $quoteLang->setQuote($this);
        $this->quoteLangs->add($quoteLang);

        return $this;
    }

    /**
     * @return string
     */
    public function getQuoteContent(): string
    {
        if ($this->quoteLangs->count() <= 0) {
            return '';
        }

        $quoteLang = $this->quoteLangs->first();

        return $quoteLang->getContent();
    }

    /**
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->author;
    }

    /**
     * @param string $author
     * @return $this
     */
    public function setAuthor(string $author): self
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Set dateAdd.
     *
     * @param DateTime $dateAdd
     *
     * @return $this
     */
    public function setDateAdd(DateTime $dateAdd): self
    {
        $this->dateAdd = $dateAdd;

        return $this;
    }

    /**
     * Get dateAdd.
     *
     * @return DateTime
     */
    public function getDateAdd(): DateTime
    {
        return $this->dateAdd;
    }

    /**
     * Set dateUpd.
     *
     * @param DateTime $dateUpd
     *
     * @return $this
     */
    public function setDateUpd(DateTime $dateUpd): self
    {
        $this->dateUpd = $dateUpd;

        return $this;
    }

    /**
     * Get dateUpd.
     *
     * @return DateTime
     */
    public function getDateUpd(): DateTime
    {
        return $this->dateUpd;
    }

    /**
     * Now we tell doctrine that before we persist or update we call the updatedTimestamps() function.
     *
     * @ORM\PrePersist
     * @ORM\PreUpdate
     */
    public function updatedTimestamps(): void
    {
        $this->setDateUpd(new DateTime());

        if ($this->getDateAdd() == null) {
            $this->setDateAdd(new DateTime());
        }
    }
}
```

### QuoteLang Entity

This entity contains:
- the translatable fields (in this example only the `content` of the Quote)
- the relationship with the parent quote (since it's bidirectional)
- and finally the relationship to the `Lang` entity (which is a Core entity from PrestaShop) this is what allows to associate the translation to the appropriate language

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

namespace PrestaShop\Module\DemoDoctrine\Entity;

use Doctrine\ORM\Mapping as ORM;
use PrestaShopBundle\Entity\Lang;

/**
 * @ORM\Table()
 * @ORM\Entity()
 */
class QuoteLang
{
    /**
     * @var Quote
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="PrestaShop\Module\DemoDoctrine\Entity\Quote", inversedBy="quoteLangs")
     * @ORM\JoinColumn(name="id_quote", referencedColumnName="id_quote", nullable=false)
     */
    private $quote;

    /**
     * @var Lang
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="PrestaShopBundle\Entity\Lang")
     * @ORM\JoinColumn(name="id_lang", referencedColumnName="id_lang", nullable=false, onDelete="CASCADE")
     */
    private $lang;

    /**
     * @var string
     * @ORM\Column(name="content", type="string", nullable=false)
     */
    private $content;

    /**
     * @return Quote
     */
    public function getQuote(): Quote
    {
        return $this->quote;
    }

    /**
     * @param Quote $quote
     * @return $this
     */
    public function setQuote(Quote $quote): self
    {
        $this->quote = $quote;

        return $this;
    }

    /**
     * @return Lang
     */
    public function getLang(): Lang
    {
        return $this->lang;
    }

    /**
     * @param Lang $lang
     * @return $this
     */
    public function setLang(Lang $lang): self
    {
        $this->lang = $lang;

        return $this;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $content
     * @return $this
     */
    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }
}
```

{{% notice tip %}}
**More about Doctrine relations**
If you need more info about how to setup and handle Doctrine relations, you can read the [Symfony documentation](https://symfony.com/doc/4.4/doctrine/associations.html) about it.
Focus on the `Annotation` sections since PrestaShop only handles this kind of configuration from modules' Entities. Here are some additional link that might be useful:
- [Doctrine Association mapping](https://www.doctrine-project.org/projects/doctrine-orm/en/2.7/reference/association-mapping.html)
- [Mastering Doctrine Relationships in Symfony 4 (video tutorial)](https://symfonycasts.com/screencast/symfony4-doctrine-relations)
{{% /notice %}}

## Create a translated entity

We will here display a more basic usage of Doctrine entity manager to create a translated entity:

```php
<?php
use PrestaShop\Module\DemoDoctrine\Entity\Quote;
use PrestaShop\Module\DemoDoctrine\Entity\QuoteLang;
use PrestaShopBundle\Entity\Lang;

// Getting the container depends if you are in a module or a controller but the rest of the code remains the same
$container = $this->getContainer();

// Get all languages vie the Lang repository
$langRepository = $container->get('prestashop.core.admin.lang.repository');
$languages = $langRepository->findAll();

// The entity manager will allow us to persist the Doctrine entities
$entityManager = $container->get('doctrine.orm.default_entity_manager');

// This are some fixtures data
$quotesData = [
    [
        'author' => 'Pierre Augustin Caron de Beaumarchais',
        'quotes' => [
          'en' => 'Proving that I am right would be admitting that I could be wrong.',
          'fr' => 'Prouver que j\'ai raison serait accorder que je puis avoir tort.',
        ]
    ],
    [
        'author' => 'Georges Bernanos',
        'quotes' => [
          'en' => 'There are no half-truths.',
          'fr' => 'Il n\'y a pas de verités moyennes.',
        ]
    ],
];

foreach ($quotesData as $quoteData) {
    $quote = new Quote();
    $quote->setAuthor($quoteData['author']);

    /** @var Lang $language */
    foreach ($languages as $language) {
        $quoteLang = new QuoteLang();
        $quoteLang->setLang($language);
        if (isset($quoteData['quotes'][$language->getIsoCode()])) {
            $quoteLang->setContent($quoteData['quotes'][$language->getIsoCode()]);
        } else {
            $quoteLang->setContent($quoteData['quotes']['en']);
        }
        $quote->addQuoteLang($quoteLang);
    }

    // Usually we should also persist the QuoteLang entities, but since we setup the cascading persist in the Quote
    // entity it is not necessary here, this action allows the entity manager to be aware of this new entity.
    $entityManager->persist($quote);
}

// Finally the entity manager applies ALL the creation in one go
$entityManager->flush();
```

## Fetching your multi lang entity

### Creating your repository service

It is more efficient to have a dedicated repository service to handle your entity, as mentioned when creating the `Quote` entity a repository `PrestaShop\Module\DemoDoctrine\Repository\QuoteRepository` has been configured and assigned to this entity, this allows the Doctrine entity manager to map them, but we can also define our own service so that we can get it via a service name.

```yml
services:
    prestashop.module.demodoctrine.repository.quote_repository:
        class: PrestaShop\Module\DemoDoctrine\Repository\QuoteRepository
        factory: ['@doctrine.orm.default_entity_manager', getRepository]
        arguments:
            - PrestaShop\Module\DemoDoctrine\Entity\Quote
```

This will allow to get the Quote repository easily:

```php
$quoteRepository = $this->getContainer()->get('prestashop.module.demodoctrine.repository.quote_repository');
```

### Using the repository to get entities relying on Doctrine query builder

Here we get the list of all `Quote` entities and their associated `QuoteLang`, it returns all the language by default but we also have a `$langId` parameter available if only one language is wanted.

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

namespace PrestaShop\Module\DemoDoctrine\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;

class QuoteRepository extends EntityRepository
{
    /**
     * @param int $langId
     *
     * @return array
     */
    public function getQuotes(int $langId = 0): array
    {
        /** @var QueryBuilder $qb */
        $qb = $this->createQueryBuilder('q')
            ->addSelect('q')
            ->addSelect('ql')
            ->leftJoin('q.quoteLangs', 'ql')
        ;

        if (0 !== $langId) {
            $qb
                ->andWhere('ql.lang = :langId')
                ->setParameter('langId', $langId)
            ;
        }

        return $qb->getQuery()->getResult();
    }
}
```
