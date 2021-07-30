---
title: The Product Form before 1.7.8
menuTitle: Before 1.7.8
weight: 1
---

# The Product Form before 1.7.8

The product form is divided into multiple sub forms, here is a list that defines each sub forms along with its fields:

## Main form

This form is created by the controller which combines a few different form types for each tab.

| Form type          | Fields | Field type                       | Description            |
|:-------------------|:-------|:---------------------------------|:-----------------------|
| **ProductInformation** | | | This Form type is used for `step1` or "Basic settings" tab |
| | *type_product* | `ChoiceType` | Type of product: Standard, virtual or Pack of Product |
| | *inputPackItems* | `TypeaheadProductPackCollectionType` | List of products (for Pack of product) |
| | *name* | `TranslateType` | Product name (localized) |
| | *description* | `TranslateType` | Product description (localized) |
| | *description_short* | `TranslateType` | Product short description (localized) |
| | *features* | `CollectionType` [`ProductFeature`] | List of sub forms for product *Feature* entity |
| | *id_manufacturer* | `ChoiceType` | **One** of the `ManufacturerCore` |
| | *active* | `CheckboxType` | Boolean to indicate if Product is `active` |
| | *price_shortcut* | `MoneyType` | Product price (tax excluded) |
| | *price_ttc_shortcut* | `MoneyType` | Product price (tax included) |
| | *qty_0_shortcut* | `NumberType` | Product stock quantity |
| | *categories* | `ChoiceCategoriesTreeType` | List of associated categories |
| | *id_category_default* | `ChoiceType` | **One** of the `Category` as default |
| | *new_category* | `SimpleCategory` | Sub form to add and associate a new *Category* entity |
| | *ignore* | `null` | N/A |
| | *related_products* | `TypeaheadProductCollectionType` | List of related products |
| **ProductPrice** | | | This Form type is used for `step2` or "Pricing" tab |
| | *price* | `MoneyType` | Product price (tax excluded) |
| | *price_ttc* | `MoneyType` | Product price (tax included) |
| | *ecotax* | `MoneyType` | Product eco tax (tax included) |
| | *id_tax_rules_group* | `ChoiceType` | **One** of the *TaxRulesGroup* entity |
| | *on_sale* | `CheckboxType` | Boolean to indicate if Product is on sale |
| | *wholesale_price* | `MoneyType` | Wholesale/cost Product price (tax excluded) |
| | *unit_price* | `MoneyType` | Price per unit (tax included) |
| | *unity* | `TextType` | Unity description (Per kilo, per litre, ...) |
| | *specific_price* | `ProductSpecificPrice` | Sub form to add and associate a new *SpecificPrice* entity |
| | *specificPricePriority_* | `ChoiceType` | List of criteria to define priorities to apply specific prices |
| | *specificPricePriorityToAll* | `CheckboxType` | Boolean to indicate if the priorities criteria must be applied on ALL products |
| **ProductQuantity** | | | This Form type is used for `step3` or "Quantities" tab |
| | *attributes* | `TextType` | Text field used to select attributes for *Combination* entity generation |
| | *advanced_stock_management* | `CheckboxType` | Boolean to indicate if Advanced stock management is enable for this Product (available only if `PS_ADVANCED_STOCK_MANAGEMENT` is enabled) |
| | *depends_on_stock* | `ChoiceType` | Select stock policy when using advanced stock management (based on stock or manual) |
| | *pack_stock_type* | `ChoiceType` | Pack stock management type (Decrement pack only, products only, both or default configuration `PS_PACK_STOCK_TYPE`) |
| | *qty_0* | `NumberType` | Define product stock quantity |
| | *out_of_stock* | `ChoiceType` | Out of stock policy (Allow orders, Deny orders, or default configuration `PS_ORDER_OUT_OF_STOCK`) |
| | *minimal_quantity* | `NumberType` | Minimum quantity for sale |
| | *location* | `TextType` | Stock location |
| | *low_stock_threshold* | `NumberType` | Quantity that defines low stock is reached |
| | *low_stock_alert* | `CheckboxType` | Enable email alert when low stock is reached |
| | *available_now* | `TranslateType` | Label when in stock (localized) |
| | *available_later* | `TranslateType` | Label when out of stock (and back order allowed) (localized) |
| | *available_date* | `DatePickerType` | Availability date |
| | *virtual_product* | `ProductVirtual` | For virtual product: Specify if a file is associated, and download limitations (number of download, expiration, ...) |
| **ProductShipping** | | | This Form type is used for `step4` or "Shipping" tab |
| | *width* | `NumberType` | Product width |
| | *height* | `NumberType` | Product height |
| | *depth* | `NumberType` | Product depth |
| | *weight* | `NumberType` | Product weight |
| | *additional_shipping_cost* | `MoneyType` | Shipping fees |
| | *selectedCarriers* | `ChoiceType` | Selection of available carriers |
| | *additional_delivery_times* | `ChoiceType` | Specify delivery time (None, default, specific) |
| | *delivery_out_stock* | `TranslateType` | Specific label for out of stock delivery time (localized) |
| | *delivery_in_stock* | `TranslateType` | Specific label for in stock delivery time (localized) |
| | *warehouse_combination_* | `CollectionType` [`ProductWarehouseCombination`] | List of sub forms for *WarehouseProductLocation* entity |
| **ProductSeo** | | | This Form type is used for `step5` or "SEO" tab |
| | *meta_title* | `TranslateType` | Meta title used for search engine (localized) |
| | *meta_description* | `TranslateType` | Meta description used for search engine (localized) |
| | *link_rewrite* | `TranslateType` | Link rewrite part used when generating Friendly urls (localized) |
| | *redirect_type* | `ChoiceType` | Redirection HTTP code when product is inactive (Permanent/temporary redirection to category/product, or not found) |
| | *id_type_redirected* | `TypeaheadProductCollectionType` | Product/Category ID to redirect to |
| **ProductOptions** | | | This Form type is used for `step6` or "Options" tab |
| | *visibility* | `ChoiceType` | Product visibility is lists (Everywhere, catalog only, search only, nowhere) |
| | *tags* | `TranslateType` | List of tags (localized) |
| | *display_options* | `FormType` | Various display options (available_for_order, show_price, online_only) |
| | *mpn* | `TextType` | Manufacturer Part Number |
| | *upc* | `TextType` | UPC barcode |
| | *ean13* | `TextType` | EAN-13 or JAN barcode |
| | *isbn* | `TextType` | ISBN code |
| | *reference* | `TextType` | Product reference |
| | *show_condition* | `CheckboxType` | Display condition of product |
| | *condition* | `ChoiceType` | Type of condition for product (New, used, refurbished) |
| | *suppliers* | `ChoiceType` | List of `Supplier` for this product |
| | *default_supplier* | `TextType` | **One** of the `Supplier` as default one  |
| | *supplier_combination_* | `CollectionType` [`ProductSupplierCombination`] | List of sub forms for *ProductSupplier* entity (details Price and reference for each supplier) |
| | *custom_fields* | `CollectionType` [`ProductCustomField`] | List of sub forms for *ProductCustom* entity (define possible custom texts, images, ...) |
| | *attachment_product* | `ProductAttachement` | Sub form to create and associate an *Attachment* entity (instructions, documentation, recipes, ...) |
| | *attachments* | `ChoiceType` | List of *Attachment* for this product |

## Sub forms

Here is a description of the sub forms used in the main one

| Form type          | Fields | Field type                       | Description            |
|:-------------------|:-------|:---------------------------------|:-----------------------|
| **ProductAttachement** | | | This Form type is used in `ProductOptions` to create an *Attachment* entity |
| | *file* | `FileType` | File to upload |
| | *name* | `TextType` | Filename |
| | *description* | `TextType` | File description |
| | *add* | `ButtonType` | Add button |
| | *cancel* | `ButtonType` | Cancel button |
| **ProductCustomField** | | | This Form type is used in `ProductOptions` to edit a *CustomizationField* entity |
| | *id_customization_field* | `HiddenType` | *CustomizationField* ID |
| | *label* | `TranslateType` | Customization field name (localized) |
| | *type* | `ChoiceType` | Customization field type (text, file) |
| | *require* | `CheckboxType` | Boolean to indicate if custom field is required |
| **ProductSpecificPrice** | | | This Form type is used in `ProductOptions` to edit a *SpecificPrice* entity |
| | *sp_id_shop* | `HiddenType` or `ChoiceType` | Select Shop association (When only one Shop just use the default one) |
| | *sp_id_currency* | `ChoiceType` | Select specific price currency |
| | *sp_id_country* | `ChoiceType` | Select specific price country |
| | *sp_id_group* | `ChoiceType` | Select specific price group |
| | *sp_id_customer* | `ChoiceType` | Select specific price customer |
| | *sp_id_product_attribute* | `ChoiceType` | Select specific price combination |
| | *sp_from* | `DatePickerType` | Specific price starting date |
| | *sp_to* | `DatePickerType` | Specific price ending date |
| | *sp_from_quantity* | `NumberType` | Specific price minimum quantity |
| | *sp_price* | `MoneyType` | Specific price (tax excl.) |
| | *leave_bprice* | `CheckboxType` | Boolean to indicate if initial price is kept |
| | *sp_reduction* | `NumberType` | Reduction amount |
| | *sp_resp_reduction_type* | `ChoiceType` | Reduction type (amount, percentage) |
| | *save* | `ButtonType` | Save button |
| | *cancel* | `ButtonType` | Cancel button |
| **ProductSupplierCombination** | | | This Form type is used in `ProductOptions` to edit a *ProductSupplier* entity |
| | *supplier_reference* | `TextType` | Supplier reference |
| | *product_price* | `MoneyType` | Product price for supplier |
| | *product_price_currency* | `ChoiceType` | Select product price currency |
| | *id_product* | `HiddenType` | *Product* ID |
| | *id_product_attribute* | `HiddenType` | *Combination* ID |
| | *supplier_id* | `HiddenType` | *Supplier* ID |
| **ProductVirtual** | | | This Form type is used in `ProductQuantity` to specify the virtual product file settings |
| | *is_virtual_file* | `ChoiceType` | Boolean that indicates if the virtual product has an associated file |
| | *file* | `FileType` | File to upload |
| | *name* | `TextType` | Filename |
| | *nb_downloadable* | `NumberType` | Number of allowed downloads |
| | *expiration_date* | `DatePickerType` | Expiration date |
| | *nb_days* | `NumberType` | Number of days |
| | *save* | `ButtonType` | Save button |
| **ProductWarehouseCombination** | | | This Form type is used in `ProductShipping` to edit *WarehouseProductLocation* entities |
| | *activated* | `ChoiceType` | Boolean that indicates if the warehouse stores the product |
| | *product_id* | `HiddenType` | *Product* ID |
| | *id_product_attribute* | `HiddenType` | *Combination* ID |
| | *warehouse_id* | `HiddenType` | *Warehouse* ID |
| | *location* | `TextType` | Location in warehouse (optional) |
| **TypeaheadProductCollectionType** | | | This Form type is used in `ProductInformation` to select related products and in `ProductSEO` to select the redirection target (*Product* or *Category*) |
| | *data* | `CollectionType` | Serialized data that is then used to create the relation For related product it creates an *accessory* relation, for SEO it stores the ID for redirection |
| **TypeaheadProductPackCollectionType** | | | This Form type is used in `ProductInformation` to select products contained in the Pack |
| | *data* | `CollectionType` | Serialized data that is then used to create the relation using the *Pack* entity |

## Extra forms

Some extra forms are not integrated directly in the product form but displayed in the page and managed in individual components (often through ajax requests).

| Form type          | Fields | Field type                       | Description            |
|:-------------------|:-------|:---------------------------------|:-----------------------|
| **ProductCategories** | | | This Form type is used to display and select the categories for the Product (as a tree) |
| | *categories* | `ChoiceCategoriesTreeType` | Display a tree of categories and allows to select them |
| **ChoiceCategoriesTreeType** | | | Categories tree selector |
| | *tree* | `ChoiceType` | List of *Category* entities |
| **ProductCombination** | | | This Form type is used to edit a *Combination* entity |
| | *id_product_attribute* | `HiddenType` | Combination ID |
| | *attribute_reference* | `TextType` | Combination reference |
| | *attribute_ean13* | `TextType` | Combination EAN-13 or JAN barcode |
| | *attribute_isbn* | `TextType` | Combination ISBN code |
| | *attribute_upc* | `TextType` | Combination UPC barcode |
| | *attribute_mpn* | `TextType` | Combination Manufacturer Part Number |
| | *attribute_wholesale_price* | `MoneyType` | Combination wholesale/cost price (tax excluded) |
| | *attribute_price* | `MoneyType` | Impact on price (tax excl.) |
| | *attribute_priceTI* | `MoneyType` | Impact on price (tax incl.) |
| | *attribute_ecotax* | `MoneyType` | Combination ecotax (tax incl.) |
| | *attribute_weight* | `NumberType` | Impact on weight |
| | *attribute_unity* | `NumberType` | Impact on price per unit (tax excl.) |
| | *attribute_minimal_quantity* | `NumberType` | Min. quantity for sale |
| | *attribute_location* | `TextType` | Stock location |
| | *attribute_low_stock_threshold* | `NumberType` | Low stock threshold |
| | *attribute_low_stock_alert* | `CheckboxType` | Enable email alert when low stock is reached |
| | *available_date_attribute* | `DatePickerType` | Availability date |
| | *attribute_default* | `CheckboxType` | Set as default combination |
| | *attribute_quantity* | `NumberType` | Combination quantity (when Stock management enabled) |
| | *id_image_attr* | `ChoiceType` | List of *Images* associated to the Combination |
| | *final_price* | `NumberType` | Final price |
| **ProductCombinationBulk** | | | This Form type is used to edit options when performing bulk action on *Combination* entities |
| | *quantity* | `NumberType` | Combination quantity (when Stock management enabled) |
| | *cost_price* | `MoneyType` | Combination wholesale/cost price (tax excl.) |
| | *impact_on_price_te* | `MoneyType` | Combination price (tax excl.) |
| | *impact_on_price_ti* | `MoneyType` | Combination price (tax incl.) |
| | *impact_on_weight* | `NumberType` | Combination weight |
| | *date_availability* | `DatePickerType` | Availability date |
| | *reference* | `TextType` | Combination reference |
| | *minimal_quantity* | `NumberType` | Combination minimum quantity for sale |
| | *low_stock_threshold* | `NumberType` | Low stock threshold |
| | *low_stock_alert* | `CheckboxType` | Enable email alert when low stock is reached |
