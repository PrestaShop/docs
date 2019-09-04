---
title: Use hooks on modern pages
weight: 3
---

# Use hooks on modern pages

You know you can already customize your PrestaShop store thanks to many hooks: the good news is that you can still use hooks like you did in the earlier versions of PrestaShop in modern pages.

Starting from PrestaShop 1.7.3, you can access the modern Services Container into your modules and so on access powerful and customizable features available in Symfony:

* [Twig](https://twig.symfony.com/), the most popular templating engine;
* [Swiftmailer](https://swiftmailer.symfony.com/), a feature-rich mailer;
* [Doctrine ORM](https://www.doctrine-project.org/projects/orm.html) and [Doctrine DBAL](https://www.doctrine-project.org/projects/dbal.html) to manage your database;
* [Filesystem](https://symfony.com/doc/3.3/components/filesystem.html) and [Finder](https://symfony.com/doc/3.3/components/finder.html) libraries to manage all filesystem operations;
* [Monolog](https://seldaek.github.io/monolog/) for every logging operations;
* [Serializer](https://symfony.com/doc/3.3/components/serializer.html) library for whom who need to manipulate Json and Xml formats...

Of course, you also have access to every service used by the Core of PrestaShop. This means that you can rely on all services defined in `PrestaShopBundle/config/` folder, except from the ones declared in `adapter` folder: they will be removed at some point.

> If you don't know what is a service, take a look at the Symfony documentation about the [services container](https://symfony.com/doc/3.3/service_container.html).

## Better modules on modern pages

Let's say your customer want an xml export button directly available from list of products on Product Catalog page: such a common need regarding the number of related modules in the Store.

How hard it can be to develop a module that provide this button? Well, it's not! Let's do this feature together.

### First step: select the right hook

Accessing the Product Catalog page in *debug mode* we can access the list of available hooks in the debug toolbar:

* moduleRoutes
* displayBackOfficeHeader
* displayBackOfficeTop
* actionAdminControllerSetMedia
* displayDashboardToolbarTopMenu
* displayDashboardTop
* hookdisplayDashboardToolbarIcons
* displayBackOfficeFooter
* displayAdminNavBarBeforeEnd
* displayAdminAfterHeader
* actionDispatcherBefore
* actionDispatcherAfter

As we need to act on Dashboard but after the header, in the icons toolbar (with others export options) `hookdisplayDashboardToolbarIcons` sounds like the hook we are looking for.

### Second step: create your own product serializer

At this point, this is basic PHP code we need to produce. We need to retrieve the list of products from database, and serialize them into XML and dump into a file sent to the user.

#### Using Doctrine (DBAL) to retrieve data 

Even if using old way to retrieve data is still valid (``Product::getProducts`` or through the webservice), we'd like to introduce a best practice here: using a repository and get ride of the Object model. This has a lot of advantages, you rely on database instead of model and you'll have better performances and control on your data.

```php
<?php
namespace PrestaShop\Module\Foo\Repository;

use Doctrine\DBAL\Connection;

/**
 * Class ProductRepository.
 */
class ProductRepository
{
    /**
     * @var Connection the Database connection.
     */
    private $connection;

    /**
     * @var string the Database prefix.
     */
    private $databasePrefix;

    public function __construct(Connection $connection, $databasePrefix)
    {
        $this->connection = $connection;
        $this->databasePrefix = $databasePrefix;
    }

    /**
     * @param int $langId the lang id
     * @return array the list of products
     */
    public function findAllbyLangId(int $langId)
    {
        $prefix = $this->databasePrefix;
        $productTable = "${prefix}product";
        $productLangTable = "${prefix}product_lang";

        $query = "SELECT p.* FROM ${productTable} p LEFT JOIN ${productLangTable} pl ON (p.`id_product` = pl.`id_product`) WHERE pl.`id_lang` = :langId";
        $statement = $this->connection->prepare($query);
        $statement->bindValue('langId', $langId);
        $statement->execute();

        return $statement->fetchAll();
    }
}
```

And declare your repository as a service. By convention, the declaration the name of the service is `your_society.module.your_module_name.your_service_name`, here it could be `mysociety.module.foo.product_repository`:

```yaml
services:
  _defaults:
    public: true

  <your_society>.module.<your_module_name>.<your_service_name>:
    class: PrestaShop\Module\Foo\Repository\ProductRepository
    arguments:
      $connection: '@doctrine.dbal.default_connection'
      $dbPrefix: '%database_prefix%'
```

You can now use it in your module (and everywhere in PrestaShop modern pages!):

### Third step: create and register the Hook

Create a [new module](http://doc.prestashop.com/display/PS17/Creating+a+first+module) called `foo` and register the hook. You should end up with this kind of code in your module:

```php
<?php

if (!defined('_PS_VERSION_')) {
    exit;
}

if (file_exists(__DIR__ . '/vendor/autoload.php')) {
    require_once __DIR__ . '/vendor/autoload.php';
}

use PrestaShop\Module\Foo\Repository\ProductRepository;
use PrestaShop\PrestaShop\Adapter\SymfonyContainer;

class Foo extends Module
{
    public function __construct()
    {
        $this->name = '<module_name>';
        $this->tab = 'front_office_features';
        $this->version = '1.0.0';
        $this->author = '<your_name>';
        $this->need_instance = 0;
        $this->ps_versions_compliancy = [
            'min' => '1.7',
            'max' => _PS_VERSION_
        ];
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('My foo module.');
        $this->description = $this->l('This is a short description of my foo module.');

        $this->confirmUninstall = $this->l('Are you sure you want to uninstall?');
    }

    /**
     * Module installation.
     *
     * @return bool Success of the installation
     */
    public function install()
    {
        return parent::install() && $this->registerHook('displayDashboardToolbarIcons');
    }

    /**
     * Module uninstallation.
     *
     * @return bool Success of the uninstallation
     */
    public function uninstall()
    {
        if (!parent::uninstall()) {
            return false;
        }

        return true;
    }

    /**
     * Get the list of products for a specific lang.
     */
    public function hookDisplayDashboardToolbarIcons($hookParams)
    {
        if ($this->isSymfonyContext() && $hookParams['route'] === 'admin_product_catalog') {
            $products = $this->getRepository()->findAllByLangId(1);
            //The getRepository method is defined below
            dump($products);
        }
    }

    /**
     * @return ProductRepository|null
     */
    private function getRepository()
    {
        if (null === $this->repository && $this->isSymfonyContext()) {
            try {
                $this->repository = $this->get('<your_service_name>');
            } catch (\Exception $e) {
                //Module is not installed so its services are not loaded
                $this->repository = new ProductRepository(
                    $this->get('doctrine.dbal.default_connection'),
                    SymfonyContainer::getInstance()->getParameter('database_prefix')
                );
            }
        }

        return $this->repository;
    }

}
```

> 'route' property is only available for modern pages to find the route related to a page look at the debug toolbar.

In Product Catalog Page you should see the list of Products in debug toolbar in "Dump" section:

![Get products in Dump section](https://i.imgur.com/un7NcIL.png)

#### Using the Symfony components to create an XML export file

Now we retrieve the product list from our module and that we are able to display the information into the back office,
we could already create our XML file with raw PHP. Let's see how we can do it using the components provided by Symfony "out of box".

```php
// foo.php

/* ... */
/**
 * Creates an XML file with list of products in "upload" folder.
 *
 * @return bool Success of the installation
 */
public function hookDisplayDashboardToolbarIcons($hookParams)
{
    if ($this->isSymfonyContext() && $hookParams['route'] === 'admin_product_catalog') {
        $products = $this->get('product_repository')->findAllByLangId(1);

        $productsXml = $this->get('serializer')->serialize(
            $products,
            'xml',
            [
                'xml_root_node_name' => 'products',
                'xml_format_output' => true,
            ]
        );
        $this->get('filesystem')->dumpFile(_PS_UPLOAD_DIR_.'products.xml', $productsXml);
    }
}
```

{{% notice info %}}
Note: the `serializer` service is not enabled in PrestaShop 1.7.3 but will be enabled in 1.7.4. If you really want to enable it in 1.7.3,uncomment the following configuration line in your `services.yml` file of your Shop.
{{% /notice %}}


```yaml
# app/config/services.yml
services:

# Enables the serializer

framework:
    serializer: { enable_annotations: true }
```

#### Render the icon using Twig templating engine

Now we have serialized our products, it's time to render an Icon link with the file to download!

We could (of course) use Smarty to render a template, but it's a chance to discover Twig which is also available as a service. First, let's refactor and finalize our hook call:

```php
/**
 * Make products export in XML.
 *
 * @param $params array
 */
public function hookDisplayDashboardToolbarIcons($params)
{
    if ($this->isSymfonyContext() && $params['route'] === 'admin_product_catalog') {
        $products = $this->getProducts(1);
        $productsXml = $this->serializeProducts($products);
        $filepath = _PS_ROOT_DIR_.'/products.xml';

        $this->writeFile($productsXml, $filepath);

        return $this->get('twig')->render('@PrestaShop/Foo/download_link.twig',[
            'filepath' => _PS_BASE_URL_.'/products.xml',
        ]);
    }
}
```

{{% notice info %}}
We have extracted business logic into specific functions.
{{% /notice %}}

And now, the template:

```twig
{# in views/PrestaShop/Foo/download_link.twig #}
<a id="desc-product-export" class="list-toolbar-btn" href="{{ filepath }}" download>
  <b data-toggle="pstooltip" class="label-tooltip" data-original-title="{{ "Export XML"|trans({}, 'Module.Foo' }}" data-html="true" data-placement="top">
    <i class="material-icons">cloud_upload</i>
  </b>
</a>
```

{{% notice info %}}
We have used a key for translation, making our own translations available in back office when using Twig.
{{% /notice %}}

![Export XML action button](https://i.imgur.com/5HExjcC.png)

And "voila!", the module could be of course improved with so many features, adding filters on export for instance, using the `request` hook parameter and updating the Product repository.
