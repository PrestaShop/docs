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

{{% version-tab versions="1.7.5" %}}
```php
final class EmailLogsDefinitionFactory extends AbstractGridDefinitionFactory {
    /**
     * @param string $resetActionUrl
     * @param string $redirectionUrl
     */
    public function __construct($resetActionUrl, $redirectionUrl)
    {
        $this->resetActionUrl = $resetActionUrl;
        $this->redirectionUrl = $redirectionUrl;
    }

    /**
     * {@inheritdoc}
     */
    protected function getId()
    {
        return 'email_logs';
    }

    ...
    /**
    * {@inheritdoc}
    */
    protected function getFilters()
    {
        return (new FilterCollection())
            ->add((new Filter('id_meta', TextType::class))
                ->setTypeOptions([
                    'required' => false,
                ])
                ->setAssociatedColumn('id_meta')
            )
            ->add((new Filter('page', TextType::class))
                ->setTypeOptions([
                    'required' => false,
                ])
                ->setAssociatedColumn('page')
            )
            ->add((new Filter('title', TextType::class))
                ->setTypeOptions([
                    'required' => false,
                ])
                ->setAssociatedColumn('title')
            )
            ->add((new Filter('url_rewrite', TextType::class))
                ->setTypeOptions([
                    'required' => false,
                ])
                ->setAssociatedColumn('url_rewrite')
            )
            ->add((new Filter('actions', SearchAndResetType::class))
                ->setTypeOptions([
                    'attr' => [
                        'data-url' => $this->resetActionUrl,
                        'data-redirect' => $this->redirectionUrl,
                    ],
                ])
                ->setAssociatedColumn('actions')
            )
        ;
    }
    ...
}
```

And here is the service definition associated

```yaml
    prestashop.core.grid.definition.factory.email_logs:
        class: 'PrestaShop\PrestaShop\Core\Grid\Definition\Factory\EmailLogsDefinitionFactory'
        parent: 'prestashop.core.grid.definition.factory.abstract_grid_definition'
        arguments:
            - "@=service('router').generate('admin_common_reset_search', {'controller': 'email', 'action': 'index'})"
            - "@=service('router').generate('admin_emails_index')"
        public: true
```
{{% /version-tab %}}

{{% version-tab versions="1.7.6" %}}
You should use `AbstractGridDefinitionFactory` as a parent class, and define a const `GRID_ID` which will be used as a key to persist the `Filters`.

```php
final class ManufacturerGridDefinitionFactory extends AbstractGridDefinitionFactory {
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
                ->setAssociatedColumn('actions')
            )
        ;
    }
    ...
}
```
{{% /version-tab %}}

{{% version-tab versions="1.7.7" %}}
You should use the `AbstractFilterableGridDefinitionFactory` as a parent class (which will allow you use the common search action), and define a const `GRID_ID` which will be used as a key to persist the `Filters`.

```php
final class AddressGridDefinitionFactory extends AbstractFilterableGridDefinitionFactory {
    const GRID_ID = 'address';

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
    protected function getFilters(): FilterCollectionInterface
    {
        $filters = (new FilterCollection())
            ->add(
                (new Filter('id_address', NumberType::class))
                    ->setTypeOptions([
                        'attr' => [
                            'placeholder' => $this->trans('Search ID', [], 'Admin.Actions'),
                        ],
                        'required' => false,
                    ])
                    ->setAssociatedColumn('id_address')
            )
            ->add(
                (new Filter('firstname', TextType::class))
                    ->setTypeOptions([
                        'attr' => [
                            'placeholder' => $this->trans('Search first name', [], 'Admin.Actions'),
                        ],
                        'required' => false,
                    ])
                    ->setAssociatedColumn('firstname')
            )
            ->add(
                (new Filter('lastname', TextType::class))
                    ->setTypeOptions([
                        'attr' => [
                            'placeholder' => $this->trans('Search last name', [], 'Admin.Actions'),
                        ],
                        'required' => false,
                    ])
                    ->setAssociatedColumn('lastname')
            )
            ->add(
                (new Filter('address1', TextType::class))
                    ->setTypeOptions([
                        'attr' => [
                            'placeholder' => $this->trans('Search address', [], 'Admin.Actions'),
                        ],
                        'required' => false,
                    ])
                    ->setAssociatedColumn('address1')
            )
            ->add(
                (new Filter('postcode', TextType::class))
                    ->setTypeOptions([
                        'attr' => [
                            'placeholder' => $this->trans('Search post code', [], 'Admin.Actions'),
                        ],
                        'required' => false,
                    ])
                    ->setAssociatedColumn('postcode')
            )
            ->add(
                (new Filter('city', TextType::class))
                    ->setTypeOptions([
                        'attr' => [
                            'placeholder' => $this->trans('Search city', [], 'Admin.Actions'),
                        ],
                        'required' => false,
                    ])
                    ->setAssociatedColumn('city')
            )
            ->add(
                (new Filter('id_country', CountryChoiceType::class))
                    ->setTypeOptions([
                        'required' => false,
                    ])
                    ->setAssociatedColumn('country_name')
            )
            ->add(
                (new Filter('actions', SearchAndResetType::class))
                    ->setAssociatedColumn('actions')
                    ->setTypeOptions([
                        'reset_route' => 'admin_common_reset_search_by_filter_id',
                        'reset_route_params' => [
                            'filterId' => self::GRID_ID,
                        ],
                        'redirect_route' => 'admin_addresses_index',
                    ])
            );

        return $filters;
    }
    ...
}
```
{{% /version-tab %}}


### The filters types

In the filters collection you define all the available filters (which will match your grid columns), you can define a specific type depending on the column.
You can basically use any Symfony form type (including your custom ones) and PrestaShop provides a few [filter types]({{< ref "/1.7/development/components/grid/filter-types-reference/_index.md" >}}) that might be useful to you.

## Filters class

You need to define a `Filters` class linked to your Grid, it will allow you to define the default filters and sorting values.
It will also make your list action simpler as PrestaShop provides a parameter resolver responsible of automatically create and fill a `Filters` object.

{{% version-tab versions="1.7.5" %}}
```php
use PrestaShop\PrestaShop\Core\Search\Filters;

/**
 * Class EmailLogsFilter defines default filters for Email logs grid.
 */
final class EmailLogsFilter extends Filters
{
    /**
     * {@inheritdoc}
     */
    public static function getDefaults()
    {
        return [
            'limit' => 50,
            'offset' => 0,
            'orderBy' => 'id_mail',
            'sortOrder' => 'desc',
            'filters' => [],
        ];
    }
}
```
{{% /version-tab %}}

{{% version-tab versions="1.7.6" %}}
```php
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
{{% /version-tab %}}

{{% version-tab versions="1.7.7" %}}
```php
use PrestaShop\PrestaShop\Core\Grid\Definition\Factory\AddressGridDefinitionFactory;
use PrestaShop\PrestaShop\Core\Search\Filters;

/**
 * Default addresses list filters
 */
final class AddressFilters extends Filters
{
    /** @var string */
    protected $filterId = AddressGridDefinitionFactory::GRID_ID;

    /**
     * {@inheritdoc}
     */
    public static function getDefaults(): array
    {
        return [
            'limit' => 50,
            'offset' => 0,
            'orderBy' => 'id_address',
            'sortOrder' => 'asc',
            'filters' => [],
        ];
    }
}
```
{{% /version-tab %}}

## Controller actions

The Grid filtering workflow is divided into three controllers:

- search action: it parses the filters from the POST request, then redirects to the list action
- list action: it parses the filters from GET request, persists them into database and finally renders the grid
- reset action: to clean the persisted filters and reset to the default ones

### Search action
{{% version-tab versions="1.7.5" %}}
```php
class EmailController extends FrameworkBundleAdminController
{
    ...
    /**
     * @AdminSecurity("is_granted('read', request.get('_legacy_controller'))", message="Access denied.")
     *
     * @param Request $request
     *
     * @return RedirectResponse
     */
    public function searchAction(Request $request)
    {
        $definitionFactory = $this->get('prestashop.core.grid.definition.factory.email_logs');
        $emailLogsDefinition = $definitionFactory->getDefinition();

        $gridFilterFormFactory = $this->get('prestashop.core.grid.filter.form_factory');
        $filtersForm = $gridFilterFormFactory->create($emailLogsDefinition);
        $filtersForm->handleRequest($request);

        $filters = [];

        if ($filtersForm->isSubmitted()) {
            $filters = $filtersForm->getData();
        }

        return $this->redirectToRoute('admin_emails_index', ['filters' => $filters]);
    }
    ...
}
```

```yaml
# Routing
admin_emails_search:
    path: /
    methods: [POST]
    defaults:
        _controller: 'PrestaShopBundle:Admin\Configure\AdvancedParameters\Email:search'
        _legacy_controller: AdminEmails
```
{{% /version-tab %}}

{{% version-tab versions="1.7.6" %}}
You can use the `ResponseBuilder` service to easily create the response, it only needs four arguments as input:

- the definition factory
- the request
- the filter ID
- the list route for redirection

```php
use PrestaShopBundle\Service\Grid\ResponseBuilder;
use PrestaShop\PrestaShop\Core\Grid\Definition\Factory\ManufacturerGridDefinitionFactory;

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
# Routing
admin_manufacturers_search:
  path: /
  methods: POST
  defaults:
    _controller: 'PrestaShopBundle:Admin/Sell/Catalog/Manufacturer:search'
    _legacy_controller: AdminManufacturers
    _legacy_link: AdminManufacturers:submitFiltermanufacturer
```
{{% /version-tab %}}

{{% version-tab versions="1.7.7" %}}
Starting 1.7.7 you can simply use our common controller so all you need to do is define the routing:

```yaml
# Routing
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
{{% /version-tab %}}

### List action

Thanks to the internal parameter resolver you can directly use your `Filters` class as an argument in the controller. It then automatically:

- parses the potential parameters in the query and fills them into the `Filters` argument
- matches thanks to the class the filters from the database and fetch them if present
- persists the filters in the database

{{% version-tab versions="1.7.5" %}}
```php
class EmailController extends FrameworkBundleAdminController
{
    ...
    /**
     * Show email configuration page.
     *
     * @AdminSecurity("is_granted('read', request.get('_legacy_controller'))", message="Access denied.")
     *
     * @param Request $request
     * @param EmailLogsFilter $filters
     *
     * @return Response
     */
    public function indexAction(Request $request, EmailLogsFilter $filters)
    {
        $emailLogsGridFactory = $this->get('prestashop.core.grid.factory.email_logs');
        $emailLogsGrid = $emailLogsGridFactory->getGrid($filters);
        $presentedEmailLogsGrid = $this->presentGrid($emailLogsGrid);

        return $this->render('@PrestaShop/Admin/Configure/AdvancedParameters/Email/index.html.twig', [
            'enableSidebar' => true,
            'emailLogsGrid' => $presentedEmailLogsGrid,
            'help_link' => $this->generateSidebarLink($request->attributes->get('_legacy_controller')),
        ]);
    }
    ...
}
```
{{% /version-tab %}}

{{% version-tab versions="1.7.6" %}}
```php
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
{{% /version-tab %}}

{{% version-tab versions="1.7.7" %}}
```php
/**
 * Class manages "Sell > Customers > Addresses" page.
 */
class AddressController extends FrameworkBundleAdminController
{
    ...
    /**
     * Show addresses listing page
     *
     * @AdminSecurity("is_granted('read', request.get('_legacy_controller'))")
     *
     * @param Request $request
     * @param AddressFilters $filters
     *
     * @return Response
     */
    public function indexAction(Request $request, AddressFilters $filters): Response
    {
        $addressGridFactory = $this->get('prestashop.core.grid.grid_factory.address');
        $addressGrid = $addressGridFactory->getGrid($filters);

        return $this->render('@PrestaShop/Admin/Sell/Address/index.html.twig', [
            'help_link' => $this->generateSidebarLink($request->attributes->get('_legacy_controller')),
            'addressGrid' => $this->presentGrid($addressGrid),
            'enableSidebar' => true,
            'layoutHeaderToolbarBtn' => $this->getAddressToolbarButtons(),
        ]);
    }
    ...
}
```
{{% /version-tab %}}

### Reset action

Last action is used to reset the persisted filters and your grid filtering/sorting. This action is the same for nearly all grids so PrestaShop provides a common controller to manage it, and you actually already set it via the grid definition.

{{% version-tab versions="1.7.5" %}}
It is defined in the service definition, it uses the `admin_common_reset_search` route and use `email/index` as keys to match the controller/action.

```yaml
    prestashop.core.grid.definition.factory.email_logs:
        class: 'PrestaShop\PrestaShop\Core\Grid\Definition\Factory\EmailLogsDefinitionFactory'
        parent: 'prestashop.core.grid.definition.factory.abstract_grid_definition'
        arguments:
            - "@=service('router').generate('admin_common_reset_search', {'controller': 'email', 'action': 'index'})"
            - "@=service('router').generate('admin_emails_index')"
        public: true
```
{{% /version-tab %}}

{{% version-tab versions="1.7.6 1.7.7" %}}
It is defined in the `SearchAndResetType` options, it uses `admin_common_reset_search_by_filter_id` and only needs the filter id to identify the filters to clear.

```php
    ...
            ->add((new Filter('actions', SearchAndResetType::class))
                ->setAssociatedColumn('actions')
                ->setTypeOptions([
                    'reset_route' => 'admin_common_reset_search_by_filter_id',
                    'reset_route_params' => [
                        'filterId' => self::GRID_ID,
                    ],
                ])
                ->setAssociatedColumn('actions')
            )
    ...
```
{{% /version-tab %}}
