---
title: Adding module links in the back-office side menu
---

# Adding module links in the back-office side menu

{{< minver v="1.7.1" title="true" >}}

On the PrestaShop back office, the links on the side menu are linked to AdminControllers and ModuleAdminController classes. The first ones come from the PrestaShop Core, but the second ones are defined by the modules. If you want to add a link to your ModuleAdminControllers in the back office sidebar, this guide is for you.

## Tabs registration

In order to register new links, open your main module class.

We will now use a property called `$tabs`, storing an array of link details. Each of them contains a class (= link) to add in the side menu.


## How to define a tab in the menu

Depending on the options you provide, your links won’t be displayed the same way:

Property            | Required | Type | Description | Example
--------------------|:--------:|------|-------------|---------
`class_name`        | Yes | String | Class called when the user will click on your link. This is the class name without the `Controller` part. | `"AdminGamification"`
`route_name`        | No  | String | {{< minver v="1.7.7" >}} Symfony route name, if your controller is Symfony-based | `"gamification_configuration"`
`name`              | No  | String\|String[] | Label displayed in the menu. If not provided, the class name is shown instead. | `"Merchant Expertise"`
`parent_class_name` | No  | String | The parent menu, if you want to display it in a subcategory. Go farther in this document to see available values. |
`icon`              | No  | String | Icon name to use, if any | `"shopping_basket"`
`visible`           | No  | Boolean | Whether you want to display the tab or not. Hidden tabs are used when you don't need a menu item but you still need to handle access rights. | `true`
`wording `          | No  | String | {{< minver v="1.7.8" >}} The translation key to use to translate the menu label. | `"Merchant Expertise"`
`wording_domain`    | No  | String | {{< minver v="1.7.8" >}} The translation domain to use to translate the menu label. | `"Modules.Gamification.Admin"`

## How to specify the menu label

By default, your tab will be displayed in the menu with its class name. If you want to use a different label, you can set the `name` property. This label can be translated in two ways.

### Option 1: Use the same label for all languages

If you want to add the same name to all available and active languages available on the shop, just set the ‘name’ key with a single string:


```php
<?php
class mymodule extends Module
{
    public $tabs = [
        [
            'name' => 'Merchant Expertise', // One name for all langs
            'class_name' => 'AdminGamification',
            'visible' => true,
            'parent_class_name' => 'ShopParameters',
        ],
    ];
    
    // ...
}
```


### Option 2: Use a different name for each language

#### Since PrestaShop 1.7.8

Since {{< minver v="1.7.8" >}} you can declare a `wording` and `wording_domain` to leverage the translation system. This will allow the menu to be translated automatically using either the provided translation catalogues or the translation interface.

```php
<?php
class mymodule extends Module
{
    public $tabs = [
        [
            'name' => 'Merchant Expertise', // Fallback when the translation is unavailable
            'class_name' => 'AdminGamification',
            'parent_class_name' => 'ShopParameters',
            'wording' => 'Merchant Expertise', // Translation key
            'wording_domain' => 'Modules.Gamification.Admin', // Translation domain
        ],
    ];

    // ...
}
```

#### Alternative - declare your translations

In previous PrestaShop versions, `wording` and `wording_domain` will be ignored. In that case, you will have to provide translations for every language upfront.

You can add your translations per locale (ex.: `fr-FR`) or per language (ex.: `fr`) – both are valid.

```php
<?php
class mymodule extends Module
{
    public $tabs = [
        [
            'name' => [
                'en' => 'Merchant Expertise', // Fallback value
                'fr' => 'Expertise PrestaShop',
                ...
            ],
            'class_name' => 'AdminGamification',
            'parent_class_name' => 'ShopParameters',
            'wording' => 'Merchant Expertise', // Ignored in PS < 1.7.8
            'wording_domain' => 'Modules.Gamification.Admin', // Ignored in PS < 1.7.8
        ],
    ];

    // ...
}
```

{{% notice tip %}}
**Ordering is important**.
If the user's language is not found in your translated names, the first value in the array will be used as fallback.
Hence, we advise you to define the English value first.
{{% /notice %}}



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

The `$tabs` property will be read from PrestaShop and the tabs will be automatically displayed on the side menu. They will stay as long as your module is installed.

## Tab permissions, accesses and roles

When you create a new `Tab` it automatically creates the appropriate roles in `Tab::initAccess` based on the `class_name`. For example using `AdminLinkWidget` as the class name will create the following roles:

- `ROLE_MOD_TAB_ADMINLINKWIDGET_CREATE`
- `ROLE_MOD_TAB_ADMINLINKWIDGET_DELETE`
- `ROLE_MOD_TAB_ADMINLINKWIDGET_READ`
- `ROLE_MOD_TAB_ADMINLINKWIDGET_UPDATE`

These roles will allow you to manage detailed permission in your controllers, you can read this documentation if you need more details about [Controller Security]({{< ref "/1.7/development/architecture/migration-guide/controller-routing.md#security" >}}).
They are automatically added to the `SUPER_ADMIN` group, and the group of the Employee installing the module, but you can then edit privileges for other Employee groups.

{{% notice note %}}
**Hidden Tabs**

Tabs are usually visible and accessible in the menu, but there are also **invisible** tabs, they are only created for permissions to manage Security. All the controllers present in `controllers/admin` in your module are automatically added as hidden Tabs (if no visible Tab exists).
{{% /notice %}}


## Automatic hiding of disabled modules
{{< minver v="1.7.7" title="true" >}}

When you disable a module, all its related Tabs will be automatically hidden from the Back Office menu. 

Tabs are kept in database with their `enabled` field is set to `false`. Once the module is enabled again all its Tabs are automatically enabled as well.

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

class Example_module_mailtheme extends Module
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
            $tab->name[$lang['id_lang']] = $this->trans('My Module Demo', array(), 'Modules.MyModule.Admin', $lang['locale']);
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

Modern controllers can also be registered via the `$tabs` property. You don't need to manually create the Tab object in this case, and you can take full advantage of the Symfony routing (no need for `_legacy_link`).

Here is an example with a Symfony controller (example comes from the [ps_linklist](https://github.com/PrestaShop/ps_linklist) module). Nothing specific in this controller but notice the security annotation `@AdminSecurity` that uses `request.get('_legacy_controller')` which will make the link between this controller and the routing configuration.

```php
<?php
// yourmodule/src/Controller/Admin/Improve/Design

namespace PrestaShop\Module\LinkList\Controller\Admin\Improve\Design;

use PrestaShopBundle\Security\Annotation\AdminSecurity;
// (...)

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
        // (...)
    }
}
```

Now here is the routing configuration. We can see the `_legacy_controller` option is present with a value of `AdminLinkWidget`. This will be used for the `AdminSecurity` annotation, but also as our Tab's **class_name**.

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

Finally, here is the `$tabs` property used for automatic registration. It still requires a `class_name` field: it will be used to create the default `AUTHORIZATION_ROLES` related to this **class_name**, and later to check for those permissions.

```php
<?php
// yourmodule/ps_linklist.php
use Language;

class Ps_Linklist extends Module
{
    public function __construct() {
        // ...
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
                'wording' => 'Link List',
                'wording_domain' => 'Modules.Linklist.Admin'
            ],
        ];
        // ...
    }
}
```

{{% notice note %}}
**Hidden Tabs**

Since 1.7.7, when you create a Symfony route with the `_legacy_controller` if no visible Tab has been created an invisible one is automatically created so the permissions will be correctly handled.
{{% /notice %}}


[controller-routing]: {{< ref "/1.7/development/architecture/migration-guide/controller-routing.md#the-legacy-link-property" >}}
