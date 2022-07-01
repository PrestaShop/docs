---
title: Cleaning up
weight: 60
---

# Migrate list

Once you create your controller,and you make your routing file. We can start to have fun with migration.

## Routing
We will start with the list. You have to add to the routing file an entry for the list.

Keep our example with TitleController.

Example:
```yaml
admin_title_index:
  path: /
  methods: [ GET, POST ]
  defaults:
    _controller: PrestaShopBundle\Controller\Admin\Configure\ShopParameters\TitleController::indexAction
    _legacy_controller: AdminGender
    _legacy_link: AdminGender
```

You must specify as

- `_controller` the namespace of your controller
- `_legacy_controller` the name of the legacy controller
- `_legacy_link` the name of the legacy action (for the list it’s the same as the legacy controller)

This information will be helpful to redirect the legacy link to your controller automatically

## Controller
Once you have finished your routing, your controller must implements this interface: `PrestaShopBundle\Bridge\AdminController\LegacyListControllerBridgeInterface`.

The previous interface needs these two method:
* `getPositionIdentifier`: have to return position identifier for legacy list request
* `getIdentifier`: have to return the identifier for table

Then you have to create the corresponding action.

```php
public function index(Request $request)
{
    ....
}
```

**Get an instance of `HelperListConfiguration`**

The `HelperListConfiguration` class is an object which contains all configurations needed to render a list using the `HelperList` bridge.

```php
$helperListConfiguration = $this->get('prestashop.core.bridge.helper_list_configuration_factory')->create(
    self::TABLE,
    self::CLASS_NAME,
    $this->controllerConfiguration
);
```

To instantiate this configuration, you need to pass it three arguments:

- The name of the table like in legacy (for our example, it's `gender`)
- The name of the object model class in legacy (for our example, it's `Gender`)
- An instance of controller configuration, which is an object

### Define the list of fields
To add a new field to the list, your controller must use the `addListField` methods from the `AdminControllerTrait`.

This method takes an instance of `FieldInterface` and an instance of `HelperListConfiguration`.And she adds the field to the field list in HelperListConfiguration.

A `FieldInterface` object needs a label and an array of configurations. In this array of configurations, you can define the following options:

- title: which is required and represents the text, will be shown in the list's header
- align: represents where you want to align the value in the cell
- class: represents a class which be added to the class html attributes in the cell
- filter_key: represents the name of the filter key
- orderby: tell if you want or not to be able to order by this field in your list
- position: identify a field as a position cell
- search: enable or disable the search by this field
- width: define the width for the cell of this field

You can find all the configuration of your field in the legacy controller. You have to copy/paste it at the second `config` attribute of the field class.

> Example for the hypothetic TitleController and for the field `id_gender`:
>

```php
$this->addListField(new Field(
        'id_gender', [
        'title' => $this->trans('ID', [], 'Admin.Global'),
        'align' => 'center',
        'class' => 'fixed-width-xs',
    ]
), $helperListConfiguration);
```

### Define actions to your user
You have two way to add actions, these two methods are in the `AdminControllerTrait`:

- `addAction` which handle `HeaderToolbarAction`
- `addActionList` which handle `ListHeaderToolbarAction`, `ListRowAction`, `ListBulkAction`

The `HeaderToolbarAction` represents an action in the header toolbar of the page.

The `ListHeaderToolbarAction` represents an action in the header toolbar of the list.

The `ListRowAction` represents an action in each row of the list.

The `ListBulkAction` represents a bulk action for the list.

To create an user action, you must define it as a label and an array of configurations. In this configuration, you can specify the following options:

- confirm: is the text for the confirmation alert
- desc: is the text for the title HTML attribute
- href: the link to the action
- icon: a name of a PrestaShop icons
- text: the text in the link for the action

### Reset filters
A button appears to reset filters when you have filters with a filters field at the top of the list. This button adds a `$_GET` parameter named `submitResetfeature`. So to reset filters in your controller, you can do this:

```php
if ($request->request->has('submitResetfeature')) {
    $this->getResetFiltersHelper()->resetFilters(
        $helperListConfiguration,
        $request
    );
}
```

The `resetFilters` method comes from the `ResetFiltersHelper`.

### Process filters

To handle filter defines in the list fields, you have to call the `processFilter` method from FiltersHelper. The first parameter of the method is a Request instance. This method applies a filter on the SQL query for the list. This is why it takes the `HelperListConfiguration` as the second parameter.

```php
$this->getFiltersHelper()->processFilter(
    $request,
    $helperListConfiguration
);
```

### AdminControllerTrait

The `AdminControllerTrait` contains 6 methods:

- `addAction`: to add user action on your page
- `addActionList`: to add user action on your list
- `addListField`: to add a field to your list
- `getResetFiltersHelper`: to return an instance of `ResetFiltersHelper`
- `getFiltersHelper`: to return an instance of `FiltersHelper`
- `getHelperListBridge`: to return an instance of `HelperListBridge`

### Generate list

To get the HTML for your list, configure with `addActionList` and `addListField`. You must use the `generateList` method from `HelperListBridge`. This methods take an instance of `HelperListConfiguration` and return a string that represents the HTML of your list.

```php
$this->getHelperListBridge()->generateList(
    $helperListConfiguration
)
```

## Render
To render the response to the client, like in Symfony, you must call a rendering method. This method is in the `SmartyTrait` you have to add it at the top of your controller:

```php
use SmartyTrait;
```

Then you can use the `renderSmarty` method, which only takes the HTML that you want to show as the content of your page. The header, footer, and other stuff are handled by the `renderSmarty` method

```php
return $this->renderSmarty('Content');
```

The `renderSmarty` method of `SmartTrait` is a proxy method for the render of `SmartyBridge`. The `render` method hydrates the `ControllerConfiguration` object to handle the header, footer, and breadcrumbs.

## Override Query List

Suppose the legacy page you’re migrating contains an override of the list query. You can create an `HelperList*Bridge` class that extends the `HelperListBridge`, and you have to copy/paste the legacy code overriding the list query.

```php
<?php
/**
 * Copyright since 2007 PrestaShop SA and Contributors
 * PrestaShop is an International Registered Trademark & Property of PrestaShop SA
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.md.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/OSL-3.0
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to https://devdocs.prestashop.com/ for more information.
 *
 * @author    PrestaShop SA and Contributors <contact@prestashop.com>
 * @copyright Since 2007 PrestaShop SA and Contributors
 * @license   https://opensource.org/licenses/OSL-3.0 Open Software License (OSL 3.0)
 */

declare(strict_types=1);

namespace PrestaShopBundle\Bridge\Helper\HelperListCustomizer;

use Db;
use DbQuery;
use PrestaShopBundle\Bridge\Helper\HelperListBridge;
use PrestaShopBundle\Bridge\Helper\HelperListConfiguration;

/**
 * This class customize the result of the list for the feature controller.
 */
class HelperListExampleBridge extends HelperListBridge
{
    public function getList(
        HelperListConfiguration $helperListConfiguration,
        int $idLang
    ): void {
        parent::getList($helperListConfiguration, $idLang);

        //Put the code to override the list here
    }
}
```

Then you have to declare your new services in `bridge.yml` like this:

```yaml
prestashop.core.bridge.helper_list_example:
    class: PrestaShopBundle\Bridge\Helper\HelperListCustomizer\HelperListExampleBridge
    parent: prestashop.core.bridge.helper_list_bridge
    public: true
```

And override the method `getHelperListBridge` in your Controller like this:

```php
public function getHelperListBridge(): HelperListExampleBridge
{
    return $this->get('prestashop.core.bridge.helper_list_example');
}
```
