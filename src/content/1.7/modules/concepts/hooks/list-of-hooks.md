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

{{% funcdef %}}
    
action&lt;AdminControllerName>&lt;Action>After
: 
    Called after performing &lt;Action> in any &lt;AdminController>

    Located in: /classes/controller/AdminController.php

    Parameters:
    ```php
    array(
      'controller' => (AdminController),
      'return' => (mixed)
    );
    ```
    
action&lt;AdminControllerName>&lt;Action>Before
: 
    Called before performing &lt;Action> in any &lt;AdminController>

    Located in: /classes/controller/AdminController.php

    Parameters:
    ```php
    array(
      'controller' => (AdminController)
    );
    ```
    
action&lt;AdminControllerName>FormModifier
: 
    Called when rendering a form in any &lt;AdminController>

    Located in: /classes/controller/AdminController.php

    Parameters:
    ```php
    array(
      'object' => &(ObjectModel),
      'fields' => &(array),
      'fields_value' => &(array),
      'form_vars' => &(array),
    );
    ```
    
action&lt;AdminControllerName>ListingFieldsModifier
: 
    Located in: /classes/controller/AdminController.php

    Parameters:
    ```php
    array(
      'select' => &(string), 'join' => &(string),
      'where' => &(string),
      'group_by' => &(string),
      'order_by' => &(string),
      'order_way' => &(string),
      'fields' => &(array)
    );
    ```
    
action&lt;AdminControllerName>OptionsModifier
: 
    Located in: /classes/controller/AdminController.php

    Parameters:
    ```php
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
    array(
      'controller' => (AdminController)
    );
    ```
    
actionAdminControllerSetMedia
: 
    Located in: /classes/controller/AdminController.php

    Parameters:
    ```php
    N/A
    ```
    
actionAdminLoginControllerSetMedia
: 
    Called after adding media to admin login page header

    Located in: /controllers/admin/AdminLoginController.php

    Parameters:
    ```php
    N/A
    ```
    
actionAdminMetaAfterWriteRobotsFile
: 
    Called after generating the robots.txt file

    Located in: /classes/Tools.php

    Parameters:
    ```php
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
    array(
      'rb_data' => &(array) File data
    );
    ```
    
actionAdminMetaSave
: 
    Called after saving the configuration in AdminMeta

    Located in: /controllers/admin/AdminMetaController.php

    Parameters:
    ```php
    N/A
    ```
    
actionAdminOrdersTrackingNumberUpdate
: 
    Located in: /controllers/admin/AdminOrdersController.php

    Parameters:
    ```php
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
    array(
      '_ps_version' => (string) PrestaShop version,
      'products' => &(PDOStatement),
      'total' => (int),
    );
    ```
    
actionAdminThemesControllerUpdate_optionsAfter
: 
    Located in: /controllers/admin/AdminThemesController.php

    Parameters:
    ```php
    N/A
    ```
    
actionAjaxDie&lt;ControllerName>&lt;Method>Before
: 
    Located in: /classes/controller/Controller.php

    Parameters:
    ```php
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
    Available since: 1.7.1

    Invoked when the smarty cache is cleared

    Located in: /classes/Tools.php

    
actionClearCompileCache
: 
    Available since: 1.7.1

    Invoked when the smarty compile cache is cleared

    Located in: /classes/Tools.php

    
actionClearSf2Cache
: 
    Available since: 1.7.1

    Invoked when the Symfony cache is cleared

    Located in: /classes/Tools.php

    
actionCustomerAccountAdd
: 
    Invoked when a new customer creates an account successfully

    Located in: /classes/form/CustomerPersister.php

    Parameters:
    ```php
    array(
      '_POST' => (array) $_POST,
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
    Available since: 1.7.1

    This hook is called at the end of the dispatch method of the Dispatcher

    Located in: /classes/Dispatcher.php

    
actionDispatcherBefore
: 
    Available since: 1.7.1

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

    
actionFrontControllerSetMedia
: 
    Located in: /classes/controller/FrontController.php

    
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

    
actionObjectProductInCartDeleteAfter
: 
    Available since: 1.7.1

    This hook is called after a product is removed from a cart

    Located in: /controllers/front/CartController.php

    
actionObjectProductInCartDeleteBefore
: 
    Available since: 1.7.1

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

    Located in: /classes/order/OrderHistory.php

    Parameters:
    ```php
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
    array(
      'newOrderStatus' => (object) OrderState,
      'id_order' => (int) Order ID
    );
    ```
    
actionOutputHTMLBefore
: 
    Available since: 1.7.1

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
    Available since: 1.7.1

    This hook is called after the product search. Parameters are already filter

    Located in: /classes/controller/ProductListingFrontController.php

    
actionProductUpdate
: 
    This hook is displayed after a product has been updated

    Located in: 

    - /classes/Product.php
    - /controllers/admin/AdminProductsController.php

    
actionSearch
: 
    Available since: 1.7.1

    After the search in the store. Includes both instant and normal search.

    Located in: /src/Adapter/Search/SearchProductSearchProvider.php

    Parameters:
    ```php
    array(
      'expr' => (string) Search query,
      'total' => (int) Amount of search results
    );
    ```
    
actionSetInvoice
: 
    Located in: /classes/order/Order.php

    
actionShopDataDuplication
: 
    After duplicating a shop.

    Located in: /classes/shop/Shop.php

    Parameters:
    ```php
    array(
      'old_id_shop' => (int) Old shop ID,
      'new_id_shop' => (int) New shop ID
    );
    ```
    
actionSubmitAccountBefore
: 
    Available since: 1.7.1

    Located in: /controllers/front/AuthController.php

    
actionUpdateLangAfter
: 
    Available since: 1.7.1

    Update "lang" tables after adding or updating a language

    Located in: /classes/Language.php

    
actionUpdateQuantity
: 
    After updating the quantity of a product.
Quantity is updated only when a customer effectively places their order

    Located in: /classes/stock/StockAvailable.php

    Parameters:
    ```php
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
    array(
      'cart' => (object) Cart,
      'order' => (object) Order,
      'customer' => (object) Customer,
      'currency' => (object) Currency,
      'orderStatus' => (object) OrderState
    );
    ```
    
actionValidateOrder
: 
    After an order has been validated.
Doesn't necessarily have to be paid.

    Located in: /classes/PaymentModule.php

    
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
    array(
      'id_image' => (int) Image ID,
      'id_product' => (int) Product ID
    );
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
    array(
      'id_customer' = (int) Customer ID
    );
    ```
    
displayAdminForm
: 
    Located in: admin-dev/themes/default/template/helpers/form/form.tpl

    
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

    Located in: admin-dev/themes/default/template/controllers/orders/helpers/view/view.tpl

    Parameters:
    ```php
    array(
     'id_order' = (int) Order ID
    );
    ```
    
displayAdminOrderContentOrder
: 
    Display new elements in Back Office, AdminOrder, panel Order
This hook launches modules when the AdminOrder tab is displayed in the Back Office and extends / override Order panel content

    Located in: /controllers/admin/AdminOrdersController.php

    
displayAdminOrderContentShip
: 
    Display new elements in Back Office, AdminOrder, panel Shipping
This hook launches modules when the AdminOrder tab is displayed in the Back Office and extends / override Shipping panel content

    Located in: /controllers/admin/AdminOrdersController.php

    
displayAdminOrderLeft
: 
    Located in: admin-dev/themes/default/template/controllers/orders/helpers/view/view.tpl

    
displayAdminOrderRight
: 
    Located in: admin-dev/themes/default/template/controllers/orders/helpers/view/view.tpl

    
displayAdminOrderTabOrder
: 
    Display new elements in Back Office, AdminOrder, panel Order
This hook launches modules when the AdminOrder tab is displayed in the Back Office and extends / override Order panel tabs

    Located in: /controllers/admin/AdminOrdersController.php

    
displayAdminOrderTabShip
: 
    Display new elements in Back Office, AdminOrder, panel Shipping
This hook launches modules when the AdminOrder tab is displayed in the Back Office and extends / override Shipping panel tabs

    Located in: /controllers/admin/AdminOrdersController.php

    
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
    Available since: 1.7.1

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
    Located in: admin-dev/themes/default/template/controllers/orders/helpers/view/view.tpl

    
displayBackOfficeTop
: 
    Shown above the actual content of a Back Office page

    Located in: /classes/controller/AdminController.php

    
displayBanner
: 
    Available since: 1.7.1

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
    Display additional content for a carrier (e.g pickup points)
This hook calls only the module related to the carrier, in order to add options when needed

    Located in: /classes/checkout/DeliveryOptionsFinder.php

    
displayCarrierList
: 
    Display extra carriers in the carrier list.

    Located in: /classes/Cart.php

    Parameters:
    ```php
    array(
      'address' => (object) Address object
    );
    ```
    
displayCartExtraProductActions
: 
    Extra buttons in shopping cart
This hook adds extra buttons to the product lines, in the shopping cart

    Located in: /themes/classic/templates/checkout/_partials/cart-detailed-product-line.tpl

    
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

    
displayCrossSellingShoppingCart
: 
    Located in: themes/classic/templates/checkout/cart-empty.tpl

    
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
    Invoice
This hook displays new blocks on the invoice (order)

    Located in: admin-dev/themes/default/template/controllers/orders/helpers/view/view.tpl

    
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
    array(
      'total_to_pay' => (float) Total amount with tax,
      'currency' => (string) Currency sign,
      'objOrder' => (object) Order,
      'currencyObj' => (object) Currency
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
    array(
      'order' => (object) Order object
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

    
displayProductAdditionalInfo
: 
    Available since: 1.7.1

    Product page additional info
This hook adds additional information on the product page

    Located in: 

    - /themes/classic/templates/catalog/_partials/product-additional-info.tpl
    - /themes/classic/templates/catalog/_partials/quickview.tpl

    
displayProductListReviews
: 
    Available since: 1.7.1

    Located in: /themes/classic/templates/catalog/_partials/miniatures/product.tpl

    
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
    array(
      'cart' => (object) Cart object
    );
Note that the Cart object can also be retrieved from the current Context.
    ```
    
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
    Available since: 1.7.1

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
    Located in: /prestashop/classes/Mail.php

    
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

{{% /funcdef %}}
