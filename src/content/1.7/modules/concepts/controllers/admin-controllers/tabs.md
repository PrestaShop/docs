---
title: Adding module links in the back-office side menu
---

# Adding module links in the back-office side menu

{{< minver v="1.7.1" title="true" >}}

On the PrestaShop back office, the links on the side menu are linked to AdminControllers and ModuleAdminController classes. The first ones come from the PrestaShop Core, but the second ones are defined by the modules. If you want to add a link to your ModuleAdminControllers in the back office sidebar, this guide is for you.

## Tabs registration

In order to register new links, open your main module class.

We will now use a property called $tabs, storing an array of link details. Each of them contains a class (= link) to add in the side menu.


## How to define a tab in the menu

Depending on the options you provide, your links won’t be displayed the same way:

* **class_name**: **Mandatory**, this is the file called when the merchant will click on your link. This is the class name without the `Controller` part.
* **name**: Optional, this is the name displayed in the menu. If not provided, the class name is shown instead.
* **parent_class_name**: Optional if you want to display it in a subcategory. Go farther in this document to see available values.
* **icon**: Optional, will display an icon when the menu is reduced.
* **visible**: Optional, is of boolean type to determine whether you want to display the tab or not.


## How to add names and their translations to a tab

Be default, your tab will be displayed in the menu with its class name. If you want to use something more explicit, you can set the name property.

### Option 1: Use the same name for all languages

If you want to add the same name to all available and active languages available on the shop, just set the ‘name’ key with a single string:


```php
<?php
public $tabs = array(
    array(
        'name' => 'Merchant Expertise', // One name for all langs
        'class_name' => 'AdminGamification',
        'visible' => true,
        'parent_class_name' => 'ShopParameters',
));
```


### Option 2: Use a different name for each language

You can also add your translations per locale (ex.: fr-FR) or per language (ex.: fr), both are valid.

If a language is installed on the shop but is not found in your translated names, it will be automatically associated to the first value of the array.

Hence, we advise you to define the English value first.

```php
<?php
public $tabs = array(
    array(
        'name' => array(
            'en' => 'Merchant Expertise', // Default value should be first
            'fr' => 'Expertise PrestaShop',
            ...
        ),
        'class_name' => 'AdminGamification',
        'parent_class_name' => 'ShopParameters',
));
```

## Which parent to choose?

Here is the default structure of the side-menu from PrestaShop at the moment this page is written. You can choose an element from this list to use as a parent.

* AdminDashboard
* SELL
    * AdminParentOrders
        * AdminOrders
        * AdminInvoices
        * AdminSlip
        * AdminDeliverySlip
        * AdminCarts
    * AdminCatalog
        * AdminProducts
            * AdminCategories
            * AdminTracking
            * AdminParentAttributesGroups
            * AdminParentManufacturers
            * AdminAttachments
            * AdminParentCartRules
    * AdminParentCustomer
         * AdminCustomers
         * AdminAddresses
         * AdminOutstanding
    * AdminParentCustomerThreads
         * AdminCustomerThreads
         * AdminOrderMessage
         * AdminReturn
    * AdminStats
    * AdminStock
         * AdminWarehouses
         * AdminParentStockManagement
         * AdminSupplyOrders
         * AdminStockConfiguration
* IMPROVE
    * AdminParentModulesSf
         * AdminModulesSf
         * AdminModules
         * AdminAddonsCatalog
    * AdminParentThemes
         * AdminThemes
         * AdminThemesCatalog
         * AdminCmsContent
         * AdminModulesPositions
         * AdminImages
    * AdminParentShipping
         * AdminCarriers
         * AdminShipping
    * AdminParentPayment
         * AdminPayment
         * AdminPaymentPreferences
    * AdminInternational
         * AdminParentLocalization
         * AdminParentCountries
         * AdminParentTaxes
         * AdminTranslations
* CONFIGURE
    * ShopParameters
         * AdminParentPreferences
         * AdminParentOrderPreferences
         * AdminPPreferences
         * AdminParentCustomerPreferences
         * AdminParentStores
         * AdminParentMeta
         * AdminParentSearchConf
    * AdminAdvancedParameters
         * AdminInformation
         * AdminPerformance
         * AdminAdminPreferences
         * AdminEmails
         * AdminImport
         * AdminParentEmployees
         * AdminParentRequestSql
         * AdminLogs
         * AdminWebservice
         * AdminShopGroup
         * AdminShopUrl
* DEFAULT

## How to check the tabs registration

Once you're done, just install (or reset) your module.

The $tabs property will be read from PrestaShop and the tabs will be automatically displayed on the side menu. They will stay as long as your module is installed.

## Automatic hiding of disabled modules
{{< minver v="1.7.7" title="true" >}}

When you disable a module all its related Tabs will be automatically hidden, they are still in the database but their `enabled` field is set to `false` and the BackOffice menu automatically prevents them from being displayed.
When the module is `enabled` again the Tabs are automatically displayed again.

## Modern Controllers

### Manual tab insertion
{{< minver v="1.7.5" title="true" >}}

If you created a modern controller using Symfony controllers and routing you can't create a Tab as is because the system is
based on legacy controllers identified through their class names. But you can still trick it using the `_legacy_link` property
in the routing (more details about this feature in the [Controller and Routing][controller-routing] page).

Let's assume you already defined your Symfony route:

```yaml
# modules/your-module/config/routes.yml
your_route_name:
    path: your-module/demo
    methods: [GET]
    defaults:
      _controller: 'MyModule\Controller\DemoController::demoAction'
```

What you need to do then is add the `_legacy_controller` and `_legacy_link` parameters:

```yaml
# modules/your-module/config/routes.yml
your_route_name:
    path: your-module/demo
    methods: [GET]
    defaults:
      _controller: 'MyModule\Controller\DemoController::demoAction'
      _legacy_controller: 'MyModuleDemoController'
      _legacy_link: 'MyModuleDemoController'
```

So now any call in the menu system to `Link::getAdminLink('MyModuleDemoController')'` will return your controller url `your-module/demo`
But since the `MyModuleDemoController` class actually doesn't exist, the automatic tab registration based on the `$tabs` property won't work.
So you need to insert your tab manually during your module installation:

```php
<?php
use Language;

class example_module_mailtheme extends Module
{
    public function install()
    {
        return parent::install()
            && $this->installTab()
        ;
    }

    public function uninstall()
    {
        return parent::uninstall()
            && $this->uninstallTab()
        ;
    }

    public function enable($force_all = false)
    {
        return parent::enable($force_all)
            && $this->installTab()
        ;
    }

    public function disable($force_all = false)
    {
        return parent::disable($force_all)
            && $this->uninstallTab()
        ;
    }

    private function installTab()
    {
        $tabId = (int) Tab::getIdFromClassName('MyModuleDemoController');
        if (!$tabId) {
            $tabId = null;
        }

        $tab = new Tab($tabId);
        $tab->active = 1;
        $tab->class_name = 'MyModuleDemoController';
        // Only since 1.7.7, you can define a route name
        $tab->route_name = 'admin_my_symfony_routing';
        $tab->name = array();
        foreach (Language::getLanguages() as $lang) {
            $tab->name[$lang['locale']] = $this->trans('My Module Demo', array(), 'Modules.MyModule.Admin', $lang['locale']);
        }
        $tab->id_parent = (int) Tab::getIdFromClassName('ShopParameters');
        $tab->module = $this->name;

        return $tab->save();
    }

    private function uninstallTab()
    {
        $tabId = (int) Tab::getIdFromClassName('MyModuleDemoController');
        if (!$tabId) {
            return true;
        }

        $tab = new Tab($tabId);

        return $tab->delete();
    }
}
```

And now you have your menu link directing to your Symfony controller with a nice url.

### Automatic tab registration
{{< minver v="1.7.7" title="true" >}}

Modern controllers can also be registered via the `$tabs` property, you don't need to manually create the Tab object in this case, and you can take full advantage of the Symfony routing (no more `_legacy_link`).

Here is an example with a Symfony controller (example comes from the `ps_linklist` module), nothing specific in this controller but you will note the security annotation `@AdminSecurity` that uses `request.get('_legacy_controller')` which will make the link between this controller and the routing configuration.

```php
// yourmodule/src/Controller/Admin/Improve/Design

namespace PrestaShop\Module\LinkList\Controller\Admin\Improve\Design;

use PrestaShopBundle\Controller\Admin\FrameworkBundleAdminController;
use PrestaShopBundle\Security\Annotation\AdminSecurity;
use PrestaShopBundle\Security\Annotation\ModuleActivated;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class LinkBlockController.
 *
 * @ModuleActivated(moduleName="ps_linklist", redirectRoute="admin_module_manage")
 */
class LinkBlockController extends FrameworkBundleAdminController
{
    /**
     * @AdminSecurity("is_granted('read', request.get('_legacy_controller'))", message="Access denied.")
     *
     * @param Request $request
     *
     * @return Response
     */
    public function listAction(Request $request)
    {
        //Get hook list, then loop through hooks setting it in in the filter
        ...

        return $this->render('@Modules/ps_linklist/views/templates/admin/link_block/list.html.twig', [
            'grids' => $presentedGrids,
            'enableSidebar' => true,
            'layoutHeaderToolbarBtn' => $this->getToolbarButtons(),
            'help_link' => $this->generateSidebarLink($request->attributes->get('_legacy_controller')),
        ]);
    }
}
```

Now here is the routing configuration, we can see the `_legacy_controller` option, that will be used by the controller, is present with a value of `AdminLinkWidget` which will be used as our **class_name** for the tab.

```yaml
# yourmodule/config/routes.yml
admin_link_block_list:
  path: /link-widget/list
  methods: [GET]
  defaults:
    _controller: 'PrestaShop\Module\LinkList\Controller\Admin\Improve\Design\LinkBlockController::listAction'
    # _legacy_controller is used to manage permissions
    _legacy_controller: AdminLinkWidget
    # No need for _legacy_link in this case
```

Finally here is the `$tabs` property used for automatic registration, it still needs a `class_name` field that will be used for permission checking, it will also be used to create the default `AUTHORIZATION_ROLES` related to this **class_name**.

```php
// yourmodule/ps_linklist.php
use Language;

class Ps_Linklist extends Module
{
    public function __construct() {
        ...
        $tabNames = [];
        foreach (Language::getLanguages(true) as $lang) {
            $tabNames[$lang['locale']] = $this->trans('Link List', array(), 'Modules.Linklist.Admin', $lang['locale']);
        }
        $this->tabs = [
            [
                'route_name' => 'admin_link_block_list',
                'class_name' => 'AdminLinkWidget',
                'visible' => true,
                'name' => $tabNames,
                'parent_class_name' => 'AdminParentThemes',
            ],
        ];
        ...
    }
}
```

[controller-routing]: {{< ref "/1.7/development/architecture/migration-guide/controller-routing.md#the-legacy-link-property" >}}
