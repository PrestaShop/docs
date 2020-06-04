---
title: The Product Form
menuTitle: Product Form
---

# The New Product Form
{{< minver v="1.7.8" title="true" >}}

In most recent Product page, which was remade in 1.7.8, the form is divided into multiple sub forms. Each form has dedicated CQRS commands to manage its content.

{{% notice info %}}
For previous versions you can read this documentation about [product form before 1.7.8]({{< ref "1.7/development/page-reference/back-office/product/form/product-form-before-1-7-8" >}}).
{{% /notice %}}

## Creation / Update commands

Except for the initial save, all product modifications are **updates**, which is why `AddProductCommand` is a special case. It requires only:

- the product type
- localized names (only the name in default language is required)

Once the product is created and its ID has been generated most of the other CQRS commands are **updates** so they will need a `ProductId` identifier.
They allow **partial updates** to minimize the amount of sent data, of course even partial update require a minimum of consistency and will have validation rules such as required fields in some cases.

## Product form

This form combines different sub form types, each one is handled by dedicated CQRS commands.

| Form type                | Field      | Description                                              | CQRS Command                                           |
|:-------------------------|:-----------|:---------------------------------------------------------|:-------------------------------------------------------|
| **BasicInformationType** | `basic` | Contains the basic product information of the Product | `AddProductCommand` and `UpdateProductBasicInformationCommand` |
| **DescriptionType** | `description`    | Contains the description of the Product | `UpdateProductBasicInformationCommand` |
| **ShortcutType** | `shortcut`    | Contains shortcut for prices, quantity and reference of the Product | `UpdateProductPriceCommand`, `UpdateProductStockCommand` and `UpdateProductOptionsCommand` |
| **TypeaheadProductPackCollectionType** | `pack_items` | List of products (for Pack of product) | `UpdateProductPackCommand` `CleanProductFromPackCommand` |
| **RelationshipsType** | `relationships` | Contains relationships of the product | (see [RelationshipsType](#relationshipstype)) |
| **PriceType** | `price` | Contains data about pricing | `UpdateProductPriceCommand` |
| **SpecificPriceType** | `add_specific_price` | Component to add a specific price | `AddProductSpecificPriceCommand` |
| **SpecificPricePriorityType** | `specific_price_priority` | Contains data about the priority order for specific prices | `UpdateSpecificPricePriorityCommand` |
| **StockType** | `stock` | Contains data about the product stock | `UpdateProductStockCommand` `UpdateProductWarehouseLocationCommand` (TBD should it be managed in stock form or separately) |
| **ShippingType** | `shipping` | Contains data about the product shipping | `UpdateProductShippingCommand` |
| **SEOType** | `seo` | Contains data about the product SEO | `UpdateProductSEOCommand` |
| **OptionsType** | `options` | Contains data about the product options | `UpdateProductOptionsCommand` |
| **ProductCategoriesType** | `product_categories` | Manage product categories | N/A |

### BasicInformationType

| Field  | Field type                       | Description            |
|:-------|:---------------------------------|:-----------------------|
| `type_product` | `ChoiceType` | Type of product: Standard, virtual or Pack of Product |
| `name` | `TranslateType` | Product name (localized) |

### DescriptionType

| Field  | Field type                       | Description            |
|:-------|:---------------------------------|:-----------------------|
| `description` | `TranslateType` | Product description (localized) |
| `description_short` | `TranslateType` | Product short description (localized) |

### ShortcutType

| Field  | Field type                       | Description            | CQRS Commands |
|:-------|:---------------------------------|:-----------------------|---------------|
| `price` | `MoneyType` | Product price (tax excluded) | `UpdateProductPriceCommand` |
| `price_ttc` | `MoneyType` | Product price (tax included) | `UpdateProductPriceCommand` |
| `quantity` | `NumberType` | Product stock quantity | `UpdateProductPriceCommand` |
| `id_tax_rules_group` | `ChoiceType` | **One** of the *TaxRulesGroup* entity | `UpdateProductStockCommand` |
| `reference` | `TextType` | Product reference | `UpdateProductOptionsCommand` |

### TypeaheadProductPackCollectionType

| Field  | Field type                       | Description            | CQRS Commands |
|:-------|:---------------------------------|:-----------------------|---------------|
| `data` | `CollectionType` | Serialized data that is then used to create the relation using the *Pack* entity | `UpdateProductPackCommand` |

### RelationshipsType

(TBD: do we need this "container" form type or should it be directly in ProductForm, advantage: allows module to add a relationship in this sub form via form_rest)

| Fields | Field type                       | Description            | CQRS Commands |
|:-------|:---------------------------------|:-----------------------|---------------|
| `features` | `CollectionType` [`ProductFeatureType`] | List of sub forms for product *Feature* entity | `AddProductFeatureValueCommand` `UpdateProductFeatureValueCommand` `RemoveProductFeatureValueCommand` `CreateFeatureValueCommand` |
| `id_manufacturer` | `ChoiceType` | **One** of the `ManufacturerCore` | `UpdateProductManufacturerCommand` (TBD: should this be included in basic information?) |
| `related_products` | `TypeaheadProductCollectionType` | List of related products | `UpdateRelatedProductsCommand` `CleanRelatedProductsCommand` |

### PriceType

| Field  | Field type                       | Description            |
|:-------|:---------------------------------|:-----------------------|
| `price` | `MoneyType` | Product price (tax excluded) |
| `price_ttc` | `MoneyType` | Product price (tax included) |
| `ecotax` | `MoneyType` | Product eco tax (tax included) |
| `id_tax_rules_group` | `ChoiceType` | **One** of the *TaxRulesGroup* entity |
| `on_sale` | `CheckboxType` | Boolean to indicate if Product is on sale |
| `wholesale_price` | `MoneyType` | Wholesale/cost Product price (tax excluded) |
| `unit_price` | `MoneyType` | Price per unit (tax included) |
| `unity` | `TextType` | Unity description (Per kilo, per litre, ...) |

### SpecificPricePriorityType

| Field  | Field type                       | Description            |
|:-------|:---------------------------------|:-----------------------|
| `criterias` | `CollectionType` [`ChoiceType`] | List of criteria to define priorities to apply specific prices |
| `apply_to_all` | `CheckboxType` | Boolean to indicate if the priorities criteria must be applied on ALL products |

### StockType

| Field  | Field type                       | Description            |
|:-------|:---------------------------------|:-----------------------|
| `advanced_stock_management` | `CheckboxType` | Boolean to indicate if Advanced stock management is enable for this Product (available only if `PS_ADVANCED_STOCK_MANAGEMENT` is enabled) |
| `depends_on_stock` | `ChoiceType` | Select stock policy when using advanced stock management (based on stock or manual) |
| `pack_stock_type` | `ChoiceType` | Pack stock management type (Decrement pack only, products only, both or default configuration `PS_PACK_STOCK_TYPE`) |
| `quantity` | `NumberType` | Define product stock quantity |
| `out_of_stock` | `ChoiceType` | Out of stock policy (Allow orders, Deny orders, or default configuration `PS_ORDER_OUT_OF_STOCK`) |
| `minimal_quantity` | `NumberType` | Minimum quantity for sale |
| `location` | `TextType` | Stock location |
| `low_stock_threshold` | `NumberType` | Quantity that defines low stock is reached |
| `low_stock_alert` | `CheckboxType` | Enable email alert when low stock is reached |
| `available_now` | `TranslateType` | Label when in stock (localized) |
| `available_later` | `TranslateType` | Label when out of stock (and back order allowed) (localized) |
| `available_date` | `DatePickerType` | Availability date |
| `warehouse_locations` | `CollectionType` [`ProductWarehouseLocationType`] | List of sub forms for *WarehouseProductLocation* entity (TBD: should it be in this form or apart) |

### ShippingType

| Field  | Field type                       | Description            |
|:-------|:---------------------------------|:-----------------------|
| `width` | `NumberType` | Product width |
| `height` | `NumberType` | Product height |
| `depth` | `NumberType` | Product depth |
| `weight` | `NumberType` | Product weight |
| `additional_shipping_cost` | `MoneyType` | Shipping fees |
| `selected_carriers` | `ChoiceType` | Selection of available carriers |
| `additional_delivery_times` | `ChoiceType` | Specify delivery time (None, default, specific) |
| `delivery_out_stock` | `TranslateType` | Specific label for out of stock delivery time (localized) |
| `delivery_in_stock` | `TranslateType` | Specific label for in stock delivery time (localized) |

### SEOType

| Field  | Field type                       | Description            |
|:-------|:---------------------------------|:-----------------------|
| `meta_title` | `TranslateType` | Meta title used for search engine (localized) |
| `meta_description` | `TranslateType` | Meta description used for search engine (localized) |
| `link_rewrite` | `TranslateType` | Link rewrite part used when generating Friendly urls (localized) |
| `redirect_type` | `ChoiceType` | Redirection HTTP code when product is inactive (Permanent/temporary redirection to category/product, or not found) |
| `id_type_redirected` | `TypeaheadProductCollectionType` | Product/Category ID to redirect to |

### OptionsType

| Field  | Field type                       | Description            |
|:-------|:---------------------------------|:-----------------------|
| `visibility` | `ChoiceType` | Product visibility is lists (Everywhere, catalog only, search only, nowhere) |
| `tags` | `TranslateType` | List of tags (localized) |
| `display_options` | `DisplayOptionsType` | Various display options (available_for_order, show_price, online_only) |
| `mpn` | `TextType` | Manufacturer Part Number |
| `upc` | `TextType` | UPC barcode |
| `ean13` | `TextType` | EAN-13 or JAN barcode |
| `isbn` | `TextType` | ISBN code |
| `reference` | `TextType` | Product reference |
| `show_condition` | `CheckboxType` | Display condition of product |
| `condition` | `ChoiceType` | Type of condition for product (New, used, refurbished) |
| `suppliers` | `ChoiceType` | List of `Supplier` for this product |
| `default_supplier` | `TextType` | **One** of the `Supplier` as default one  |
| `supplier_combinations` | `CollectionType` [`ProductSupplierCombinationType`] | List of sub forms for *ProductSupplier* entity (details Price and reference for each supplier) |
| `custom_fields` | `CollectionType` [`ProductCustomFieldType`] | List of sub forms for *ProductCustom* entity (define possible custom texts, images, ...) |
| `attachments` | `ChoiceType` | List of *Attachment* (files) associated to this product |

## Sub forms

Here is a description of the sub forms used in the main ones

### ProductFeatureType

| Field  | Field type                       | Description            |
|:-------|:---------------------------------|:-----------------------|
| `feature` | `ChoiceType` | Select one *Feature* |
| `value` | `ChoiceType` | Select one *FeatureValue* |
| `custom_value` | `TranslateType` | Input type to create new *FeatureValue* |

### DisplayOptionsType

| Field  | Field type                       | Description            |
|:-------|:---------------------------------|:-----------------------|
| `available_for_order` | `CheckboxType` | Available for order |
| `show_price` | `CheckboxType` | Show price (depends on available_for_order) |
| `online_only` | `CheckboxType` | Web only (not sold in your retail store) |

### ProductWarehouseLocationType

| Field  | Field type                       | Description            |
|:-------|:---------------------------------|:-----------------------|
| `activated` | `ChoiceType` | Boolean that indicates if the warehouse stores the product |
| `product_id` | `HiddenType` | *Product* ID |
| `id_product_attribute` | `HiddenType` | *Combination* ID |
| `warehouse_id` | `HiddenType` | *Warehouse* ID |
| `location` | `TextType` | Location in warehouse (optional) |

### TypeaheadProductCollectionType

| Field  | Field type                       | Description            |
|:-------|:---------------------------------|:-----------------------|
| `data` | `CollectionType` | Serialized data that is then used to create the relation For related product it creates an *accessory* relation, for SEO it stores the ID for redirection |

### ProductSupplierCombinationType

(TDB maybe this should be managed in Combination edition instead)

| Field  | Field type                       | Description            |
|:-------|:---------------------------------|:-----------------------|
| `id_product` | `HiddenType` | *Product* ID |
| `id_product_attribute` | `HiddenType` | *Combination* ID |
| `supplier_id` | `HiddenType` | *Supplier* ID |
| `supplier_reference` | `TextType` | Supplier reference |
| `price` | `MoneyType` | Product price for supplier |
| `id_currency` | `ChoiceType` | Select product price currency |

### ProductCustomFieldType

| Field  | Field type                       | Description            |
|:-------|:---------------------------------|:-----------------------|
| `id_customization_field` | `HiddenType` | *CustomizationField* ID |
| `label` | `TranslateType` | Customization field name (localized) |
| `type` | `ChoiceType` | Customization field type (text, file) |
| `require` | `CheckboxType` | Boolean to indicate if custom field is required |

## Component forms

These forms are displayed on the page but not integrated in the product form directly, they are independent component forms that use ajax requests instead.

### ProductCategoriesType

| Fields | Field type                       | Description            | CQRS Commands |
|:-------|:---------------------------------|:-----------------------|---------------|
| `categories` | `ChoiceCategoriesTreeType` | List of associated categories | `UpdateProductCategoriesCommand` |
| `id_category_default` | `ChoiceType` | **One** of the `Category` as default | `UpdateProductDefaultCategoryCommand` |
| `new_category` | `SimpleCategory` | Sub form to add and associate a new *Category* entity | `AddCategoryCommand` |

### ChoiceCategoriesTreeType

**CQRS command:** `UpdateProductCategoriesCommand`

| Fields | Field type                       | Description            |
|:-------|:---------------------------------|:-----------------------|
| `tree` | `ChoiceType` | List of *Category* entities |

### SpecificPriceType

**CQRS command:** `AddProductSpecificPriceCommand`

| Field  | Field type                       | Description            |
|:-------|:---------------------------------|:-----------------------|
| `id_shop` | `HiddenType` or `ChoiceType` | Select Shop association (When only one Shop just use the default one - hidden) |
| `id_currency` | `ChoiceType` | Select specific price currency |
| `id_country` | `ChoiceType` | Select specific price country |
| `id_group` | `ChoiceType` | Select specific price group |
| `id_customer` | `ChoiceType` | Select specific price customer |
| `id_product_attribute` | `ChoiceType` | Select specific price combination |
| `from` | `DatePickerType` | Specific price starting date |
| `to` | `DatePickerType` | Specific price ending date |
| `from_quantity` | `NumberType` | Specific price minimum quantity |
| `price` | `MoneyType` | Specific price (tax excl.) |
| `keep_initial_price` | `CheckboxType` | Boolean to indicate if initial price is kept |
| `reduction` | `NumberType` | Reduction amount |
| `resp_reduction_type` | `ChoiceType` | Reduction type (amount, percentage) |
| `save` | `ButtonType` | Save button |
| `cancel` | `ButtonType` | Cancel button |

### VirtualProductFileType

**CQRS command:** `AddProductVirtualFileCommand`

This form type is used in `Stock` tab to upload a file representing the virtual product

| Field  | Field type                       | Description            |
|:-------|:---------------------------------|:-----------------------|
| `is_virtual_file` | `ChoiceType` | Boolean that indicates if the virtual product has an associated file |
| `file` | `FileType` | File to upload |
| `name` | `TextType` | Filename |
| `downloadable_limit` | `NumberType` | Number of allowed downloads |
| `expiration_date` | `DatePickerType` | Expiration date |
| `days_limit` | `NumberType` | Number of days |
| `save` | `ButtonType` | Save button |

### ProductAttachmentType

**CQRS command:** `AddAttachmentCommand`

This form type is used in `Options` tab to create an *Attachment* entity (associated file)

| Field  | Field type                       | Description            |
|:-------|:---------------------------------|:-----------------------|
| `file` | `FileType` | File to upload |
| `name` | `TextType` | Filename |
| `description` | `TextType` | File description |
| `add` | `ButtonType` | Add button |
| `cancel` | `ButtonType` | Cancel button |

### GenerateCombinationType

**CQRS command:** `GenerateProducCombinationsCommand`

| Field  | Field type                       | Description            |
|:-------|:---------------------------------|:-----------------------|
| `attributes` | `TextType` | Text field used to select attributes for *Combination* entity generation |

### ProductCombinationType

**CQRS command:** `UpdateProductCombinationCommand`

| Field  | Field type                       | Description            |
|:-------|:---------------------------------|:-----------------------|
| `id_product_attribute` | `HiddenType` | Combination ID |
| `reference` | `TextType` | Combination reference |
| `ean13` | `TextType` | Combination EAN-13 or JAN barcode |
| `isbn` | `TextType` | Combination ISBN code |
| `upc` | `TextType` | Combination UPC barcode |
| `mpn` | `TextType` | Combination Manufacturer Part Number |
| `wholesale_price` | `MoneyType` | Combination wholesale/cost price (tax excluded) |
| `price` | `MoneyType` | Impact on price (tax excl.) |
| `price_tax_included` | `MoneyType` | Impact on price (tax incl.) |
| `ecotax` | `MoneyType` | Combination ecotax (tax incl.) |
| `weight` | `NumberType` | Impact on weight |
| `unity` | `NumberType` | Impact on price per unit (tax excl.) |
| `minimal_quantity` | `NumberType` | Min. quantity for sale |
| `location` | `TextType` | Stock location |
| `low_stock_threshold` | `NumberType` | Low stock threshold |
| `low_stock_alert` | `CheckboxType` | Enable email alert when low stock is reached |
| `available_date` | `DatePickerType` | Availability date |
| `default` | `CheckboxType` | Set as default combination |
| `quantity` | `NumberType` | Combination quantity (when Stock management enabled) |
| `id_image_attr` | `ChoiceType` | List of *Images* associated to the Combination |
| `final_price` | `NumberType` | Final price |

### ProductCombinationBulkType

**CQRS command:** `BulkUpdateProductCombinationCommand`

This Form type is used to edit options when performing bulk action on *Combination* entities

| Field  | Field type                       | Description            |
|:-------|:---------------------------------|:-----------------------|
| `quantity` | `NumberType` | Combination quantity (when Stock management enabled) |
| `cost_price` | `MoneyType` | Combination wholesale/cost price (tax excl.) |
| `impact_on_price_te` | `MoneyType` | Combination price (tax excl.) |
| `impact_on_price_ti` | `MoneyType` | Combination price (tax incl.) |
| `impact_on_weight` | `NumberType` | Combination weight |
| `date_availability` | `DatePickerType` | Availability date |
| `reference` | `TextType` | Combination reference |
| `minimal_quantity` | `NumberType` | Combination minimum quantity for sale |
| `low_stock_threshold` | `NumberType` | Low stock threshold |
| `low_stock_alert` | `CheckboxType` | Enable email alert when low stock is reached |
