---
title: How to work with the Search Form
menuTitle: Search Form
weight: 3
---

# How to work with the Search Form

The grid component allows to filter its content, to manage the filtering you will need to define the following elements:

- `GridDefinition::getFilters`
- `Filters` class
- Controllers:
  - Search action
  - List action
  - Reset filter action

## Add Filters into GridDefinition

You should use `AbstractGridDefinitionFactory` as a parent class, and define a const `GRID_ID` which will be used as a key to persist the `Filters`.

```php
<?php
final class ManufacturerGridDefinitionFactory extends AbstractGridDefinitionFactory
{
    const GRID_ID = 'manufacturer';

    /**
     * {@inheritdoc}
     */
    protected function getId()
    {
        return self::GRID_ID;
    }

    ...
    /**
    * {@inheritdoc}
    */
    protected function getFilters()
    {
        return (new FilterCollection())
            ->add((new Filter('id_manufacturer', TextType::class))
                ->setTypeOptions([
                    'required' => false,
                    'attr' => [
                        'placeholder' => $this->trans('Search ID', [], 'Admin.Actions'),
                    ],
                ])
                ->setAssociatedColumn('id_manufacturer')
            )
            ->add((new Filter('name', TextType::class))
                ->setTypeOptions([
                    'required' => false,
                    'attr' => [
                        'placeholder' => $this->trans('Search name', [], 'Admin.Actions'),
                    ],
                ])
                ->setAssociatedColumn('name')
            )
            ->add((new Filter('active', YesAndNoChoiceType::class))
                ->setAssociatedColumn('active')
            )
            ->add((new Filter('actions', SearchAndResetType::class))
                ->setAssociatedColumn('actions')
                ->setTypeOptions([
                    'reset_route' => 'admin_common_reset_search_by_filter_id',
                    'reset_route_params' => [
                        'filterId' => self::GRID_ID,
                    ],
                    'redirect_route' => 'admin_manufacturers_index',
                ])
            )
        ;
    }
    ...
}
```

### The filters types

The filters collection allows you to define all the available filters (which will match your grid columns). You can define a specific type depending on the column.
You can basically use any Symfony form type (including your custom ones) and PrestaShop provides a few [filter types]({{< ref "/8/development/components/grid/filter-types-reference/" >}}) that might be useful to you.

### Filterable grid definition

This can be made even easier by using the `AbstractFilterableGridDefinitionFactory`. This will allow you use the [common search controller](#common-search-controller).

```php
<?php
final class AddressGridDefinitionFactory extends AbstractFilterableGridDefinitionFactory
{
    const GRID_ID = 'address';

    /**
     * {@inheritdoc}
     */
    protected function getId()
    {
        return self::GRID_ID;
    }
    ...
}
```

## Filters class

You need to define a `Filters` class linked to your Grid, it will allow you to define the default filters and sorting values.
It will also make your list action simpler as PrestaShop provides a parameter resolver responsible of automatically create and fill a `Filters` object.

```php
<?php
use PrestaShop\PrestaShop\Core\Grid\Definition\Factory\ManufacturerGridDefinitionFactory;
use PrestaShop\PrestaShop\Core\Search\Filters;

/**
 * Class ManufacturerFilters is responsible for providing filter values for manufacturer grid.
 */
final class ManufacturerFilters extends Filters
{
    /** @var string */
    protected $filterId = ManufacturerGridDefinitionFactory::GRID_ID;

    /**
     * {@inheritdoc}
     */
    public static function getDefaults()
    {
        return [
            'limit' => 10,
            'offset' => 0,
            'orderBy' => 'name',
            'sortOrder' => 'asc',
            'filters' => [],
        ];
    }
}
```

## Controller actions

The Grid filtering workflow is divided into three actions:

- search action: it parses the filters from the POST request, then redirects to the list action
- list action: it parses the filters from GET request, persists them into database and finally renders the grid
- reset action: it cleans the persisted filters and reset to the default ones

{{% notice info %}}
In this tutorial we assume the search and list actions have the same url, thus we don't need to specify the search route in the form action. Search manages the **POST** request and list the **GET** request.
{{% /notice %}}

{{% notice note %}}
Most of the time you will use the default form factory when you [configure your grid factory]({{< ref "/8/development/components/grid/_index.md#configuring-grid-factory" >}}) which is usually enough. However if you need to change the form action route or perform any other advanced management you might need to create your [custom form factory]({{< ref "/8/development/components/grid/tutorials/work-with-search-form/custom-form-factory" >}}).
{{% /notice %}}

### Search action

#### Custom search controller

You can use the `ResponseBuilder` service to easily create the search response, it only needs four arguments as input:

- the definition factory
- the request
- the filter ID
- the list route for redirection

```php
<?php
use PrestaShop\PrestaShop\Core\Grid\Definition\Factory\ManufacturerGridDefinitionFactory;
use PrestaShopBundle\Service\Grid\ResponseBuilder;
use PrestaShopBundle\Security\Annotation\AdminSecurity;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;

class ManufacturerController extends FrameworkBundleAdminController
{
    ...
    /**
     * Provides filters functionality
     *
     * @AdminSecurity("is_granted('read', request.get('_legacy_controller'))")
     *
     * @param Request $request
     *
     * @return RedirectResponse
     */
    public function searchAction(Request $request)
    {
        /** @var ResponseBuilder $responseBuilder */
        $responseBuilder = $this->get('prestashop.bundle.grid.response_builder');

        return $responseBuilder->buildSearchResponse(
            $this->get('prestashop.core.grid.definition.factory.manufacturer'),
            $request,
            ManufacturerGridDefinitionFactory::GRID_ID,
            'admin_manufacturers_index'
        );
    }
    ...
}
```

```yaml
# your-module/config/routes.yml
admin_manufacturers_search:
  path: /
  methods: POST
  defaults:
    _controller: 'PrestaShopBundle:Admin/Sell/Catalog/Manufacturer:search'
    _legacy_controller: AdminManufacturers
    _legacy_link: AdminManufacturers:submitFiltermanufacturer
```

#### Common search controller

As this controller is almost always the same, we introduced a common controller. So all you need to do is define the routing:

```yaml
# your-module/config/routes.yml
admin_addresses_search:
  path: /
  methods: [POST]
  defaults:
    _controller: PrestaShopBundle:Admin\Common:searchGrid
    gridDefinitionFactoryServiceId: prestashop.core.grid.definition.factory.address
    redirectRoute: admin_addresses_index
    _legacy_controller: AdminAddresses
    _legacy_link: AdminAddresses:submitFilteraddress
```

### List action

Thanks to the internal parameter resolver you can directly use your `Filters` class as an argument in the controller. It then automatically:

- parses the potential parameters in the query and fills them into the `Filters` argument
- matches thanks to the class the filters from the database and fetch them if present
- persists the filters in the database

```php
<?php
class ManufacturerController extends FrameworkBundleAdminController
{
    ...
    /**
     * Show manufacturers listing page.
     *
     * @AdminSecurity("is_granted('read', request.get('_legacy_controller'))")
     *
     * @param Request $request
     * @param ManufacturerFilters $manufacturerFilters
     *
     * @return Response
     */
    public function indexAction(
        Request $request,
        ManufacturerFilters $manufacturerFilters
    ) {
        $manufacturerGridFactory = $this->get('prestashop.core.grid.grid_factory.manufacturer');
        $manufacturerGrid = $manufacturerGridFactory->getGrid($manufacturerFilters);

        return $this->render('@PrestaShop/Admin/Sell/Catalog/Manufacturer/index.html.twig', [
            'enableSidebar' => true,
            'help_link' => $this->generateSidebarLink($request->attributes->get('_legacy_controller')),
            'manufacturerGrid' => $this->presentGrid($manufacturerGrid),
        ]);
    }
    ...
}
```

### Reset action

This action resets the persisted filters and your grid filtering/sorting. This action is the same for nearly all grids so PrestaShop provides a common controller to manage it, and you actually already set it via the grid definition.

It is defined in the [`SearchAndResetType` options]({{< ref "/8/development/components/grid/filter-types-reference#searchandresettype" >}}), it uses `admin_common_reset_search_by_filter_id` and only needs the filter id to identify the filters to clear, and a redirection route.

```php
<?php
    ...
            ->add((new Filter('actions', SearchAndResetType::class))
                ->setAssociatedColumn('actions')
                ->setTypeOptions([
                    'reset_route' => 'admin_common_reset_search_by_filter_id',
                    'reset_route_params' => [
                        'filterId' => self::GRID_ID,
                    ],
                    'redirect_route' => 'admin_manufacturers_index',
                ])
            )
    ...
```
