---
title: Doctrine
weight: 5
---

# Doctrine
{{< minver v="1.7.6" title="true" >}}

From the 1.7.6 version of PrestaShop we integrate support of Doctrine services and entities for modules. Doctrine is
a powerful ORM allowing you to manage your database data via objects. It offers an abstract layer allowing you to perform
insert/update actions via a simple `$entity->setData('update')` call. But you can also create your own repositories to fetch
specific data via left join, add conditions and so on ...

Doctrine is the default ORM integrated with Symfony which is why we added it for modules in legacy context. If you want
more details about Doctrine and its features you can check [their documentation](https://www.doctrine-project.org/projects/doctrine-orm/en/2.7/index.html)
or the [Symfony documentation](https://symfony.com/doc/4.4/doctrine.html). PrestaShop is currently using Doctrine version 2.7.

## Module integration

We meant to make the Doctrine integration the simplest possible, which is why we favored the [annotation mapping](https://symfony.com/doc/4.4/doctrine.html#add-mapping-information)
which allows you to specify your database structure directly in your entity classes. We also used a simple convention, you simply
need to put your entities in the `src/Entity` folder of your module and PrestaShop will automatically scan them for all **installed**
modules.

To work correctly you will need to define a namespace for your entity classes using Composer, you can find more details
about namespace setup in [Setup composer][setup-composer] page.

[setup-composer]: {{< ref "/8/modules/concepts/services/_index.md#setup-composer" >}}

## Define an Entity

Here is a simple example of a `ProductComment` entity:

```php
<?php
// modules/yourmodule/src/Entity/ProductComment.php
namespace YourCompany\YourModule\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table()
 * @ORM\Entity()
 */
class ProductComment
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\Column(name="id_product_comment", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="id_product", type="integer")
     */
    private $productId;

    /**
     * @var string
     *
     * @ORM\Column(name="customer_name", type="string", length=64)
     */
    private $customerName;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=64)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text")
     */
    private $content;

    /**
     * @var int
     *
     * @ORM\Column(name="grade", type="integer")
     */
    private $grade;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * @param int $productId
     *
     * @return ProductComment
     */
    public function setProductId($productId)
    {
        $this->productId = $productId;

        return $this;
    }

    /**
     * @return string
     */
    public function getCustomerName()
    {
        return $this->customerName;
    }

    /**
     * @param string $customerName
     *
     * @return ProductComment
     */
    public function setCustomerName($customerName)
    {
        $this->customerName = $customerName;

        return $this;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     *
     * @return ProductComment
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $content
     *
     * @return ProductComment
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * @return int
     */
    public function getGrade()
    {
        return $this->grade;
    }

    /**
     * @param int $grade
     *
     * @return ProductComment
     */
    public function setGrade($grade)
    {
        $this->grade = $grade;

        return $this;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'id_product' => $this->getProductId(),
            'id_product_comment' => $this->getId(),
            'title' => $this->getTitle(),
            'content' => $this->getContent(),
            'customer_name' => $this->getCustomerName(),
            'grade' => $this->getGrade(),
        ];
    }
}
```

## Creating the database

Although Doctrine includes a few tools including a command to help you build your database we **strongly warn about NOT
using them**, they automatically include lots of foreign keys which are **not compatible** with the PrestaShop database
structure.

So you will need to create your database tables on your module installation the way you used to, with SQL script for example.
Doctrine uses a convention to match the database tables and your entities, it converts your camel case class name into a snake
case table name. And on top of that PrestaShop automatically adds the database prefix you defined. So assuming you used `ps_` as
a prefix the matching will be:

| Class name         | Table name              |
| ------------------ |:----------------------- |
| ProductComment     | ps_product_comment      |
| ProductCommentList | ps_product_comment_list |


{{% notice note %}}
Although you must not use doctrine tools to affect your database directly, they can be handful to help you generate you SQL files.
You can use this command `./bin/console doctrine:schema:update --dump-sql` which will output (but not execute) the SQL queries required
to update your database.

You can use this as a base to create your own SQL scripts, but remember **not to modify** PrestaShop core database structure and to
clean the foreign key statements (unless you are **ABSOLUTELY** sure of what you are doing).
{{% /notice %}}

## Using Doctrine

### Saving an Entity

Now that your Entity is managed and your database structure is up to date you can start creating/updating data in your database.
Here is an example in a legacy controller:

```php
<?php
// modules/yourmodule/controllers/front/PostComment.php
use YourCompany\YourModule\Entity\ProductComment;
use Doctrine\ORM\EntityManagerInterface;

class YourModulePostCommentModuleFrontController extends ModuleFrontController
{
    public function display()
    {
        $id_product = (int) Tools::getValue('id_product');
        $comment_title = Tools::getValue('comment_title');
        $comment_content = Tools::getValue('comment_content');
        $customer_name = Tools::getValue('customer_name');
        $grade = Tools::getValue('grade');

        /** @var EntityManagerInterface $entityManager */
        $entityManager = $this->container->get('doctrine.orm.entity_manager');

        //Create product comment
        $productComment = new ProductComment();
        $productComment
            ->setProductId($id_product)
            ->setTitle($comment_title)
            ->setContent($comment_content)
            ->setCustomerName($customer_name)
            ->setGrade($grade)
        ;
        //This call adds the entity to the EntityManager scope (now it knows the entity exists)
        $entityManager->persist($productComment);

        //This call validates all previous modification (modified/persisted entities)
        //This is when the database queries are performed
        $entityManager->flush();

        $this->ajaxRender(json_encode([
            'success' => true,
            'product_comment' => $productComment->toArray(),
        ]));
    }
}
```

### Fetching your Entities

An Entity repository is the service that will allow you to fetch your entities from the database. Doctrine already offers
some generic repository, and what's more? You don't even need to create it yourself you simply get it via the entity manager.

```php
<?php
// modules/yourmodule/controllers/front/ListComments.php
use YourCompany\YourModule\Entity\ProductComment;
use Doctrine\ORM\EntityManagerInterface;

class YourModuleListCommentsModuleFrontController extends ModuleFrontController
{
    public function display()
    {
        $id_product = (int) Tools::getValue('id_product');

        /** @var EntityManagerInterface $entityManager */
        $entityManager = $this->container->get('doctrine.orm.entity_manager');
        $productCommentRepository = $entityManager->getRepository(ProductComment::class);

        //The repository has automatic methods available, it is able to creating query conditions
        //based on the name of the function you used
        /*
        ** The repository has automatic methods available, it is able to creating query conditions
        ** based on the name of the function you used. An equivalent way to make this call could be:
        **
        ** $productComments = $productCommentRepository->findBy(['productId' => $id_product]);
        */
        $productComments = $productCommentRepository->findByProductId($id_product);

        $serializedComments = [];
        foreach ($productComments as $productComment) {
            $serializedComments[] = $productComment->toArray();
        }

        $this->ajaxRender(json_encode($serializedComments));
    }
}
```

If you need more information about how to use an entity repository you can read the [Symfony documentation](https://symfony.com/doc/4.4/doctrine.html#fetching-objects-from-the-database)
where you will also find examples for more advanced queries (with more conditions, joins, ...).

## Example

If you want a more advanced example you can have a look at the [ProductComments module](https://github.com/PrestaShop/productcomments/),
additionally to what you read here it also defines custom repositories which use the Doctrine query builder to fetch array
data directly (without using Entities). As well as some examples of [associations](https://symfony.com/doc/4.4/doctrine/associations.html)
between Entities.

You can also have a look at our dedicated [Example module](https://github.com/PrestaShop/example-modules/tree/master/demodoctrine) which contains a full example, including form handling, multi languages, repositories, ...
