---
title: Migrating controller horizontally
weight: 40
---

## The Bridge
A new namespace was introduced for the horizontal migration - `PrestaShopBundle\Bridge`. All the classes inside acts as bridges between the Symfony and the legacy code.

- `PrestaShopBundle/Bridge/AdminController/` contains classes which helps to build the Symfony controller with the encapsulated legacy code under the hood.
- `PrestaShopBundle/Bridge/Helper/` contains bridges for List and Form helpers which encapsulates the legacy `HelperList` and `HelperForm` classes.
- `PrestaShopBundle/Bridge/Smarty/` contains a bridge for converting Smarty template to a Symfony controller response.

### Creating the Controller
To start migrating a page horizontally you need to create a new Symfony controller under `PrestaShopBundle/Controller/<path>/<Your>Controller`, extend the `FrameworkBundleAdminController` and declare the routing in `PrestaShopBundle/Resources/config/routing/admin/{path-following-menu}/*.yml` file (e.g. `PrestaShopBundle/Resources/config/routing/admin/sell/catalog/features.yml`) (same as with vertical migration). The controller must implement a `PrestaShopBundle\Bridge\AdminController\FrameworkBridgeControllerInterface` which requires 2 methods to be implemented:
 - `getLegacyControllerBridge(): LegacyControllerBridgeInterface` - You don't need to worry about this method, just use the `FrameworkBridgeControllerTrait` - the method is already implemented there.
 - `getControllerConfiguration(): ControllerConfiguration` - This is the main method which defines your controller, you can use another method from `FrameworkBridgeControllerTrait` to help you build the configuration, which requires only couple parameters:
   - $tableName - the database table name used by the controller. This parameter is equivalent to legacy AdminController::$table. E.g. for FeatureController it is "feature".
   - $objectModelClassName - the class name of related object model. This parameter is equivalent to legacy AdminController::$className. E.g for FeatureController it is "Feature".
   - $legacyControllerName - the name of related legacy controller without the "controller" suffix. E.g. for FeatureController it is "AdminFeatures"

It should look something like this (FeatureController used as an example):
```php
class FeatureController extends FrameworkBundleAdminController implements FrameworkBridgeControllerInterface
{
    use FrameworkBridgeControllerTrait;
    
    // ...
    
    public function getControllerConfiguration(): ControllerConfiguration
    {
        return $this->buildControllerConfiguration(
            'feature',
            Feature::class,
            'AdminFeatures'
        );
    }
```

Usually most of the pages have header toolbar actions like "Add new {Foo}". You can add them by calling `ControllerConfiguration::addHeaderToolbarAction()`. See example with FeatureController bellow:
```php
     $controllerConfiguration = $this->getControllerConfiguration();
     $index = $controllerConfiguration->legacyCurrentIndex;
     $token = $controllerConfiguration->token;

     $controllerConfiguration
         ->addHeaderToolbarAction('new_feature', [
             'href' => $this->generateUrl('admin_features_add'),
             'desc' => $this->trans('Add new feature', 'Admin.Catalog.Feature'),
             'icon' => 'process-icon-new',
         ])
         ->addHeaderToolbarAction('new_feature_value', [
             'href' => $index . '&addfeature_value&id_feature=' . (int) Tools::getValue('id_feature') . '&token=' . $token,
             'desc' => $this->trans('Add new feature value', 'Admin.Catalog.Help'),
             'icon' => 'process-icon-new',
         ])
     ;
```

After you created a controller and provided a ControllerConfiguration, you can proceed adding actions.

## Migrating the list

Usually most of the main pages in PrestaShop contains a list of related entities. To migrate one of these lists you can use HelperListBridge. There are some methods provided in FrameworkBridgeControllerListTrait and a FrameworkControllerSmartyTrait which will help you to build the HelperListBridge and render the list. So this is what you need to do:
1. Create a new `indexAction` in your new controller and configure the routing as usual.
2. Build the HelperListConfiguration by using `FrameworkBridgeControllerListTrait::buildListConfiguration()`. This method will accept couple mandatory properties and some optional, by which the list configuration is built. You should be able to find all the related values in legacy controller or legacy HelperList class.
3. Set list fields by using recently created `HelperListConfiguration::setFieldsList()`. This method accepts the list fields in same structure as it was in legacy controller, so you should be able to basically copy-paste them.
4. Add list actions (if there are any) by using recently created `HelperListConfiguration`. It provides methods such as:
   - `addRowAction(string $action)` - action for every row. Available values: `view`, `edit`, `delete`.
   - `addToolbarAction(string $label, array $config)` - action for list toolbar.
   - `addBulkAction(string $label, array $config)` - bulk action (usually for bulk deletion or status updates).
5. Call filters processor if the list is filterable by using the method from trait `FrameworkBridgeControllerListTrait::processFilters()`
6. Generate the list content html by using HelperListBridge and render the list by using `FrameworkControllerSmartyTrait::renderSmarty($generatedHtml)`

After these steps your controller should look something like this `(using FeatureController as an example, because it is the first index page migrated this way)`: 
```php
class FeatureController extends FrameworkBundleAdminController implements FrameworkBridgeControllerInterface
{
    use FrameworkBridgeControllerTrait;
    use FrameworkBridgeControllerListTrait;
    use FrameworkControllerSmartyTrait;

    /**
     * @AdminSecurity("is_granted('read', request.get('_legacy_controller'))")
     */
    public function indexAction(Request $request): Response
    {
        $this->setHeaderToolbarActions();
        
        // 2.
        $helperListConfiguration = $this->buildListConfiguration(
            'id_feature',
            'position',
            $request->attributes->get('_route'),
            // not many pages with positioning action are left to migrate,
            // so these 2 optional parameters will not be needed in most cases
            'admin_features_update_position',
            'id_feature'
        );

        $this->setListFields($helperListConfiguration);
        $this->setListActions($helperListConfiguration);
        // 5.
        $this->processFilters($request, $helperListConfiguration);

        // 7.
        return $this->renderSmarty($this->getHelperListBridge()->generateList($helperListConfiguration));
    }
    
    // 3.
    private function setListFields(HelperListConfiguration $helperListConfiguration): void
    {
        $helperListConfiguration->setFieldsList([
            'id_feature' => [
                'title' => $this->trans('ID', 'Admin.Global'),
                'align' => 'center',
                'class' => 'fixed-width-xs',
            ],
            'name' => [
                'title' => $this->trans('Name', 'Admin.Global'),
                'width' => 'auto',
                'filter_key' => 'b!name',
            ],
            'value' => [
                'title' => $this->trans('Values', 'Admin.Global'),
                'orderby' => false,
                'search' => false,
                'align' => 'center',
                'class' => 'fixed-width-xs',
            ],
            'position' => [
                'title' => $this->trans('Position', 'Admin.Global'),
                'filter_key' => 'a!position',
                'align' => 'center',
                'class' => 'fixed-width-xs',
                'position' => 'position',
            ],
        ]);
    }

    // 4.
    private function setListActions(HelperListConfiguration $helperListConfiguration): void
    {
        $helperListConfiguration
            ->addRowAction('view')
            ->addRowAction('edit')
            ->addRowAction('delete')
            ->addToolbarAction('new', [
                'href' => $this->generateUrl('admin_features_add'),
                'desc' => $this->trans('Add new', 'Admin.Actions'),
            ])
            ->addBulkAction('delete', [
                'text' => $this->trans('Delete selected', 'Admin.Actions'),
                'icon' => 'icon-trash',
                'confirm' => $this->trans('Delete selected items?', 'Admin.Notifications.Warning'),
            ])
        ;
    }
```
