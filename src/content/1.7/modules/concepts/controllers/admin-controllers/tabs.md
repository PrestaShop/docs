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

## Modern Controllers and manual tab insertion

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
        $tab->name = array();
        foreach (Language::getLanguages() as $lang) {
            $tab->name[$lang['id_lang']] = 'My Module Demo';
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

[controller-routing]: {{< ref "/1.7/development/architecture/migration-guide/controller-routing.md#the-legacy-link-property" >}}
