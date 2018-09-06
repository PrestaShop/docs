---
title: Controller and Routing
weight: 30
---

# Controller and Routing

## Modern/Symfony Controllers

{{% notice tip %}}
Read the Symfony documentation on [Controllers](https://symfony.com/doc/3.4/controller.html) and [Routing](https://symfony.com/doc/3.4/routing.html).
{{% /notice %}}

Every migrated page needs one or more Controllers: if you consider that a legacy Controller needs to be split into multiple controllers (for example: different URLs), it's the right time to do it.

New controllers should be placed in the `src/PrestaShopBundle/Controller/Admin` folder. Starting on 1.7.3, controllers are being progressively organized in sub-folders following the Back Office menu. For instance, if you are migrating a page located into "Advanced Parameters" section, put it into `src/PrestaShop/Controller/Admin/Configure/AdvancedParameters`. 
Same applies to **Improve** and **Sell** sections, and so on.

This is how it should look like in the end:

```
Controller/
└── Admin
    ├── Configure
    │   ├── AdvancedParameters
    │   └── ShopParameters
    ├── Improve
    │   ├── Design
    │   ├── International
    │   ├── Modules
    │   ├── Payment
    │   └── Shipping
    └── Sell
        ├── Catalog
        ├── Customers
        ├── CustomerService
        ├── Orders
        └── Stats
```

{{% notice note %}}
As Controllers are not available for override and can be regarded as internal classes, we don't consider moving a Controller in another namespace as a backward-compatibility break.
{{% /notice %}}

Symfony Controllers should be thin by default and have only one responsibility: getting the HTTP Request from the client and returning an HTTP Response. This means that every business logic should be placed in dedicated classes outside the Controller:

* Form management
* Database access
* Validation
* etc...

You can take a look at [PerformanceController](https://github.com/PrestaShop/PrestaShop/blob/develop/src/PrestaShopBundle/Controller/Admin/Configure/AdvancedParameters/PerformanceController.php) for an example of good implementation, and [ProductController](https://github.com/PrestaShop/PrestaShop/blob/develop/src/PrestaShopBundle/Controller/Admin/ProductController.php) for something you should avoid at all costs.

{{% notice warning %}}
**Never, ever call the legacy controller inside the new controller**. It's a no go, no matter the reason!
{{% /notice %}}

Controllers are responsible for performing "Actions". Actions are methods of Controllers which mapped to a route, and that return a `Response`.

{{% notice tip %}}
**Try to avoid creating helper methods in your controller.** If you find yourself needing them, it could be a symptom of your Controller becoming too complex. This can be solved by extracting code into external classes as needed.
{{% /notice %}}

Regarding the rendering of a Response, there is some data specific to PrestaShop (in Back Office) that we must set for every action:

| Attribute                   |  Type                          |  Description                                            |
|-----------------------------|--------------------------------|---------------------------------------------------------|
| `layoutHeaderToolbarBtn`    | [['href', 'des','icon'], ...]  | Set buttons in toolbar on top of the page               |
| `layoutTitle`               | string                         | Main title of the page                                  |
| `requireAddonsSearch`       | boolean                        | If *true*, display addons recommendations button        |
| `requireBulkActions`        | boolean                        | If *true*, display bulk actions button                  |
| `showContentHeader`         | boolean                        | If *true*, display the page header                      |
| `enableSidebar`             | boolean                        | If *true*, display a sidebar                            |
| `help_link`                 | string                         | Set the url of "Help" button                            |
| `requireFilterStatus`       | boolean                        | ??? (Specific to Modules page?)                         |
| `level`                     | integer                        | Level of authorization for actions (Specific to modules)|

### Controller Helpers

Some helpers are specific to PrestaShop to help you manage the security and the dispatching of legacy hooks, all of them are directly available in Controllers that extends `FrameworkBundleAdminController`.

* `isDemoModeEnabled()`: some actions should not be allowed in Demonstration Mode
* `getDemoErrorMessage()`: returns a specific error message
* `addFlash(type, msg)`: accepts "success|error" and a message that will be displayed after redirection of the page
* `flashErrors([msgs])`: if you need to "flash" a collection of errors
* `dispatchHook(hookName, [params])`: some legacy hooks need to be dispatched to preserve backward compatibility
* `authorizationLevel(controllerName)`: check if you are allowed - as connected user - to do the related actions
* `langToLocale($lang)`: get the locale from a PrestaShop lang
* `trans(key, domain, [params])`: translate a string
* `redirectToDefaultPage()`: redirect the user to the configurated default page
* `presentGrid(GridInterface $grid)`: returns an instance of Grid view
* `getCommandBus`: returns the Command bus
* `getQueryBus`: returns the Query bus

## Security

In modern pages, the permissions system that checks if a user is allowed to do CRUD actions has been improved.

PrestaShop allows merchants to choose which actions (like CREATE, READ, UPDATE, DELETE) can be done by each user profile on each resource (like "Product", "User"). In PrestaShop Back Office, most of these resources are managed by only one Controller, so rights are handled on a page-per-page basis instead of by resource.

So if a logged user wants to manipulate a resource, he or she needs to have the correct rights on the appropriate controller. For instance, to be able access the "Product Catalog" page the user need READ access, because showing the page requires "reading" the Product information. If the user wants to delete a product, (s)he needs DELETE rights.

To enforce this security policy, you have to set up the adequate checks for each one of the actions of your controller. Policies are declared as _annotations_ on top of every controller Action method:

```php
use PrestaShopBundle\Security\Annotation\AdminSecurity;

class SomeController extends FrameworkBundleAdminController
{
    /**
     * @AdminSecurity(
     *     "is_granted(['read', 'update', 'create', 'delete'], request.get('_legacy_controller'))",
     *     message="You do not have permission to update this.",
     *     redirectRoute="some_route_name"
     * )
     *
     */
    public function fooAction(Request $request) { 
        // action code
    }
}
```

{{% callout %}}
##### How does this work?

The `AdminSecurity` annotation will check if the logged user is granted to access the Action (ie. to the URL).
This annotation has 5 properties:

- The first argument is an evaluated expression that must return a boolean. In this case, we're checking if the user has all the rights on the current Controller.

    As explained before, access rights ("roles") in PrestaShop are managed by action (Create, Read, Update, Delete) and related controller. Since roles are currently managed by the legacy system using the legacy controller names, you need to provide the name of the legacy controller to the security system.

    {{% notice note %}}The `_legacy_controller` parameter is explained below in the "[Routing in PrestaShop](#routing-in-prestashop)" section.{{% /notice %}}

- `message` - (optional) Contains the error message displayed to the user, if (s)he's not allowed to perform the action.

- `redirectRoute` - (optional) Route name the router will use to redirect the user if (s)he's not allowed to perform the action.

- `domain` - (optional) Describes the translation domain for the message. 

- `url` - (optional) Used to configure an URL for redirection instead of relying on the router.

    {{% notice warning %}}
This property is temporary and will be removed once the Dashboard has been migrated to Symfony.\
If you use both `url` and `redirectRoute` at the same time, `redirectRoute` will win!
    {{% /notice %}}

{{% /callout %}}

### Demo Mode

PrestaShop is provided with a Demo Mode that, when enabled, defines access application-wide rights that override whatever rights the current user may have. In other words, something that is disabled in Demo Mode will be disabled for all users, even if that user would normally have access to it. 

{{% notice tip %}}
The demo mode can be enabled by setting `_PS_MODE_DEMO_` to `true` in `config/defines.inc.php`.
{{% /notice %}}

When an action needs to be restricted in Demo Mode, you can use the `DemoRestricted` annotation:

```php
use PrestaShopBundle\Security\Annotation\DemoRestricted;

/**
 * @DemoRestricted("route_to_be_redirected",
 *     message="You can't do this when demo mode is enabled.",
 *     domain="Admin.Global"
 * )
 *
 */
public function fooAction(Request $request) {
    // do something here  
}
```

{{% notice tip %}}
`message` and `domain` are both optional.
{{% /notice %}}

### What if I need to restrict a specific part of my Controller?

Sometimes, it may be necessary to dynamically decide on restrictions (eg. depending on user input or an action performed). In addition, it may happen that a Controller action has to handle both the update and display of a resource. What if we want to allow the _READ_ action but not the _UPDATE_?

In this case, you can use the [Controllers helper functions](#controller-helpers) we described above: `isDemoModeEnabled()` and `authorizationLevel()`.

## Routing in PrestaShop

In order to map an Action to an url, you need to register a route and update a legacy class called `Link`.

Routes are declared in `src/PrestaShopBundle/Resources/config/admin` folder, following the menu organization.

This is the current organization of routing, you **must** follow the same organization:

```
.
├── admin
│   ├── _common.yml
│   ├── configure
│   │   ├── advanced_parameters
│   │   ├── _configure.yml
│   │   └── shop_parameters
│   ├── improve
│   │   ├── design
│   │   ├── _improve.yml
│   │   ├── international
│   │   ├── modules
│   │   ├── payment
│   │   └── shipping
│   ├── _security.yml
│   └── sell
│       ├── catalog
│       ├── orders
│       ├── _sell.yml
│       └── stocks.yml
├── admin.yml
├── api
│   ├── attributes.yml
│   ├── categories.yml
│   ├── features.yml
│   ├── i18n.yml
│   ├── improve
│   │   └── design
│   ├── manufacturers.yml
│   ├── stock_movements.yml
│   ├── stocks.yml
│   ├── suppliers.yml
│   └── translations.yml
└── api.yml
```

Nothing special here except that you *must* declare a property called `_legacy_controller` containing the old name of controller you are migrating. This will make the class `Link` aware of it: this class is responsible of generating urls in the legacy parts of PrestaShop.

{{% notice tip %}}
This same property is used to handle [Security Restrictions](#security). 
{{% /notice %}}

For example, let's see what was done when migrating the "System Information" page inside the "Configure > Advanced Parameters" section:

```yaml
admin_system_information:
    path: system_information
    methods: [GET]
    defaults:
        _controller: 'PrestaShopBundle\Controller\Admin\AdvancedParameters\SystemInformationController::indexAction'
        _legacy_controller: AdminInformation
```

{{% notice info %}}
PrestaShop uses YAML files for service declaration and routing, please don't use annotations for that!
{{% /notice %}}

And now the update of `Link` class, adding a new entry in `$routes` list:

```php
// classes/Link.php, in getAdminLink()
 $routes = array(
    'AdminModulesSf' => 'admin_module_manage',
    'AdminStockManagement' => 'admin_stock_overview',
    //...
    'AdminInformation' => 'admin_system_information',
);
```

And now, every link to "System Information" page in legacy parts will point to the new url.

{{% notice note %}}
**Be aware, some urls may be hardcoded in legacy!**

Use your IDE search to find occurrences and replace them using the `Link` class in Controllers, `{$url->link->getAdminLink()}` in smarty or `{{ getAdminLink() }}` in Twig.
{{% /notice %}}
