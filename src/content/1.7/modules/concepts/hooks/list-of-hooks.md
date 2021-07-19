---
title: List of hooks
weight: 2
aliases:
  - /1.7/modules/concepts/hooks/list_of_hooks
---

# List of hooks in PrestaShop 1.7

## Update notes

A couple of hooks were modified between 1.7.0.x and 1.7.1.x.

* `actionDeleteProductInCartAfter` has been divided into two hooks:
    * `actionObjectProductInCartDeleteBefore`.
    * `actionObjectProductInCartDeleteAfter`.
* `displayProductButtons` has been renamed into `displayProductAdditionalInfo`.<br>
  Don’t worry, we kept an alias :)

## Full list

{{% notice tip %}}
**Search tip:** Some hooks are generated dynamically, so their names are documented in a generic way.

For example, `actionAdminCustomersFormModifier` is documented as `action<AdminControllerClassName>FormModifier`, so you won't find it if you search for the exact name. When you see a controller name or action in the hook name and you can't find it, try searching for a part of the hook name, like `FormModifier`.
{{% /notice %}}

{{% funcdef %}}

<div id="hookFilter" class="quickfilter">
  <label for="filter">Search hooks</label>
  <input type="text" name="filter" id="filter" placeholder="Type to filter">
  <p class="empty">No hooks found</p>
</div>

<script src="/js/hookFilter.js"></script>
    
action&lt;AdminControllerClassName>&lt;Action>After
: 
    Called after performing &lt;Action> in any &lt;AdminController>

    Located in: /classes/controller/AdminController.php

    Parameters:
    ```php
    <?php
    array(
      'controller' => (AdminController),
      'return' => (mixed)
    );
    ```
    
action&lt;AdminControllerClassName>&lt;Action>Before
: 
    Called before performing &lt;Action> in any &lt;AdminController>

    Located in: /classes/controller/AdminController.php

    Parameters:
    ```php
    <?php
    array(
      'controller' => (AdminController)
    );
    ```
    
action&lt;AdminControllerClassName>FormModifier
: 
    Called when rendering a form in any &lt;AdminController>

    Located in: /classes/controller/AdminController.php

    Parameters:
    ```php
    <?php
    array(
      'object' => &(ObjectModel),
      'fields' => &(array),
      'fields_value' => &(array),
      'form_vars' => &(array),
    );
    ```
    
action&lt;AdminControllerClassName>ListingFieldsModifier
: 
    Located in: /classes/controller/AdminController.php

    Parameters:
    ```php
    <?php
    array(
      'select' => &(string), 'join' => &(string),
      'where' => &(string),
      'group_by' => &(string),
      'order_by' => &(string),
      'order_way' => &(string),
      'fields' => &(array)
    );
    ```
    
action&lt;AdminControllerClassName>OptionsModifier
: 
    Located in: /classes/controller/AdminController.php

    Parameters:
    ```php
    <?php
    array(
      'options' => &(array),
      'option_vars' => &(array),
    );
    ```
    
actionAdmin&lt;Action>After
: 
    Called after performing &lt;Action> in any admin controller

    Located in: /classes/controller/AdminController.php

    Parameters:
    ```php
    <?php
    array(
      'controller' => (AdminController),
      'return' => (mixed)
    );
    ```
    
actionAdmin&lt;Action>Before
: 
    Called before performing &lt;Action> in any admin controller

    Located in: /classes/controller/AdminController.php

    Parameters:
    ```php
    <?php
    array(
      'controller' => (AdminController)
    );
    ```
    
actionAdminControllerSetMedia
: 
    Located in: /classes/controller/AdminController.php

    Parameters: N/A
    
actionAdminLoginControllerSetMedia
: 
    Called after adding media to admin login page header

    Located in: /controllers/admin/AdminLoginController.php

    Parameters: N/A
    
actionAdminMetaAfterWriteRobotsFile
: 
    Called after generating the robots.txt file

    Located in: /classes/Tools.php

    Parameters:
    ```php
    <?php
    array(
      'rb_data' => (array) File data,
      'write_fd' => &(resource) File handle
    );
    ```
    
actionAdminMetaBeforeWriteRobotsFile
: 
    Called before generating the robots.txt file

    Located in: /classes/Tools.php

    Parameters:
    ```php
    <?php
    array(
      'rb_data' => &(array) File data
    );
    ```
    
actionAdminMetaSave
: 
    Called after saving the configuration in AdminMeta

    Located in: /controllers/admin/AdminMetaController.php for PrestaShop < 1.7.6

    Parameters: N/A

    Removed in PrestaShop 1.7.6, replacement hooks are `action<HookName>(Form|Save)`
    
actionAdminOrdersTrackingNumberUpdate
: 
    Located in: /controllers/admin/AdminOrdersController.php for PrestaShop < 1.7.7
    Located in: /src/Adapter/Order/CommandHandler/UpdateOrderShippingDetailsHandler.php since 1.7.7

    Parameters:
    ```php
    <?php
    array(
      'order' => (Order),
      'customer' => (Customer),
      'carrier' => (Carrier)
    );
    ```
    
actionAdminProductsListingFieldsModifier
: 
    Located in: /src/Adapter/Product/AdminProductDataProvider.php

    Parameters:
    ```php
    <?php
    array(
      '_ps_version' => (string) PrestaShop version,
      'sql_select' => &(array),
      'sql_table' => &(array),
      'sql_where' => &(array),
      'sql_order' => &(array),
      'sql_limit' => &(string),
    );
    ```
    
actionAdminProductsListingResultsModifier
: 
    Located in: /src/Adapter/Product/AdminProductDataProvider.php

    Parameters:
    ```php
    <?php
    array(
      '_ps_version' => (string) PrestaShop version,
      'products' => &(PDOStatement),
      'total' => (int),
    );
    ```
    
actionAdminThemesControllerUpdate_optionsAfter
: 
    Located in: /controllers/admin/AdminThemesController.php for PrestaShop < 1.7.6

    Parameters: N/A

    Removed in PrestaShop 1.7.6, replacement hooks are `action(Before|After)(Create|Update)<FormName>FormHandler`
    
actionAjaxDie&lt;ControllerName>&lt;Method>Before
: 
    Located in: /classes/controller/Controller.php

    Parameters:
    ```php
    <?php
    array(
      'value' => (string)
    );
    ```
    
actionAjaxDieBefore
: 
    **(deprecated since 1.6.1.1)**
    
    Located in: /classes/controller/Controller.php

    
actionAttributeCombinationDelete
: 
    Located in: /classes/Combination.php

    
actionAttributeCombinationSave
: 
    Located in: /classes/Combination.php

    
actionAttributeDelete
: 
    Called when deleting an attributes features value

    Located in: /classes/Attribute.php

    
actionAttributeGroupDelete
: 
    Called while deleting an attributes group

    Located in: /classes/AttributeGroup.php

    
actionAttributeGroupSave
: 
    Called while saving an attributes group

    Located in: /classes/AttributeGroup.php

    
actionAttributeSave
: 
    Called while saving an attributes features value

    Located in: /classes/Attribute.php

    
actionAuthentication
: 
    After successful customer authentication

    Located in: /classes/form/CustomerLoginForm.php

    
actionAuthenticationBefore
: 
    Before a customer successfully signs in

    Located in: /classes/form/CustomerLoginForm.php

    
actionBeforeAjaxDie&lt;ControllerName>&lt;Method>
: 
    **(deprecated since 1.6.1.1)**
    → `actionAjaxDie<ControllerName><Method>Before`

    Located in: /classes/controller/Controller.php

    
actionBeforeCartUpdateQty
: 
    **(deprecated since 1.6.1.1)**
    → `actionCartUpdateQuantityBefore`
    
    Located in: /classes/Cart.php

    
actionCarrierProcess
: 
    Carrier process

    Located in: /classes/checkout/CheckoutDeliveryStep.php

    
actionCarrierUpdate
: 
    This hook is called when a carrier is updated

    Located in: 

    - /controllers/admin/AdminCarrierWizardController.php
    - /controllers/admin/AdminCarriersController.php

    
actionCartSave
: 
    After a product is added to the cart or if the cart's content is modified

    Located in: /classes/Cart.php

    
actionCartSummary
: 
    Located in: /classes/Cart.php

    
actionCartUpdateQuantityBefore
: 
    Located in: /classes/Cart.php

    
actionCategoryAdd
: 
    Invoked when a category is created

    Located in: /classes/Category.php

    
actionCategoryDelete
: 
    Invoked when a category is deleted

    Located in: /classes/Category.php

    
actionCategoryUpdate
: 
    Invoked when a category is modified

    Located in: 

    - /classes/Category.php
    - /controllers/admin/AdminProductsController.php

    
actionClearCache
: 
    Available since: {{< minver v="1.7.1" >}}

    Invoked when the smarty cache is cleared

    Located in: /classes/Tools.php

    
actionClearCompileCache
: 
    Available since: {{< minver v="1.7.1" >}}

    Invoked when the smarty compile cache is cleared

    Located in: /classes/Tools.php

    
actionClearSf2Cache
: 
    Available since: {{< minver v="1.7.1" >}}

    Invoked when the Symfony cache is cleared

    Located in: /classes/Tools.php

    
actionCustomerAccountAdd
: 
    Invoked when a new customer creates an account successfully

    Located in: /classes/form/CustomerPersister.php

    Parameters:
    ```php
    <?php
    array(
      'newCustomer' => (object) Customer object
    );
    ```
    
actionCustomerAccountUpdate
: 
    Invoked when a customer updates its account successfully

    Located in: /classes/form/CustomerPersister.php

    
actionCustomerAddGroups
: 
    Located in: /classes/Customer.php

    
actionCustomerBeforeUpdateGroup
: 
    Located in: /classes/Customer.php

    
actionCustomerLogoutAfter
: 
    Located in: /classes/Customer.php

    
actionCustomerLogoutBefore
: 
    Located in: /classes/Customer.php

    
actionDeliveryPriceByPrice
: 
    Located in: /classes/Carrier.php

    
actionDeliveryPriceByWeight
: 
    Located in: /classes/Carrier.php

    
actionDispatcher
: 
    Located in: /classes/Dispatcher.php

    
actionDispatcherAfter
: 
    Available since: {{< minver v="1.7.1" >}}

    This hook is called at the end of the dispatch method of the Dispatcher

    Located in: /classes/Dispatcher.php

    
actionDispatcherBefore
: 
    Available since: {{< minver v="1.7.1" >}}

    This hook is called at the beginning of the dispatch method of the Dispatcher

    Located in: /classes/Dispatcher.php

    
actionDownloadAttachment
: 
    Located in: /controllers/front/AttachmentController.php

    
actionEmailAddAfterContent
: 
    Add extra content after mail content
This hook is called just after fetching mail template

    Located in: /classes/Mail.php

    
actionEmailAddBeforeContent
: 
    Add extra content before mail content
This hook is called just before fetching mail template

    Located in: /classes/Mail.php

    
actionEmailSendBefore
: 
    Before sending an email
This hook is used to filter the content or the metadata of an email before sending it or even prevent its sending

    Located in: /classes/Mail.php

    
actionFeatureDelete
: 
    This hook is called while deleting an attributes features

    Located in: /classes/Feature.php

    
actionFeatureSave
: 
    This hook is called while saving an attributes features

    Located in: /classes/Feature.php

    
actionFeatureValueDelete
: 
    This hook is called while deleting an attributes features value

    Located in: /classes/FeatureValue.php

    
actionFeatureValueSave
: 
    This hook is called while saving an attributes features value

    Located in: /classes/FeatureValue.php

actionFrontControllerAfterInit
:  
    **(Deprecated in 1.7.7 in favor of)**
    → `actionFrontControllerInitAfter`
    
actionFrontControllerInitAfter
: 
    Available since: {{< minver v="1.7.7" >}}
    
    Located in: /classes/controller/FrontController.php

actionFrontControllerInitBefore
: 
    Available since: {{< minver v="1.7.7" >}}
    
    Located in: /classes/controller/FrontController.php


actionFrontControllerSetMedia
: 
    Located in: /classes/controller/FrontController.php
    
actionFrontControllerSetVariables
: 
    Available since: {{< minver v="1.7.5" >}}
    
    Add global variables to `javascript` object and `smarty` templates. Available in Front Office only.

    Located in: /classes/controller/FrontController.php
    
    Parameters since {{< minver v="1.7.7" >}}
    
    ```php
      <?php
      array(
        'templateVars' => &(array)
      );
    ```
    
    Example usage:
    
    Your hook implementation should return array of values that will be added to `prestashop` object in `javascript` and `$modules` object in `smarty`.
    
    ```php
    <?php
    public function hookActionFrontControllerSetVariables()
    {
        return [
            'your_variable_name' => 'Your variable value',
        ];
    }
    ```
    
    In Front Office you can access it globally using:
    
    ```javascript
    console.log(prestashop.modules.your_module_name.your_variable_name);
    "Hello world"
    ```
    
    with smarty
    
    ```smarty
    {$modules.your_module_name.your_variable_name};
    ```    
    
    
actionGetExtraMailTemplateVars
: 
    Located in: /classes/Mail.php

    
actionGetIDZoneByAddressID
: 
    Located in: /classes/Address.php

    
actionGetProductPropertiesAfter
: 
    Located in: /classes/Product.php

    
actionGetProductPropertiesBefore
: 
    Located in: /classes/Product.php

    
actionHtaccessCreate
: 
    After .htaccess creation

    Located in: /classes/Tools.php

    
actionInvoiceNumberFormatted
: 
    Located in: /classes/order/OrderInvoice.php

    
actionModuleInstallAfter
: 
    Located in: /classes/module/Module.php

    
actionModuleInstallBefore
: 
    Located in: /classes/module/Module.php

    
actionModuleRegisterHookAfter
: 
    Located in: /classes/Hook.php

    
actionModuleRegisterHookBefore
: 
    Located in: /classes/Hook.php

    
actionModuleUnRegisterHookAfter
: 
    Located in: /classes/Hook.php

    
actionModuleUnRegisterHookBefore
: 
    Located in: /classes/Hook.php

    
actionObject
: 
    Located in: /classes/ObjectModel.php

    
actionObjectAddAfter
: 
    Located in: /classes/ObjectModel.php

    
actionObjectAddBefore
: 
    Located in: /classes/ObjectModel.php

    
actionObjectAttributeAddBefore
: 
    Located in: /controllers/admin/AdminAttributesGroupsController.php

    
actionObjectAttributeGroupAddBefore
: 
    Located in: /controllers/admin/AdminAttributesGroupsController.php

    
actionObjectDeleteAfter
: 
    Located in: /classes/ObjectModel.php
    
    
actionObjectDeleteBefore
: 
    Located in: /classes/ObjectModel.php


actionObject&lt;ObjectName>AddBefore
: 
    Located in: /classes/ObjectModel.php

actionObject&lt;ObjectName>AddAfter
: 
    Located in: /classes/ObjectModel.php


actionObject&lt;ObjectName>UpdateBefore
: 
    Located in: /classes/ObjectModel.php
    
    
actionObject&lt;ObjectName>UpdateAfter
: 
    Located in: /classes/ObjectModel.php


actionObject&lt;ObjectName>DeleteBefore
: 
    Located in: /classes/ObjectModel.php


actionObject&lt;ObjectName>DeleteAfter
: 
    Located in: /classes/ObjectModel.php
 
 
actionObjectProductInCartDeleteAfter
: 
    Available since: {{< minver v="1.7.1" >}}

    This hook is called after a product is removed from a cart

    Located in: /controllers/front/CartController.php

    
actionObjectProductInCartDeleteBefore
: 
    Available since: {{< minver v="1.7.1" >}}

    This hook is called before a product is removed from a cart

    Located in: /controllers/front/CartController.php

    
actionObjectUpdateAfter
: 
    Located in: /classes/ObjectModel.php

    
actionObjectUpdateBefore
: 
    Located in: /classes/ObjectModel.php

    
actionOnImageCutAfter
: 
    Located in: /classes/ImageManager.php

    
actionOnImageResizeAfter
: 
    Located in: /classes/ImageManager.php

    
actionOrderEdited
: 
    This hook is called when an order is edited

    Located in: /controllers/admin/AdminOrdersController.php

    Parameters:
    ```php
      <?php
        array( 'order' => (object) Order
      );
    ```
    
actionOrderHistoryAddAfter
: 
    This hook is displayed when a customer returns a product

    Located in: /classes/order/OrderHistory.php

    
actionOrderReturn
: 
    Called after a new Order Return has been made.

    Located in: /controllers/front/OrderFollowController.php

    Parameters:
    ```php
    <?php
    array(
      'orderReturn' => (object) OrderReturn
    );
    ```
    
actionOrderSlipAdd
: 
    Called when the quantity of a product changes in an order.
WARNING: only invoked when a product is actually removed from an order.

    Located in: /controllers/admin/AdminOrdersController.php

    Parameters:
    ```php
    <?php
    array(
      'order' => Order,
      'productList' => array(
        (int) product ID 1,
        (int) product ID 2, 
        ...,
        (int) product ID n
      ),
      'qtyList' => array(
        (int) quantity 1,
        (int) quantity 2,
        ...,
        (int) quantity n 
      )
    );
    The order of IDs and quantities is important!
    ```
    
actionOrderStatusPostUpdate
:   
    Called after the status of an order changes.
        
    **Note:** This hook is fired BEFORE the new OrderStatus is saved into the database.  
	If you need to register after this insertion, use `actionOrderHistoryAddAfter` or `actionObjectOrderHistoryAddAfter` instead.

    Located in: /classes/order/OrderHistory.php

    Parameters:
    ```php
    <?php
    array(
      'newOrderStatus' => (object) OrderState,
      'id_order' => (int) Order ID
    );
    ```
    
actionOrderStatusUpdate
: 
    Called before the status of an order changes.

    Located in: /classes/order/OrderHistory.php

    Parameters:
    ```php
    <?php
    array(
      'newOrderStatus' => (object) OrderState,
      'id_order' => (int) Order ID
    );
    ```
    
actionOutputHTMLBefore
: 
    Available since: {{< minver v="1.7.1" >}}

    Before HTML output
This hook is used to filter the whole HTML page before it is rendered (only front)

    Located in: /classes/controller/FrontController.php

    
actionPasswordRenew
: 
    Located in: /controllers/front/PasswordController.php

    
actionPaymentCCAdd
: 
    Payment CC added

    Located in: /classes/order/OrderPayment.php

    Parameters:
    ```php
    <?php
    array(
      'paymentCC' => (object) OrderPayment object
    );
    ```
    
actionPaymentConfirmation
: 
    Called after a payment has been validated

    Located in: /classes/order/OrderHistory.php

    Parameters:
    ```php
    <?php
    array(
      'id_order' => (int) Order ID
    );
    ```
    
actionPDFInvoiceRender
: 
    Located in: 

    - /classes/PaymentModule.php
    - /classes/order/OrderHistory.php
    - /controllers/admin/AdminPdfController.php
    - /controllers/front/PdfInvoiceController.php

    
actionProductAdd
: 
    This hook is displayed after a product is created

    Located in: /controllers/admin/AdminProductsController.php

    
actionProductAttributeDelete
: 
    This hook is displayed when a product's attribute is deleted

    Located in: /classes/Product.php

    
actionProductAttributeUpdate
: 
    This hook is displayed when a product's attribute is updated

    Located in: /classes/Product.php

    
actionProductCancel
: 
    This hook is called when you cancel a product in an order

    Located in: /controllers/admin/AdminOrdersController.php

    
actionProductCoverage
: 
    Located in: /classes/stock/StockManager.php

    
actionProductDelete
: 
    This hook is called when a product is deleted

    Located in: /classes/Product.php

    
actionProductOutOfStock
: 
    This hook displays new action buttons if a product is out of stock

    Located in: 

    - /themes/classic/templates/catalog/_partials/product-details.tpl
    - /themes/classic/templates/catalog/product.tpl

    
actionProductSave
: 
    This hook is called while saving products

    Located in: /classes/Product.php

    
actionProductSearchAfter
: 
    Available since: {{< minver v="1.7.1" >}}

    This hook is called after the product search. Parameters are already filter

    Located in: /classes/controller/ProductListingFrontController.php

    
actionProductUpdate
: 
    This hook is displayed after a product has been updated

    Located in: 

    - /classes/Product.php
    - /controllers/admin/AdminProductsController.php
    
    
actionProductFlagsModifier
: 
    Available since: {{< minver v="1.7.6" >}}
    
    Add and remove product labels available on product list

    Located in: /src/Adapter/Presenter/Product/ProductLazyArray.php
    
    Parameters:
    ```php
    <?php
    array(
        'flags' => (array) &$flags,
        'product' => (Product) $product,
    ),
    ```
    
    
actionSearch
: 
    Available since: {{< minver v="1.7.1" >}}

    After the search in the store. Includes both instant and normal search.

    Located in: /src/Adapter/Search/SearchProductSearchProvider.php

    Parameters:
    ```php
    <?php
    array(
      'expr' => (string) Search query,
      'total' => (int) Amount of search results
    );
    ```
    
actionSetInvoice
: 
    Located in: /classes/order/Order.php
    Parameters:
    ```php
    <?php
    array(
      'Order' => order object,
      'OrderInvoice' => order invoice object,
      'use_existing_payment' => (bool)
    );
    ```

    
actionShopDataDuplication
: 
    After duplicating a shop.

    Located in: /classes/shop/Shop.php

    Parameters:
    ```php
    <?php
    array(
      'old_id_shop' => (int) Old shop ID,
      'new_id_shop' => (int) New shop ID
    );
    ```
    
actionSubmitAccountBefore
: 
    Available since: {{< minver v="1.7.1" >}}

    Located in: /controllers/front/AuthController.php

    
actionUpdateLangAfter
: 
    Available since: {{< minver v="1.7.1" >}}

    Update "lang" tables after adding or updating a language

    Located in: /classes/Language.php

    
actionUpdateQuantity
: 
    After updating the quantity of a product.
Quantity is updated only when a customer effectively places their order

    Located in: /classes/stock/StockAvailable.php

    Parameters:
    ```php
    <?php
    array(
      'id_product' => (int) Product ID,
      'id_product_attribute' => (int) Product attribute ID,
      'quantity' => (int) New product quantity
    );
    ```
    
actionValidateCustomerAddressForm
: 
    This hook is called when a customer submit its address form

    Located in: /classes/form/CustomerAddressForm.php

    Parameters:
    ```php
    <?php
    array(
      'form' => (object) CustomerAddressForm
    );
    ```
    
actionValidateOrder
: 
    After an order has been validated.
    Doesn't necessarily have to be paid.

    Located in: /classes/PaymentModule.php

    Parameters:
    ```php
    <?php
    array(
      'cart' => (object) Cart,
      'order' => (object) Order,
      'customer' => (object) Customer,
      'currency' => (object) Currency,
      'orderStatus' => (object) OrderState
    );
    ```

actionValidateOrderAfter
:   
    This hook is called after validating an order by core

    Located in: /classes/PaymentModule.php

    Parameters:
    ```php
    <?php
    array(
      'cart' => (object) Cart,
      'order' => (object) Order,
      'customer' => (object) Customer,
      'currency' => (object) Currency,
      'orderStatus' => (object) OrderState
    );
    ```

actionValidateStepComplete
: 
    This hook is called on checkout page, when confirming delivery section. Carrier modules that display extra content to the customer can hook here and prevent him from advancing further, if he didn't enter required information. 
    
    Be aware that the hook will only be called for a module specified in `external_module_name` property of the carrier.

    Located in: /classes/checkout/CheckoutDeliveryStep.php

    Parameters:
    ```php
    <?php
    array(
      'step_name' => 'delivery',
      'request_params' => $requestParams,
      'completed' => &$isComplete,
    );
    ```
    
    Usage:
    ```php
    <?php
    public function hookActionValidateStepComplete($params)
    {
        if ( --- your logic --- ) {
            $this->context->controller->errors[] = $this->l('Please select a pickup branch!');
            $params['completed']  = false;
        }
    }
    ```
    
actionWatermark
: 
    After a watermark has been added to an image.

    Located in: 

    - /classes/FileUploader.php
    - /classes/webservice/WebserviceSpecificManagementImages.php
    - /controllers/admin/AdminImportController.php
    - /controllers/admin/AdminProductsController.php

    Parameters:
    ```php
    <?php
    array(
      'id_image' => (int) Image ID,
      'id_product' => (int) Product ID
    );
    ```
    
actionGetAdminOrderButtons
: 
    Available since: {{< minver v="1.7.7" >}}

    This hook is used to generate the buttons collection on the order view page (see ActionsBarButtonsCollection)

    Located in: /src/PrestaShopBundle/Controller/Admin/Sell/Order/OrderController.php

    Parameters:
    ```php
    <?php
    array(
       'controller' => (OrderController) Symfony controller,
       'id_order' => (int) Order ID,
       'actions_bar_buttons_collection' => (ActionsBarButtonsCollection) Collection of ActionsBarButtonInterface
    );
    ```


actionAdminAdminPreferencesControllerPostProcessBefore
: 
    Available since: {{< minver v="1.7.7" >}}

    This hook is called on Admin Preferences post-process before processing the form

    Located in: /src/PrestaShopBundle/Controller/Admin/Configure/AdvancedParameters/AdministrationController.php

    Parameters:
    ```php
    <?php
    [
        'controller' => (AdministrationController) Symfony controller,
    ]
    ```


additionalCustomerFormFields
: 
    Add fields to the Customer form
This hook returns an array of FormFields to add them to the customer registration form

    Located in: /classes/form/CustomerFormatter.php

    
addWebserviceResources
: 
    This hook is called when webservice resources list in webservice controller

    Located in: /classes/webservice/WebserviceRequest.php

    
dashboardData
: 
    Located in: /controllers/admin/AdminDashboardController.php

    
dashboardZoneOne
: 
    Located in: /controllers/admin/AdminDashboardController.php

    
dashboardZoneTwo
: 
    Located in: /controllers/admin/AdminDashboardController.php

    
displayAdminAfterHeader
: 
    Located in: 

    - admin-dev/themes/default/template/header.tpl
    - admin-dev/themes/new-theme/template/layout.tpl

    
displayAdminCustomers
: 
    Display new elements in the Back Office, tab AdminCustomers
This hook launches modules when the AdminCustomers tab is displayed in the Back Office

    Located in: admin-dev/themes/default/template/controllers/customers/helpers/view/view.tpl

    Parameters:
    ```php
    <?php
    array(
      'id_customer' = (int) Customer ID
    );
    ```
    

displayAdminCustomersAddressesItemAction
: 
    Available since: {{< minver v="1.7.3" >}}

    Display new elements in the Back Office, tab AdminCustomers, Addresses actions.
This hook launches modules when the Addresses list into the AdminCustomers tab is displayed in the Back Office

    Located in: /admin-dev/themes/default/template/controllers/customers/helpers/view/view.tpl

    Parameters:
    ```php
    <?php
	array(
	  'id_address' => (int) Address ID
	)
    ```


displayAdminEndContent
: 
    Available since: {{< minver v="1.7.4" >}}

    Administration end of content.
This hook is displayed at the end of the main content, before the footer

    Located in: 
	- /admin-dev/themes/default/template/footer.tpl
	- /admin-dev/themes/new-theme/template/layout.tpl

	
displayAdminForm
: 
    Located in: admin-dev/themes/default/template/helpers/form/form.tpl

displayAdminGridTableBefore
: 
    Available since: {{< minver v="1.7.8" >}}

    This hook adds new blocks before Grid component table.

    Located in: src/PrestaShopBundle/Resources/views/Admin/Common/Grid/Blocks/table.html.twig

    Parameters:
    ```php
    <?php
    array(
      'grid' = Grid $grid,
      'controller' => (string) $controller
      'legacy_controller' => (string) $legacyController
    );
    ```

displayAdminGridTableAfter
: 
    Available since: {{< minver v="1.7.8" >}}
    
    This hook adds new blocks after Grid component table.

    Located in: src/PrestaShopBundle/Resources/views/Admin/Common/Grid/Blocks/table.html.twig

    Parameters:
    ```php
    <?php
    array(
      'grid' = Grid $grid,
      'controller' => (string) $controller
      'legacy_controller' => (string) $legacyController
    );
    ```

    
displayAdminListAfter
: 
    Located in: 

    - admin-dev/themes/default/template/controllers/countries/helpers/list/list_footer.tpl
    - admin-dev/themes/default/template/controllers/tax_rules/helpers/list/list_footer.tpl
    - admin-dev/themes/default/template/helpers/list/list_footer.tpl

    
displayAdminListBefore
: 
    Located in: 

    - admin-dev/themes/default/template/controllers/tax_rules/helpers/list/list_header.tpl
    - admin-dev/themes/default/template/helpers/list/list_header.tpl

    
displayAdminLogin
: 
    Located in: admin-dev/themes/default/template/controllers/login/content.tpl

    
displayAdminNavBarBeforeEnd
: 
    Display new elements in the Back Office, tab AdminCustomers
This hook launches modules when the AdminCustomers tab is displayed in the Back Office

    Located in: 

    - admin-dev/themes/default/template/nav.tpl
    - admin-dev/themes/new-theme/template/components/layout/nav_bar.tpl

    
displayAdminOptions
: 
    Located in: admin-dev/themes/default/template/helpers/options/options.tpl

    
displayAdminOrder
: 
    Display new elements in the Back Office, tab AdminOrder
This hook launches modules when the AdminOrder tab is displayed in the Back Office

    Located in:

        - admin-dev/themes/default/template/controllers/orders/helpers/view/view.tpl
        - src/PrestaShopBundle/Resources/views/Admin/Sell/Order/Order/view.html.twig

    Parameters:
    ```php
    <?php
    array(
     'id_order' = (int) Order ID
    );
    ```
    
displayAdminOrderContentOrder
: 
    **(removed in 1.7.7 in favor of)**
    → `displayAdminOrderTabContent`

    Display new elements in Back Office, AdminOrder, panel Order
This hook launches modules when the AdminOrder tab is displayed in the Back Office and extends / override Order panel content

    Located in: /controllers/admin/AdminOrdersController.php

    
displayAdminOrderContentShip
: 
    **(removed in 1.7.7 in favor of)**
    → `displayAdminOrderTabContent`

    Display new elements in Back Office, AdminOrder, panel Shipping
This hook launches modules when the AdminOrder tab is displayed in the Back Office and extends / override Shipping panel content

    Located in: /controllers/admin/AdminOrdersController.php


displayAdminOrderTabContent
: 
    Available since: {{< minver v="1.7.7" >}}

    This hook displays new tab contents on the order view page

    Located in: /src/PrestaShopBundle/Resources/views/Admin/Sell/Order/Order/Blocks/View/details.html.twig

    Parameters:
    ```php
    <?php
    array(
      'id_order' => (int) Order ID
    );
    ```

    
displayAdminOrderLeft
: 
    **(removed in 1.7.7 in favor of)**
    → `displayAdminOrderMain`

    Located in: admin-dev/themes/default/template/controllers/orders/helpers/view/view.tpl


displayAdminOrderMain
: 
    Available since: {{< minver v="1.7.7" >}}

    This hook displays content in the order view page in the main column under the details view

    Located in: /src/PrestaShopBundle/Resources/views/Admin/Sell/Order/Order/view.html.twig

    Parameters:
    ```php
    <?php
    array(
      'id_order' => (int) Order ID
    );
    ```


displayAdminOrderMainBottom
: 
    Available since: {{< minver v="1.7.7" >}}

    This hook displays content in the order view page at the bottom of the main column

    Located in: /src/PrestaShopBundle/Resources/views/Admin/Sell/Order/Order/view.html.twig

    Parameters:
    ```php
    <?php
    array(
      'id_order' => (int) Order ID
    );
    ```


displayAdminOrderRight
: 
    **(removed in 1.7.7 in favor of)**
    → `displayAdminOrderSide`

    Located in: admin-dev/themes/default/template/controllers/orders/helpers/view/view.tpl


displayAdminOrderSide
: 
    Available since: {{< minver v="1.7.7" >}}

    This hook displays content in the order view page in the side column under the customer view

    Located in: /src/PrestaShopBundle/Resources/views/Admin/Sell/Order/Order/view.html.twig

    Parameters:
    ```php
    <?php
    array(
      'id_order' => (int) Order ID
    );
    ```


displayAdminOrderSideBottom
: 
    Available since: {{< minver v="1.7.7" >}}

    This hook displays content in the order view page at the bottom of the side column

    Located in: /src/PrestaShopBundle/Resources/views/Admin/Sell/Order/Order/view.html.twig

    Parameters:
    ```php
    <?php
    array(
      'id_order' => (int) Order ID
    );
    ```


displayAdminOrderTabOrder
: 
    **(removed in 1.7.7 in favor of)**
    → `displayAdminOrderTabLink`

    Display new elements in Back Office, AdminOrder, panel Order
This hook launches modules when the AdminOrder tab is displayed in the Back Office and extends / override Order panel tabs

    Located in: /controllers/admin/AdminOrdersController.php

    
displayAdminOrderTabShip
: 
    **(removed in 1.7.7 in favor of)**
    → `displayAdminOrderTabLink`

    Display new elements in Back Office, AdminOrder, panel Shipping
This hook launches modules when the AdminOrder tab is displayed in the Back Office and extends / override Shipping panel tabs

    Located in: /controllers/admin/AdminOrdersController.php

displayAdminOrderTabLink
: 
    Available since: {{< minver v="1.7.7" >}}

    This hook displays new tab links on the order view page

    Located in: /src/PrestaShopBundle/Resources/views/Admin/Sell/Order/Order/Blocks/View/details.html.twig

    Parameters:
    ```php
    <?php
    array(
      'id_order' => (int) Order ID
    );
    ```

    
displayAdminProductsExtra
: 
    
displayAdminProductsCombinationBottom
: 
    Located in: /src/PrestaShopBundle/Resources/views/Admin/Product/Include/form_combination.html.twig

    
displayAdminProductsMainStepLeftColumnBottom
: 
    Display new elements in back office product page, left column of
This hook launches modules when the back office product page is displayed

    Located in: /src/PrestaShopBundle/Resources/views/Admin/Product/form.html.twig

    
displayAdminProductsMainStepLeftColumnMiddle
: 
    Display new elements in back office product page, left column of
This hook launches modules when the back office product page is displayed

    Located in: /src/PrestaShopBundle/Resources/views/Admin/Product/form.html.twig

    
displayAdminProductsMainStepRightColumnBottom
: 
    Display new elements in back office product page, right column of
This hook launches modules when the back office product page is displayed

    Located in: /src/PrestaShopBundle/Resources/views/Admin/Product/form.html.twig

    
displayAdminProductsOptionsStepBottom
: 
    Display new elements in back office product page, Options tab
This hook launches modules when the back office product page is displayed

    Located in: /src/PrestaShopBundle/Resources/views/Admin/Product/form.html.twig

    
displayAdminProductsOptionsStepTop
: 
    Display new elements in back office product page, Options tab
This hook launches modules when the back office product page is displayed

    Located in: /src/PrestaShopBundle/Resources/views/Admin/Product/form.html.twig

    
displayAdminProductsPriceStepBottom
: 
    Display new elements in back office product page, Price tab
This hook launches modules when the back office product page is displayed

    Located in: /src/PrestaShopBundle/Resources/views/Admin/Product/form.html.twig

    
displayAdminProductsQuantitiesStepBottom
: 
    Display new elements in back office product page, Quantities/Com
This hook launches modules when the back office product page is displayed

    Located in: /src/PrestaShopBundle/Resources/views/Admin/Product/form.html.twig

    
displayAdminProductsSeoStepBottom
: 
    Display new elements in back office product page, SEO tab
This hook launches modules when the back office product page is displayed

    Located in: /src/PrestaShopBundle/Resources/views/Admin/Product/Include/form_seo.html.twig

    
displayAdminProductsShippingStepBottom
: 
    Display new elements in back office product page, Shipping tab
This hook launches modules when the back office product page is displayed

    Located in: /src/PrestaShopBundle/Resources/views/Admin/Product/Include/form_shipping.html.twig

    
displayAdminStatsModules
: 
    Located in: /controllers/admin/AdminStatsTabController.php

    
displayAdminView
: 
    Located in: admin-dev/themes/default/template/helpers/view/view.tpl

    
displayAfterBodyOpeningTag
: 
    Very top of pages
Use this hook for advertisement or modals you want to load first

    Located in: 

    - /themes/classic/templates/checkout/checkout.tpl
    - /themes/classic/templates/layouts/layout-both-columns.tpl

    
displayAfterCarrier
: 
    After carriers list
This hook is displayed after the carrier list in Front Office

    Located in: /classes/checkout/CheckoutDeliveryStep.php

    
displayAfterProductThumbs
: 
    Available since: {{< minver v="1.7.1" >}}

    Display extra content below product thumbs
This hook displays new elements below product images ex. additional media

    Located in: /themes/classic/templates/catalog/_partials/product-cover-thumbnails.tpl

    
displayAfterThemeInstallation
: 
    Located in: admin-dev/themes/default/template/controllers/themes/helpers/view/view.tpl

    
displayAttributeForm
: 
    Add fields to the form 'attribute value'
This hook adds fields to the form 'attribute value'

    Located in: admin-dev/themes/default/template/controllers/attributes/helpers/form/form.tpl

    
displayAttributeGroupForm
: 
    Add fields to the form 'attribute group'
This hook adds fields to the form 'attribute group'

    Located in: admin-dev/themes/default/template/controllers/attributes_groups/helpers/form/form.tpl

    
displayBackOfficeCategory
: 
    Display new elements in the Back Office, tab AdminCategories
This hook launches modules when the AdminCategories tab is displayed in the Back Office

    Located in: /controllers/admin/AdminCategoriesController.php

    
displayBackOfficeFooter
: 
    **(deprecated since 1.7.0.0)**

    Displayed within the admin panel's footer

    Located in: 

    - admin-dev/themes/default/template/footer.tpl
    - admin-dev/themes/new-theme/template/footer.tpl

    
displayBackOfficeHeader
: 
    Displayed between the &lt;head>&lt;/head> tags on every Back Office page (when logged in).

    Located in: /classes/controller/AdminController.php

    
displayBackOfficeOrderActions
: 
    **(deprecated since 1.7.7)**
    → `actionGetAdminOrderButtons`

    This hook displays content in the order view page after action buttons

    Since the version **1.7.7** this hook no longer exists, an alias on the new `displayAdminOrderSide` exists but it is not displayed the same way, so it is recommended to use the dedicated `actionGetAdminOrderButtons` hook to add buttons
    
    Located in: admin-dev/themes/default/template/controllers/orders/helpers/view/view.tpl

    
displayBackOfficeTop
: 
    Shown above the actual content of a Back Office page

    Located in: /classes/controller/AdminController.php

    
displayBanner
: 
    Available since: {{< minver v="1.7.1" >}}

    Located in: /themes/classic/templates/_partials/header.tpl

    
displayBeforeBodyClosingTag
: 
    Very bottom of pages
Use this hook for your modals or any content you want to load at the very end

    Located in: 

    - /themes/classic/templates/checkout/checkout.tpl
    - /themes/classic/templates/layouts/layout-both-columns.tpl

    
displayBeforeCarrier
: 
    This hook is displayed before the carrier list on the Front Office

    Located in: /classes/checkout/CheckoutDeliveryStep.php

    Parameters:
    ```php
    <?php
    array(
        'carriers' => array(
            array(
                'name' => (string) Name,
                'img' => (string) Image URL,
                'delay' => (string) Delay text,
                'price' =>  (float) Total price with tax,
                'price_tax_exc' => (float) Total price without tax,
                'id_carrier' => (int) intified option delivery identifier,
                'id_module' => (int) Module ID
        )),
        'checked' => (int) intified selected carriers,
        'delivery_option_list' => array(array(
            0 => array( // First address
                '12,' => array( // First delivery option available for this address
                     carrier_list => array(
                         12 => array( // First carrier for this option
                             'instance' => Carrier Object,
                             'logo' => <url to the carrier's logo>,
                             'price_with_tax' => 12.4, // Example
                             'price_without_tax' => 12.4, // Example
                             'package_list' => array(
                                 1, // Example
                                 3, // Example
                              ),
                         ),
                     ),
                     is_best_grade => true, // Does this option have the biggest grade (quick shipping) for this shipping address
                     is_best_price => true, // Does this option have the lower price for this shipping address
                     unique_carrier => true, // Does this option use a unique carrier
                     total_price_with_tax => 12.5,
                     total_price_without_tax => 12.5,
                     position => 5, // Average of the carrier position
                 ),
             ),
         )),
         'delivery_option' => array(
             '<id_address>' => Delivery option,
             ...
         )
    );
    ```
    NOTE: intified means an array of integers 'intified' by Cart::intifier
    
displayCarrierExtraContent
: 
    Displays additional content for a carrier. It can be used for selecting pickup points, delivery time etc. This hook calls only the module related to the carrier, in order to add options only when needed. Your module name must be specified in `external_module_name` property of the carrier, otherwise it won't be called.

    Located in: /classes/checkout/DeliveryOptionsFinder.php

    
displayCarrierList
: 
    **(deprecated since 1.7.0.0)**
    
    Display extra carriers in the carrier list.

    Located in: /classes/Cart.php

    Parameters:
    ```php
    <?php
    array(
      'address' => (object) Address object
    );
    ```
    
displayCartExtraProductActions
: 
    Extra buttons in shopping cart
This hook adds extra buttons to the product lines, in the shopping cart

    Located in: /themes/classic/templates/checkout/_partials/cart-detailed-product-line.tpl

displayCartModalContent
: 
    Available since: {{< minver v="1.7.8" >}}
    
    Content of Add-to-cart modal
This hook displays content in the middle of the window that appears after adding product to cart

    Located in: /themes/classic/modules/ps_shoppingcart/modal.tpl

displayCartModalFooter
: 
    Available since: {{< minver v="1.7.8" >}}
    
    Bottom of Add-to-cart modal 
This hook displays content in the bottom of window that appears after adding product to cart

    Located in: /themes/classic/modules/ps_shoppingcart/modal.tpl

displayCheckoutSubtotalDetails
: 
    Located in: /themes/classic/templates/checkout/_partials/cart-detailed-totals.tpl

    
displayCheckoutSummaryTop
: 
    Located in: /themes/classic/templates/checkout/_partials/cart-summary.tpl

    
displayCMSDisputeInformation
: 
    Located in: /themes/classic/templates/cms/page.tpl

    
displayCMSPrintButton
: 
    Located in: /themes/classic/templates/cms/page.tpl

    
displayContentWrapperBottom
: 
    Content wrapper section (bottom)
This hook displays new elements in the bottom of the content wrapper

    Located in: 

    - themes/classic/templates/layouts/layout-both-columns.tpl
    - themes/classic/templates/layouts/layout-content-only.tpl
    - themes/classic/templates/layouts/layout-full-width.tpl
    - themes/classic/templates/layouts/layout-left-column.tpl
    - themes/classic/templates/layouts/layout-right-column.tpl

    
displayContentWrapperTop
: 
    Content wrapper section (top)
This hook displays new elements in the top of the content wrapper

    Located in: 

    - themes/classic/templates/layouts/layout-both-columns.tpl
    - themes/classic/templates/layouts/layout-content-only.tpl
    - themes/classic/templates/layouts/layout-full-width.tpl
    - themes/classic/templates/layouts/layout-left-column.tpl
    - themes/classic/templates/layouts/layout-right-column.tpl

    
displayCrossSellingShoppingCart
: 
    Located in: /themes/classic/templates/checkout/cart-empty.tpl

    
displayCustomerAccount
: 
    Displays new elements on the customer account page in Front Office

    Located in: /themes/classic/templates/customer/my-account.tpl

    
displayCustomerAccountForm
: 
    Displays information on the customer account creation form

    Located in: /classes/form/CustomerForm.php

    
displayCustomerAccountFormTop
: 
    Displayed above the customer's account creation form

    Located in: /controllers/front/AuthController.php

    
displayCustomerLoginFormAfter
: 
    Displays new elements after the login form

    Located in: /themes/classic/templates/customer/authentication.tpl

    
displayCustomization
: 
    Located in: /classes/Product.php


displayDashboardToolbarIcons
: 
    Available since: {{< minver v="1.7.3" >}}

    Display new elements in back office page with dashboard, on icons list.
This hook launches modules when the back office with dashboard is displayed

    Located in: 
	- /src/PrestaShopBundle/Resources/views/Admin/Configure/AdvancedParameters/LogsPage/Blocks/actions.html.twig
	- /src/PrestaShopBundle/Resources/views/Admin/Product/CatalogPage/Blocks/tools.html.twig


displayDashboardToolbarTopMenu
: 
    Available since: {{< minver v="1.7.3" >}}

    Display new elements in back office page with a dashboard, on top Menu.
This hook launches modules when a page with a dashboard is displayed

    Located in: 
	- /admin-dev/themes/default/template/page_header_toolbar.tpl
	- /admin-dev/themes/new-theme/template/page_header_toolbar.tpl

    
displayDashboardTop
: 
    Dashboard Top
Displays the content in the dashboard's top area

    Located in: admin-dev/themes/default/template/page_header_toolbar.tpl

    
displayExpressCheckout
: 
    Located in: /themes/classic/templates/checkout/_partials/cart-detailed-actions.tpl

    
displayFeatureForm
: 
    Add fields to the form 'feature'
This hook adds fields to the form 'feature'

    Located in: admin-dev/themes/default/template/controllers/features/helpers/form/form.tpl

    
displayFeaturePostProcess
: 
    On post-process in admin feature
This hook is called on post-process in admin feature

    Located in: /controllers/admin/AdminFeaturesController.php

    
displayFeatureValueForm
: 
    Add fields to the form 'feature value'
This hook adds fields to the form 'feature value'

    Located in: admin-dev/themes/default/template/controllers/feature_value/helpers/form/form.tpl

    
displayFeatureValuePostProcess
: 
    On post-process in admin feature value
This hook is called on post-process in admin feature value

    Located in: /controllers/admin/AdminFeaturesController.php

    
displayFooter
: 
    Displays new blocks in the footer

    Located in: /themes/classic/templates/_partials/footer.tpl

    
displayFooterAfter
: 
    Located in: /themes/classic/templates/_partials/footer.tpl

    
displayFooterBefore
: 
    Located in: /themes/classic/templates/_partials/footer.tpl

    
displayFooterProduct
: 
    Added under the product's description

    Located in: /themes/classic/templates/catalog/product.tpl

    
displayHeader
: 
    Added in the header of every page

    Located in: /classes/controller/FrontController.php

    
displayHome
: 
    Displayed on the content of the home page.

    Located in: /controllers/front/IndexController.php

    
displayInvoice
: 
    **(deprecated since 1.7.7)**
    → `displayAdminOrderTop`

    Invoice
This hook displays new blocks on the invoice (order)

    Located in: admin-dev/themes/default/template/controllers/orders/helpers/view/view.tpl

displayAdminOrderTop
: 
    Available since: {{< minver v="1.7.7" >}}

    This hook displays content at the top of the order view page

    Located in: /src/PrestaShopBundle/Resources/views/Admin/Sell/Order/Order/view.html.twig

    Parameters:
    ```php
    <?php
    array(
      'id_order' => (int) Order ID
    );
    ```


displayInvoiceLegalFreeText
: 
    PDF Invoice - Legal Free Text
This hook allows you to modify the legal free text on PDF invoices

    Located in: /classes/pdf/HTMLTemplateInvoice.php

    
displayLeftColumn
: 
    Displays new elements in the left-hand column

    Located in: /themes/classic/templates/layouts/layout-both-columns.tpl

    
displayLeftColumnProduct
: 
    Displays new elements in the left-hand column of the product page

    Located in: /themes/classic/templates/layouts/layout-both-columns.tpl

    
displayMaintenance
: 
    Maintenance Page
This hook displays new elements on the maintenance page

    Located in: /classes/controller/FrontController.php

    
displayMyAccountBlock
: 
    Displays extra information within the "my account: block

    Located in: /themes/classic/modules/ps_customeraccountlinks/ps_customeraccountlinks.tpl

    
displayNav1
: 
    Located in: 

    - /themes/classic/templates/_partials/header.tpl
    - /themes/classic/templates/checkout/_partials/header.tpl

    
displayNav2
: 
    Located in: 

    - /themes/classic/templates/_partials/header.tpl
    - /themes/classic/templates/checkout/_partials/header.tpl

    
displayNavFullWidth
: 
    Navigation
This hook displays full width navigation menu at the top of your pages

    Located in: 

    - /themes/classic/templates/_partials/header.tpl
    - /themes/classic/templates/checkout/_partials/header.tpl

    
displayNotFound
: 
    Located in: /themes/classic/templates/errors/not-found.tpl

    
displayOrderConfirmation
: 
    Called within an order's confirmation page

    Located in: /controllers/front/OrderConfirmationController.php

    Parameters:
    ```php
    <?php
    array(
      'order' => (object) Order
    );
    ```
    
displayOrderConfirmation1
: 
    Located in: /themes/classic/templates/checkout/order-confirmation.tpl

    
displayOrderConfirmation2
: 
    Located in: /themes/classic/templates/checkout/order-confirmation.tpl

    
displayOrderDetail
: 
    Displayed within the order's details in Front Office

    Located in: 

    - /controllers/front/GuestTrackingController.php
    - /controllers/front/OrderDetailController.php

    Parameters:
    ```php
    <?php
    array(
      'order' => (object) Order object
    );
    ```
    
displayOrderPreview
: 
    Available since: {{< minver v="1.7.7" >}}

    Displayed at the bottom of the order's preview on the order's listing page in Back Office

    Located in: /src/PrestaShopBundle/Resources/views/Admin/Sell/Order/Order/preview.html.twig
    
    Parameters:
    ```php
    <?php
    array(
      'order_id' => (integer) Order Id
    );
    ```
    

displayPaymentByBinaries
: 
    Payment form generated by binaries
This hook displays form generated by binaries during the checkout

    Located in: /themes/classic/templates/checkout/_partials/steps/payment.tpl

    
displayPaymentEU
: 
    Located in: /modules/ps_legalcompliance/ps_legalcompliance.php

    
displayPaymentReturn
: 
    Payment return

    Located in: /controllers/front/OrderConfirmationController.php

    
displayPaymentTop
: 
    Top of payment page
This hook is displayed at the top of the payment page

    Located in: /themes/classic/templates/checkout/_partials/steps/payment.tpl


displayPersonalInformationTop
: 
    Available since: {{< minver v="1.7.6" >}}

    Display actions or additional content in the personal details tab of the checkout funnel.

    Located in: /themes/classic/templates/checkout/_partials/steps/personal-information.tpl


displayProductActions
: 
    Available since: {{< minver v="1.7.6" >}}

    This hook allow additional actions to be displayed & triggered, close to the add to cart button.

    Located in: /themes/classic/templates/catalog/_partials/product-add-to-cart.tpl

    
displayProductAdditionalInfo
: 
    Available since: {{< minver v="1.7.1" >}}

    Product page additional info
This hook adds additional information on the product page

    Located in: 

    - /themes/classic/templates/catalog/_partials/product-additional-info.tpl
    - /themes/classic/templates/catalog/_partials/quickview.tpl

    
displayProductExtraContent
: 
    Available since: {{< minver v="1.7.0" >}}

    Display extra content on the product page.
This hook expects ProductExtraContent instances, which will be properly displayed by the template on the product page

    Located in: /controllers/front/ProductController.php
	
	Parameters:
    ```php
    <?php
    array(
        'product' => (object) Product object
    ),
    ```


displayProductListReviews
: 
    Available since: {{< minver v="1.7.1" >}}

    Located in: /themes/classic/templates/catalog/_partials/miniatures/product.tpl


displayProductPageDrawer
: 
    Available since: {{< minver v="1.7.1" >}}

    Product Page Drawer.
This hook displays content in the right sidebar of the product page

    Located in: /src/PrestaShopBundle/Controller/Admin/ProductController.php

    Parameters:
    ```php
    <?php
    array(
        'product' => (object) Product object
    ),
    ```

    
displayProductPriceBlock
: 
    Located in: 

    - /themes/classic/templates/catalog/_partials/miniatures/product.tpl
    - /themes/classic/templates/catalog/_partials/product-prices.tpl
    - /themes/classic/templates/checkout/_partials/cart-summary-product-line.tpl
    - /themes/classic/templates/checkout/_partials/order-confirmation-table.tpl

    
displayReassurance
: 
    Located in: 

    - /themes/classic/templates/catalog/product.tpl
    - /themes/classic/templates/checkout/cart.tpl
    - /themes/classic/templates/checkout/checkout.tpl

    
displayRightColumn
: 
    Displays new elements in the right-hand column

    Located in: /themes/classic/templates/layouts/layout-both-columns.tpl

    Parameters:
    ```php
    <?php
    array(
      'cart' => (object) Cart object
    );
    ```
    Note that the Cart object can also be retrieved from the current Context.
    
displayRightColumnProduct
: 
    Displays new elements in the right-hand column of the product page

    Located in: /themes/classic/templates/layouts/layout-both-columns.tpl

    
displaySearch
: 
    Located in: /themes/classic/templates/errors/not-found.tpl

    
displayShoppingCart
: 
    Displays new action buttons within the shopping cart

    Located in: /themes/classic/templates/checkout/cart.tpl

    
displayShoppingCartFooter
: 
    Shopping cart footer
This hook displays some specific information on the shopping cart's page

    Located in: /themes/classic/templates/checkout/cart.tpl

    
displayTop
: 
    Top of pages
This hook displays additional elements at the top of your pages

    Located in: 

    - /themes/classic/templates/_partials/header.tpl
    - /themes/classic/templates/checkout/_partials/header.tpl

    
displayWrapperBottom
: 
    Main wrapper section (bottom)
This hook displays new elements in the bottom of the main wrapper

    Located in: 

    - themes/classic/templates/checkout/checkout.tpl
    - themes/classic/templates/layouts/layout-both-columns.tpl

    
displayWrapperTop
: 
    Main wrapper section (top)
This hook displays new elements in the top of the main wrapper

    Located in: 

    - themes/classic/templates/checkout/checkout.tpl
    - themes/classic/templates/layouts/layout-both-columns.tpl

displayAdditionalCustomerAddressFields
: 
    Available since: {{< minver v="1.7.7" >}}

    This hook allows to display extra field values added in an address form using hook 'additionalCustomerAddressFields'

    Located in: /themes/classic/templates/customer/_partials/block-address.tpl

displayFooterCategory
: 
    Available since: {{< minver v="1.7.7" >}}

    This hook adds new blocks under all product listings - in a category, on search page, on bestsellers page etc.

    Located in: /themes/classic/templates/catalog/listing/product-list.tpl


displayHeaderCategory
: 
    Available since: {{< minver v="1.7.8" >}}

    This hook adds new blocks above all product listings - in a category, on search page, on bestsellers page etc.

    Located in: /themes/classic/templates/catalog/listing/product-list.tpl


filterCategoryContent
: 
    Available since: {{< minver v="1.7.1" >}}

    Filter the content page category.
This hook is called just before fetching content page category

    Located in: /controllers/front/listing/CategoryController.php

    Parameters:
    ```php
    <?php
    array(
        'object' => (object) Category object
    ),
    ```

    
filterCmsCategoryContent
: 
    Filter the content page category
This hook is called just before fetching content page category

    Located in: /controllers/front/CmsController.php

    
filterCmsContent
: 
    Filter the content page
This hook is called just before fetching content page

    Located in: /controllers/front/CmsController.php

    
filterHtmlContent
: 
    Filter HTML field before rending a page
This hook is called just before fetching a page on HTML field

    Located in: /src/Adapter/ObjectPresenter.php

    
filterManufacturerContent
: 
    Filter the content page manufacturer
This hook is called just before fetching content page manufacturer

    Located in: /controllers/front/listing/ManufacturerController.php

    
filterProductContent
: 
    Filter the content page product
This hook is called just before fetching content page product

    Located in: /controllers/front/ProductController.php
    
    
filterProductSearch
: 
    Available since: {{< minver v="1.7.1" >}}

    Located in: /classes/controller/ProductListingFrontController.php

    
filterSupplierContent
: 
    Located in: /controllers/front/listing/SupplierController.php

    
moduleRoutes
: 
    Located in: /classes/Dispatcher.php

    
overrideMinimalPurchasePrice
: 
    Located in: 

    - /classes/controller/ModuleFrontController.php
    - /src/Adapter/Cart/CartPresenter.php

    
sendMailAlterTemplateVars
: 
    Located in: /classes/Mail.php

    
termsAndConditions
: 
    Located in: /classes/checkout/ConditionsToApproveFinder.php

    
updateProduct
: 
    Located in: 

    - /classes/Product.php
    - /classes/webservice/WebserviceSpecificManagementImages.php

    
validateCustomerFormFields
: 
    Located in: /classes/form/CustomerForm.php

action<KpiIdentifier>KpiRowModifier
: 
    Available since: {{< minver v="1.7.6" >}}

    This hook allow to alter the list of Kpis used in a Kpi row.
    This hook is called just before the validation and the  building of the KpiRow.

    Located in: /controllers/front/listing/CategoryController.php

    Parameters:
    ```php
    <?php
    array(
        'kpis' => KpiInterface[] $kpis
    ),
    ```
            
action&lt;HookName>Form
: 
    Available since: {{< minver v="1.7.4" >}}
    
    This hook allows to modify options form content
    
    Located in: /src/Core/Form/Handler.php

    Parameters:
    ```php
    <?php
    [
        'form_builder' => (FormBuilderInterface) $this->formBuilder,
    ]
    ```  

action&lt;HookName>Save
: 
    Available since: {{< minver v="1.7.4" >}}
    
    This hook allows to modify data of options form after it was saved
    
    Located in: /src/Core/Form/Handler.php

    Parameters:
    ```php
    <?php
    [
        'errors' => (array) &$errors,
        'form_data' => (array) &$data,
    ]
    ```

    
action&lt;GridDefinitionId>GridDefinitionModifier
: 
    Available since: {{< minver v="1.7.5" >}}
    Located in: /src/Core/Grid/Definition/Factory/AbstractGridDefinitionFactory.php

    Parameters:
    ```php
    <?php
    [
        'definition' => (GridDefinition) $definition,
    ]
    ```
    
action&lt;GridDefinitionId>GridQueryBuilderModifier
: 
    Available since: {{< minver v="1.7.5" >}}
    Located in: /src/Core/Grid/Data/Factory/DoctrineGridDataFactory.php

    Parameters:
    ```php
    <?php
    [
        'search_query_builder' => (QueryBuilder) $searchQueryBuilder,
        'count_query_builder' => (QueryBuilder) $countQueryBuilder,
        'search_criteria' => (SearchCriteriaInterface) $searchCriteria,
    ]
    ```
    
action&lt;GridDefinitionId>GridDataModifier
: 
    Available since: {{< minver v="1.7.5" >}}
    Located in: /src/Core/Grid/GridFactory.php

    Parameters:
    ```php
    <?php
    [
        'data' => (GridData) $data,
    ]
    ```
    
action&lt;GridDefinitionId>GridFilterFormModifier
: 
    Available since: {{< minver v="1.7.5" >}}
    Located in: /src/Core/Grid/Filter/GridFilterFormFactory.php

    Parameters:
    ```php
    <?php
    [
        'filter_form_builder' => (FormBuilderInterface) $formBuilder,
    ]
    ```
    
action&lt;GridDefinitionId>GridPresenterModifier
: 
    Available since: {{< minver v="1.7.5" >}}
    Located in: /src/Core/Grid/Presenter/GridPresenter.php

    Parameters:
    ```php
    <?php
    [
        'presented_grid' => (array) &$presentedGrid,
    ]
    ```

action&lt;FormName>FormBuilderModifier
: 
    Available since: {{< minver v="1.7.6" >}}
    Located in: /src/Core/Form/IdentifiableObject/Builder/FormBuilder.php

    Parameters:
    ```php
    <?php
    [
        'form_builder' => (FormBuilderInterface) $formBuilder,
        'data' => (array) &$data,
        'id' => (int|null) $id,
    ]
    ```

actionBeforeUpdate&lt;FormName>FormHandler
: 
    Available since: {{< minver v="1.7.6" >}}
    Located in: /src/Core/Form/IdentifiableObject/Handler/FormHandler.php

    Parameters:
    ```php
    <?php
    [
        'form_data' => &$data,
        'id' => (int) $id,
    ]
    ```
    
actionAfterUpdate&lt;FormName>FormHandler
: 
    Available since: {{< minver v="1.7.6" >}}
    Located in: /src/Core/Form/IdentifiableObject/Handler/FormHandler.php

    Parameters:
    ```php
    <?php
    [
        'id' => (int) $id,
    ]
    ```
    
actionBeforeCreate&lt;FormName>FormHandler
: 
    Available since: {{< minver v="1.7.6" >}}
    Located in: /src/Core/Form/IdentifiableObject/Handler/FormHandler.php

    Parameters:
    ```php
    <?php
    [
        'form_data' => &$data,
    ]
    ```

actionAfterCreate&lt;FormName>FormHandler
: 
    Available since: {{< minver v="1.7.6" >}}
    Located in: /src/Core/Form/IdentifiableObject/Handler/FormHandler.php

    Parameters:
    ```php
    <?php
    [
        'id' => $id,
    ]
    ```

{{% /funcdef %}}
