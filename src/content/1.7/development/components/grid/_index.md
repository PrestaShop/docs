---
title: Grid component
menuTitle: Grid
chapter: true
weight: 20
---

# The Grid component
{{< minver v="1.7.5" title="true" >}}

The Grid component specifies for a Grid (Table + action + bulk actions) the definition of columns, the query builder used to retrieve data and how the search filters must be used to retrieve the data displayed.

Not only this gives a consistent representation of the data from a "PHP/Back" point of view, but the component also provides a minimalist Twig/Javascript layer for the rendering based on a typed View model.

Because every PrestaShop developer must be able to alter the grid we provide in the core, the following units can be changed:

* The **Columns** (their position, add new ones or update/remove existing ones)
* The **Query Builder** (which is used to retrieve the data according to the Search criteria if any)

Let's see what we need to do to migrate a CRUD-based page, in step-by-step tutorial:

* The **Grid Definition**
* The **Grid Query Builder**
* The **Grid Data Factory**
* The **Grid Factory**

## Grid Definition

The Grid Definition stores the structural information about your Grid:

* The *Grid name* is the human readable and translatable name;
* The *Grid id* is a unique identifier that you can use to select the right grid in case you have multiple ones in a page with the same name;
* The *Grid Columns* (`ColumnCollection`) describes the backbone of the grid;
* The *Grid actions* (`ActionCollection`) describes the actions at the *grid* level, for exemple the "export" or "access to sql manager" actions;
* The *Row actions* (`RowActionCollection`) describes the actions at the *row* level, like a selector button to edit/access/delete an entry;
* The *Bulk actions* (`BulkActionCollection`) describes the actions at the *grid* level, for a bunch of selectable entries: a bulk delete/bulk edition for instance.

To create a Definition, you can rely on a Grid Definition Factory.

This factory must implement the `DefinitionFactoryInterface` interface which has only one method: `getDefinition()`.
The component provides an abstract class (`AbstractGridDefinitionFactory`), with access to the translator and already implements re-usable functions for you:

```php
use PrestaShop\PrestaShop\Core\Grid\Definition\Factory\AbstractGridDefinitionFactory;
use PrestaShop\PrestaShop\Core\Grid\Action\GridActionCollection;
use PrestaShop\PrestaShop\Core\Grid\Column\ColumnCollection;
use Symfony\Component\Form\Extension\Core\Type\TextType;

final class FooGridDefinitionFactory extends AbstractGridDefinitionFactory
{
    // required
    protected function getId()
    {
        return 'foo';
    }

    protected function getName()
    {
        return $this->trans('Foo', [], 'Admin.Advparameters.Feature');
    }

    // required, empty collection by default
    protected function getColumns()
    {
        return (new ColumnCollection())
            ->add((new DataColumn('id_foo'))
                ->setName($this->trans('Foo', [], 'Global.Actions'))
                ->setOptions([
                    'field' => 'foo',
                ])
            )
            ...
        ;
    }

    // required, empty collection by default
    protected function getFilters()
    {
        return (new FilterCollection())
            ->add((new Filter('foo', TextType::class))
                ->setTypeOptions([
                    'required' => false,
                ])
                ->setAssociatedColumn('foo')
            )
        ;
    }

    // empty collection by default
    protected function getGridActions()
    {
        return (new GridActionCollection())
            ->add((new SimpleGridAction('bazAction'))
                ->setName($this->trans('Baz action', [], 'Admin.Advparameters.Feature'))
                ->setIcon('bar')
            )
        ;
    }
}
```

## Grid Query Builder

The Grid Query Builder is responsible of building the right query to retrieve the data according to the Grid definition and Search filters that come from the User request.

This is the related interface:

```php
interface DoctrineQueryBuilderInterface
{
    /**
     * Get query that searches grid rows
     *
     * @param SearchCriteriaInterface|null $searchCriteria
     *
     * @return QueryBuilder
     */
    public function getSearchQueryBuilder(SearchCriteriaInterface $searchCriteria = null);
    /**
     * Get query that counts grid rows
     *
     * @param SearchCriteriaInterface|null $searchCriteria
     *
     * @return QueryBuilder
     */
    public function getCountQueryBuilder(SearchCriteriaInterface $searchCriteria = null);

```

Once the Query Builder is defined, we have all we need to create the grid, as Prestashop already provides base classes for the other components.

## Grid Data Factory

As you can imagine, the responsibility of the Grid Data Factory is to retrieve the Grid data, based on the Grid Definition and the Grid Query Builder.

The only method available of `GridDataFactoryInterface` is `getData` which returns an instance of `GridData`.
A GridData is an **immutable object** used to store and retrieve the grid data, so if you want to alter this data, you must do it in Grid Data Factory *before* the GridData creation.

You can rely on the implementation provided in the component `GridDataFactory` or create your own if you have specific needs. 

## Grid Factory

Finally the Grid Factory is the final top layer above the other ones, it retrieves the Grid Data thanks to the Grid Data Factory and builds a form to manage filters based on the information in the Grid Definition. Its interface `GridFactoryInterface` implements one method `getGrid`.

Just like the Grid Data Factory you can either implement your own interface or use the provided `GridFactory` provided in Prestashop core code.

## Grid services declaration

Only 4 services must be declared: the *Grid Definition Factory*, the *Grid Query Builder*, the *Grid Data Factory*, and the *Grid Factory*.

```yaml
# In src/PrestaShopBundle/Resources/config/services/core/grid.yml
parameters:
  prestashop.core.grid.data.factory.doctrine_grid_data_factory: PrestaShop\PrestaShop\Core\Grid\Data\Factory\DoctrineGridDataFactory

services:
  _defaults:
    public: true

  # Grid Definition Factory
  prestashop.core.grid.definition.factory.foo:
    class: 'PrestaShop\PrestaShop\Core\Grid\Definition\Factory\FooGridDefinitionFactory'
    parent: 'prestashop.core.grid.definition.factory.abstract_grid_definition'
    public: true

  # Grid Query Builder
  prestashop.core.grid.query_builder.foo:
    class: 'PrestaShop\PrestaShop\Core\Grid\Query\FooQueryBuilder'
    parent: 'prestashop.core.grid.definition.factory.abstract_grid_definition'
    public: true

  # Grid Data Factory
  prestashop.core.grid.data_factory.foo:
    class: '%prestashop.core.grid.data.factory.doctrine_grid_data_factory%'
    arguments:
      - '@prestashop.core.admin.foo.query_builder'
      - '@prestashop.core.hook.dispatcher'
      - 'foo'

  # Grid Factory
  prestashop.core.grid.factory.foo:
    class: 'PrestaShop\PrestaShop\Core\Grid\Factory\GridFactory'
    arguments:
      - '@prestashop.core.grid.definition.factory.foo'
      - '@prestashop.core.grid.data_factory.foo'
      - '@prestashop.core.grid.filter.form_factory'
      - '@prestashop.core.hook.dispatcher'

```

## Use in the Controller

In Back Office controllers, you can use the Grid Factory to create a Grid and return it:

```php
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use PrestaShop\PrestaShop\Core\Grid\Search\SearchCriteriaInterface;

class FooController extends FrameworkBundleAdminController
{
    /**
     * @return Response
     */
    public function indexAction(Request $request)
    {
        $gridFooFactory = $this->get('prestashop.core.grid.factory.foo');
        $searchCriteria = $this->buildSearchCriteriaFromRequest($request);
        $grid = $gridFooFactory->getGrid($filters);
        
        return $this->render('@Foo/Bar/pageWithGrid.html.twig', [
            'grid' => $this->presentGrid($grid),
        ]);
    }
    
    /**
     * @param Request $request
     *
     * @return SearchCriteriaInterface
     */
    private function buildSearchCriteriaFromRequest(Request $request)
    {
        //Here build your search criteria
        
        return $searchCriteria;
    }
}
```

And in the related template:

```twig
    {# In file "@Foo/Bar/pageWithGrid.html.twig" #}
    {{ include('@PrestaShop/Admin/Common/Grid/grid_panel.html.twig', {'grid': grid }) }}
```

## About the Filters class

If you don't want to implement the parsing of each request to build your `SearchCriteria` Prestashop core code provides a request resolver which can automatically build a `Filters` object for your controller.

```php
use PrestaShop\PrestaShop\Core\Search\Filters;

final class FooFilters extends Filters
{
    /**
     * {@inheritdoc}
     */
    public static function getDefaults()
    {
        return [
            'limit' => 10,
            'offset' => 0,
            'orderBy' => 'id_foo',
            'sortOrder' => 'asc',
            'filters' => [],
        ];
    }
}
```

This simplify your controller which can now look like this:

```php
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class FooController extends FrameworkBundleAdminController
{
    /**
     * @return Response
     */
    public function indexAction(FooFilters $filters)
    {
        $gridFooFactory = $this->get('prestashop.core.grid.factory.foo');
        $grid = $gridFooFactory->getGrid($filters);
        
        return $this->render('@Foo/Bar/pageWithGrid.html.twig', [
            'grid' => $this->presentGrid($grid),
        ]);
    }
}
```

## Grid component rendering using Twig templating engine 

This component is built with 2 main principles in mind:

* the data is never aware of its representation, this means we rely on Presenters to present the data to the view;
* we can alter every part of the Grid component, but everything is frozen once it's build;

### Managing the data and the UI

This means the Grid Data doesn't contains anything like *width* or *class* or *color* because we give the responsibility of Twig to allow such customization of this kind.

> Even if the component is powerful and flexible enough to accept it, you shouldn't try to configure Grid to pass this kind of data related to the view.

In the other hand, the view is totaly customizable: you can override every available template for a column, a column header or a column filter. You can also override a template for a specific grid or globally, you can change the view only according to special business conditions too.

The right and only way to change the data is using hooks and module overrides won't work here while the UI can be changed using templating and Javascript.

To sum up this strict separation between the Data management and his UI representation, this is how you could imagine the creation of a Grid:

{{< figure src="../img/grid_workflow.png" title="Grid Workflow" >}}

> Note a XML file for this schema is importable in services like [draw.io](https://draw.io) is [available](/schemas/1.7/grid_workflow.xml).


### Once built, everything is frozen

You will notice that almost every object build is *final* and have no setters: we avoid every chance to break the Grid component once the build of the Grid have been done and validated.

But we got you covered, you can alter almost everything *before* the Grid is presented to the view thanks to the available hooks:


{{< figure src="../img/grid_workflow_hooks.png" title="Grid Workflow" >}}

> Note a XML file for this schema is importable in services like [draw.io](https://draw.io) is [available](/schemas/1.7/grid_workflow_hooks.xml).

## Learn more

* [Column Types reference][columns-reference]

[columns-reference]: {{< ref "/1.7/development/components/grid/columns-reference/_index.md" >}}
