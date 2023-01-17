---
title: The Grid component
menuTitle: Grid
---

# The Grid component

## Introduction

The Grid component provides tools that allow you to build, manage and display your data tables. The most important parts 
of Grid component are:

* _Grid definition_ - defines structural information about a grid.
* _Grid data_ - stores data for a grid.
* _Search criteria_ - stores sorting, pagination and filters data for a grid.

## Grid definition

This is the most fundamental part of the Grid component. A Grid definition stores structural information about your Grid
that defines:

* **Id** - unique id for Grid identification. It is used to dispatch hooks and identify Grid in other parts of the application.
* **Name** - human readable name, it is recommended to make it translatable.
* **Columns** - definition of columns that your Grid table has.
* **Filters** - definition of filters that are supported by Grid.
* **Grid actions** - actions that apply to a whole grid. It is common to have _"Export"_, _"Import"_, _"Show SQL query"_ and similar grid actions.
* **Bulk actions** - actions that can be applied to _multiple_ records in the Grid. It is common to have _"Delete selected"_, _"Enable selected"_ and similar bulk actions.

### Creating Grid Definition

You don't have to create the Grid Definition by yourself but instead rely on a `PrestaShop\PrestaShop\Core\Grid\Definition\Factory\GridDefinitionFactoryInterface`.
PrestaShop already provides you with an abstract factory implementation `PrestaShop\PrestaShop\Core\Grid\Definition\Factory\AbstractGridDefinitionFactory`
that you can use to create Grid definitions.

{{% notice note %}}
When creating a Grid definition it is _recommended_ to use `PrestaShop\PrestaShop\Core\Grid\Definition\Factory\AbstractGridDefinitionFactory`
as it allows you to define your structure, but takes care of the definition creation.
{{% /notice %}}

To create a new grid definition, we will use `AbstractGridDefinitionFactory`.

```php
<?php
namespace PrestaShop\PrestaShop\Core\Grid\Definition\Factory;

use PrestaShop\PrestaShop\Core\Grid\Definition\Factory\AbstractGridDefinitionFactory;
use PrestaShop\PrestaShop\Core\Grid\Column\ColumnCollection;
use PrestaShop\PrestaShop\Core\Grid\Column\Type\DataColumn;

final class ProductGridDefinitionFactory extends AbstractGridDefinitionFactory
{
    protected function getId()
    {
        return 'products';
    }

    protected function getName()
    {
        return $this->trans('Products', [], 'Admin.Advparameters.Feature');
    }

    protected function getColumns()
    {
        return (new ColumnCollection())
            ->add((new DataColumn('id_product'))
                ->setName($this->trans('ID', [], 'Admin.Global'))
                ->setOptions([
                    'field' => 'id_product',
                ])
            )
            ->add((new DataColumn('reference'))
                ->setName($this->trans('Reference', [], 'Admin.Advparameters.Feature'))
                ->setOptions([
                    'field' => 'reference',
                ])
            )
            ->add((new DataColumn('name'))
                ->setName($this->trans('Name', [], 'Admin.Advparameters.Feature'))
                ->setOptions([
                    'field' => 'name',
                ])
            )
        ;
    }
}
```

We have just created a basic Grid Definition factory in which we defined our Grid's id `products`, translatable
name `Products` and 3 data columns.

{{% notice note %}}
It is _recommended_ to keep your name translatable. To make that easy,
`AbstractGridDefinitionFactory` provides access to the translator via the `trans()` method.
{{% /notice %}}

Finally, register your Grid definition factory as a service.

```yaml
prestashop.core.grid.definition.factory.product_grid_definition_factory:
    class: 'PrestaShop\PrestaShop\Core\Grid\Definition\Factory\ProductGridDefinitionFactory'
    parent: 'prestashop.core.grid.definition.factory.abstract_grid_definition'
    public: true
```

Most of the time you won't be creating Grid Definitions by yourself but delegating this task to other services,
but in case you need to create a Grid Definition by hand, here's how you can do that.

```php
<?php
$productsGridDefinitionFactory = $container->get('prestashop.core.grid.definition.factory.product_grid_definition_factory');
$productsGridDefinition = $productsGridDefinitionFactory->getDefinition();

// you can access all information that was defined
$productsGridDefinition->getColumns(); // collection of defined columns
$productsGridDefinition->getName(); // "Products"
$productsGridDefinition->getId(); // "products"
```

## Search Criteria

In the Grid component, Search Criteria is used for Grid's data sorting, paginating & filtering. Search Criteria
can be loaded from the database, URL query or anywhere else. 

{{% notice info %}}
The Grid component itself does not manage Search Criteria but instead it provides an interface for it.
In PrestaShop, the [Filters component](#) is used to resolve Search Criteria for a Grid.
{{% /notice %}}

{{% notice note %}}
Search Criteria is immutable. This means that once a Search Criteria object is created it cannot be changed.
{{% /notice %}}

### Creating Search Criteria

Even though most of the time Search Criteria will be created using the [Filters component]({{ relref "/8/development/components/grid/tutorials/work-with-search-form/" }}), you can still
create it manually. Grid provides a simple implementation for it.

```php
<?php
use PrestaShop\PrestaShop\Core\Grid\Search\SearchCriteria;

$filters = [
    'id_product' => 4,
    'name' => 'mug',
];

$searchCriteria = new SearchCriteria(
    $filters,
    'id_product',
    'asc',
    0,
    10
);

$searchCriteria->getFilters();  // $filters array
$searchCriteria->getOrderBy();  // "id_product"
$searchCriteria->getOrderWay(); // "asc"
$searchCriteria->getOffset();   // 0
$searchCriteria->getLimit();    // 10
```

When creating Search Criteria you can skip some or all of its data. If you set both `orderWay` and `orderBy` to `null`
it will disable sorting. If you set both `offset` and `limit` to `null` it will disable pagination.

```php
<?php
use PrestaShop\PrestaShop\Core\Grid\Search\SearchCriteria;

// sorting, pagination and filtering are disabled with this search criteria
$emptySearchCriteria = new SearchCriteria();

// only pagination is set
// that means sorting (and filters as it's an empty array) will be disabled for search criteria
$emptySortingSearchCriteria = new SearchCriteria(
    [],
    null,
    null,
    2,
    10
);
```

## Grid Data

The final part of the Grid component is data. Grid Data is stored in `PrestaShop\PrestaShop\Core\Grid\Data\GridData`. 

### Creating Grid Data

The Grid component does not create Grid Data directly but instead relies on `PrestaShop\PrestaShop\Core\Grid\Data\Factory\GridDataFactoryInterface`.
PrestaShop provides you with a `DoctrineGridDataFactory` implementation out of the box which supports retrieving data from a
MySQL database using Doctrine. However, if you need to load data from a REST API, Elasticsearch or any other data store,
you can implement your own Grid Data factory.

We will be using `DoctrineGridDataFactory` to create data for our Grid. When using `DoctrineGridDataFactory` you have
to implement `DoctrineQueryBuilderInterface` which will be used by the data factory to build Doctrine queries.

{{% notice info %}}
When implementing `DoctrineQueryBuilderInterface` it is recommended to use `PrestaShop\PrestaShop\Core\Grid\Query\AbstractDoctrineQueryBuilder`
as it provides access to the Doctrine `Connection` and database tables prefix.
{{% /notice %}}

```php
<?php
use PrestaShop\PrestaShop\Core\Grid\Query\AbstractDoctrineQueryBuilder;
use Doctrine\DBAL\Connection;
use PrestaShop\PrestaShop\Core\Grid\Search\SearchCriteriaInterface;

final class ProductQueryBuilder extends AbstractDoctrineQueryBuilder
{
    /**
     * @var int
     */
    private $contextLangId;

    /**
     * @var int
     */
    private $contextShopId;

    /**
     * @param Connection $connection
     * @param string $dbPrefix
     * @param int $contextLangId
     * @param int $contextShopId
     */
    public function __construct(Connection $connection, $dbPrefix, $contextLangId, $contextShopId)
    {
        parent::__construct($connection, $dbPrefix);

        $this->contextLangId = $contextLangId;
        $this->contextShopId = $contextShopId;
    }

    // Get Search query builder returns a QueryBuilder that is used to fetch filtered, sorted and paginated data from the database.
    // This query builder is also used to get the SQL query that was executed.
    public function getSearchQueryBuilder(SearchCriteriaInterface $searchCriteria)
    {
        $qb = $this->getBaseQuery();
        $qb->select('p.id_product, p.reference, pl.name')
            ->orderBy(
                $searchCriteria->getOrderBy(),
                $searchCriteria->getOrderWay()
            )
            ->setFirstResult($searchCriteria->getOffset())
            ->setMaxResults($searchCriteria->getLimit());
    
        foreach ($searchCriteria->getFilters() as $filterName => $filterValue) {
            if ('id_product' === $filterName) {
                $qb->andWhere("p.id_product = :$filterName");
                $qb->setParameter($filterName, $filterValue);

                continue;
            }

            $qb->andWhere("$filterName LIKE :$filterName");
            $qb->setParameter($filterName, '%'.$filterValue.'%');
        }

        return $qb;
    }
    
    // Get Count query builder that is used to get the total count of all records (products)
    public function getCountQueryBuilder(SearchCriteriaInterface $searchCriteria)
    {
        $qb = $this->getBaseQuery();
        $qb->select('COUNT(p.id_product)');

        return $qb;
    }
    
    // Base query can be used for both Search and Count query builders
    private function getBaseQuery()
    {
        return $this->connection
            ->createQueryBuilder()
            ->from($this->dbPrefix.'product', 'p')
            ->leftJoin(
                'p',
                $this->dbPrefix.'product_lang',
                'pl',
                'p.id_product = pl.id_product AND pl.id_lang = :context_lang_id AND pl.id_shop = :context_shop_id'
            )
            ->setParameter('context_lang_id', $this->contextLangId)
            ->setParameter('context_shop_id', $this->contextShopId)
        ;
    }
}
```

Once the Query builder is done, the last step is to register it as a service and configure your `DoctrineGridDataFactory` to use it.

```yaml
# Register ProductQueryBuilder
prestashop.core.grid.query.product_query_builder:
    class: 'PrestaShop\PrestaShop\Core\Grid\Query\ProductQueryBuilder'
    parent: 'prestashop.core.grid.abstract_query_builder'
    arguments:
        - "@=service('prestashop.adapter.legacy.context').getContext().language.id"
        - "@=service('prestashop.adapter.legacy.context').getContext().shop.id"
    public: true
    
# Configure our Grid Data factory to use the query builder that we registered above
prestashop.core.grid.data.factory.product_data_factory:
    class: 'PrestaShop\PrestaShop\Core\Grid\Data\Factory\DoctrineGridDataFactory'
    arguments:
        - '@prestashop.core.grid.query.product_query_builder' # service id of our query builder
        - '@prestashop.core.hook.dispatcher' # every doctrine query builder needs the hook dispatcher
        - '@prestashop.core.grid.query.doctrine_query_parser' # parser to get the raw SQL query
        - 'products' # this should match your grid id, in our case it's "products"
```

That's it! Now we can use our Grid Data factory together with Search Criteria to get sorted, paginated and 
filtered data for our Grid.

```php
<?php
$searchCriteria = ...

/** PrestaShop\PrestaShop\Core\Grid\Data\Factory\GridDataFactoryInterface $productGridDataFactory */
$productGridDataFactory = $container->get('prestashop.core.grid.data.factory.product_data_factory');
$productGridData = $productDataFactory->getData($searchCriteria);

$productGridData->getRecords(); // returns RecordCollection that contains products data
$productGridData->getRecordsTotal(); // returns the total count of products
$productGridData->getQuery(); // get the last executed query that was used to get RecordCollection
```

## Working with Grid

We already know how to create and use Grid Definitions and Grid Data factories. Now it's time to combine those services
to create our Grid!

### Configuring Grid factory

As always, you should not create Grid by hand, PrestaShop already comes with `PrestaShop\PrestaShop\Core\Grid\GridFactory`
whose primary job is to create a Grid.

{{% notice note %}}
It is recommended to use the `PrestaShop\PrestaShop\Core\Grid\GridFactory` to create Grids although you may need to create
your own Grid factory in some rare cases.
{{% /notice %}}

Let's configure a `GridFactory` with our Grid Definition and Grid Data factory.

```yaml
# Configure Grid factory to use services we have implemented
prestashop.core.grid.product_grid_factory:
    class: 'PrestaShop\PrestaShop\Core\Grid\GridFactory'
    arguments:
        - '@prestashop.core.grid.definition.factory.product_grid_definition_factory' # our definition factory
        - '@prestashop.core.grid.data.factory.product_data_factory'              # our data factory
        - '@prestashop.core.grid.filter.form_factory'                            # core service needed by grid factory
        - '@prestashop.core.hook.dispatcher'                                     # core service needed by grid factory
```

And we are done! Let's see how to use it and render it in the page.

### Rendering Grid

In Back Office controllers, you can use the Grid Factory to create a Grid and render it.

```php
<?php
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends FrameworkBundleAdminController
{
    /**
     * @return Response
     */
    public function indexAction()
    {
        $searchCriteria = ...
    
        $productGridFactory = $this->get('prestashop.core.grid.product_grid_factory');
        $productGrid = $productGridFactory->getGrid($searchCriteria);
        
        return $this->render('@PrestaShop/Admin/Product/products.html.twig', [
            // $this->presentGrid() is a helper method provided by FrameworkBundleAdminController
            'productsGrid' => $this->presentGrid($productGrid),
        ]);
    }
}
```

To see the Grid in your page you have to include its template, which is provided by PrestaShop.

```twig
{# @PrestaShop/Admin/Product/products.html.twig #}

{% include '@PrestaShop/Admin/Common/Grid/grid_panel.html.twig' with {'grid': productsGrid} %}
```

It is possible to include the provided template and modify some parts of it, or you can create your own template to render the Grid. 

## Workflows

### Main workflow

{{< figure src="../img/grid_workflow.svg" title="Main workflow of the Grid Component" >}}

{{% notice note %}}
You can update this schema using the [source XML file](/8/schemas/grid_workflow.xml) importable in services like [draw.io](https://draw.io).
{{% /notice %}}

### Hooks

{{< figure src="../img/grid_workflow_hooks.svg" title="Available hooks when creating a Grid" >}}

{{% notice note %}}
You can update this schema using the [source XML file](/8/schemas/grid_workflow_hooks.xml) importable in services like [draw.io](https://draw.io).
{{% /notice %}}

## Learn more

{{% children %}}
