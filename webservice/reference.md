---
title: Reference
weight: 30
showOnHomepage: true
---

# Web service reference

All webservice APIs are accessible through the `/api/` gateway. For instance, `http://example.com/api/carriers`

## Available HTTP methods

Most resources can be accessed in a REST manner, with the 5 main HTTP request methods: GET, POST, PUT, DELETE, HEAD. The only exceptions are:

| Key                            | GET | POST | PUT | PATCH | DELETE | HEAD |
|--------------------------------|:---:|:----:|:---:|:-----:|:------:|:----:|
| search                         | ✅  |      |     |       |        | ✅   |
| stock_availables               | ✅  |      | ✅  | ✅     |        | ✅   |
| stock_movements                | ✅  |      |     |       |        | ✅   |
| stocks                         | ✅  |      |     |       |        | ✅   |
| supply_order_details           | ✅  |      |     |       |        | ✅   |
| supply_order_histories         | ✅  |      |     |       |        | ✅   |
| supply_order_receipt_histories | ✅  |      |     |       |        | ✅   |
| supply_order_states            | ✅  |      |     |       |        | ✅   |
| supply_orders                  | ✅  |      |     |       |        | ✅   |
| warehouse_product_locations    | ✅  |      |     |       |        | ✅   |
| warehouses                     | ✅  | ✅   | ✅  | ✅     |       | ✅   |

All resources have two schemas that are accessible via a parameter:

- `?schema=blank`: returns a blank XML tree of the chosen resource.
- `?schema=synopsis`: returns a blank XML tree of the chosen resource, with the format that is expected for each value and specific indicators (ie, if the node is required, and its maximum size in number of characters).

## Available resources

| Resource | Description |
|----------|-------------|
| addresses | The Customer, Manufacturer and Customer addresses |
| attachments | The product Attachments |
| attachments/file | The product Attachments files |
| carriers | The Carriers that perform deliveries |
| cart_rules | Cart rules management (discount, promotions, ...) |
| carts | Customer's carts |
| categories | The product categories |
| combinations | The product combinations |
| configurations | Shop configuration, used to store miscellaneous parameters from the shop (maintenance, multi shop, email settings, ...) |
| contacts | Shop contacts |
| content_management_system | Content management system |
| countries | The countries available on the shop |
| currencies | The currencies installed on the shop |
| customer_messages | Customer services messages |
| customer_threads | Customer services threads |
| customers | The e-shop's customers |
| customizations | The product customizations |
| deliveries | Product deliveries |
| employees | The Employees |
| groups | The customer's groups |
| guests | The guests (customers not logged in) |
| image_types | The image types |
| images | The images |
| images/general/header | The shop's logo in the header |
| images/general/mail | The shop's logo in the e-mails |
| images/general/invoice | The shop's logo in the invoice |
| images/general/store_icon | The shop's logo as a favicon |
| images/products | The products images |
| images/categories | The categories images |
| images/manufacturers | The manufacturers images |
| images/suppliers | The suppliers images |
| images/stores | The stores images |
| images/customizations | The customizations images |
| languages | Shop languages |
| manufacturers | The product manufacturers |
| messages | The customers messages |
| order_carriers | The order carriers |
| order_details | Details of an order |
| order_histories | The Order histories |
| order_invoices |The Order invoices |
| order_payments |The Order payments |
| order_slip | The Order slips (used for refund) |
| order_states |The Order states (Waiting for transfer, Payment accepted, ...) |
| orders | The Customers orders |
| price_ranges | Price range |
| product_customization_fields | The Product customization fields |
| product_feature_values | The product feature values (Ceramic, Polyester, ... - Removable cover, Short sleeves, ...) |
| product_features | The product features (Composition, Property, ...) |
| product_option_values | The product options value (S, M, L, ... - White, Camel, ...) |
| product_options | The product options (Size, Color, ...) |
| product_suppliers | Product Suppliers |
| products | The products |
| search | Search |
| shop_groups | Shop groups from multi-shop feature |
| shop_urls | Shop urls from multi-shop feature |
| shops | Shops from multi-shop feature |
| specific_price_rules | Specific price rules management |
| specific_prices | Specific price management |
| states | The available states of countries |
| stock_availables | Available quantities of products |
| stock_movement_reasons | The stock movement reason (Increase, Decrease, Custom Order, ...)  |
| stock_movements | Stock movements management |
| stocks | Stocks for products |
| stores | The stores |
| suppliers | The product suppliers |
| supply_order_details | Supply Order Details |
| supply_order_histories | Supply Order Histories |
| supply_order_receipt_histories | Supply Order Receipt Histories |
| supply_order_states | Supply Order States |
| supply_orders | Supply Orders |
| tags | The Products tags |
| tax_rule_groups | Group of Tax rule, along with their name |
| tax_rules | Tax rules, to associate Tax with a country, zip code, ... |
| taxes | The tax rate |
| translated_configurations | Shop configuration which are translated |
| warehouse_product_locations | Location of products in warehouses |
| warehouses | Warehouses |
| weight_ranges | Weight ranges for deliveries |
| zones | The Countries zones |

## Schema synopsis format

When displaying a resource schema in synopsis mode, the API gives some useful indication of the expected data type.

```xml
<?xml version="1.0" encoding="UTF-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
    <customer>
        <id_default_group></id_default_group>
        <id_lang format="isUnsignedId"></id_lang>
        <newsletter_date_add></newsletter_date_add>
        <ip_registration_newsletter></ip_registration_newsletter>
        <last_passwd_gen readOnly="true"></last_passwd_gen>
        <secure_key format="isMd5" readOnly="true"></secure_key>
        <deleted format="isBool"></deleted>
        <passwd required="true" maxSize="255" format="isPasswd"></passwd>
        <lastname required="true" maxSize="255" format="isCustomerName"></lastname>
        <firstname required="true" maxSize="255" format="isCustomerName"></firstname>
        <email required="true" maxSize="255" format="isEmail"></email>
        ...
    </customer>
</prestashop>
```

### Generic value types

| Format | Description | Expected format |
|--------|-------------|-----------------|
| isBool | A boolean value (true or false). | {{< code >}}0|1{{< /code >}} |
| isFloat | A floating-point value (between -3.4 × 10^38 and +3.4 × 10^38). | n/a |
| isInt | An integral value (between -2,147,483,648 and 2,147,483,647). | n/a |
| isJson | A valid JSON string. | n/a |
| isNullOrUnsignedId | An integral and unsigned value (between 0 and 4294967296), or a NULL value. | n/a |
| isSerializedArray | PHP serialized data. | {{< code >}}/^a:[0-9]+:{.*;}$/s{{< /code >}} |
| isString | A string of characters. | n/a |
| isUnsignedId | An integral and unsigned value (between 0 and 4294967296). | n/a |
| isUnsignedFloat | An floating-point and unsigned value (between 0 and +6.8 × 10^38). | n/a |

### Specific value types

| Format | Description | Expected format |
|--------|-------------|-----------------|
| isAnything | No validation | n/a |
| isApe | A valid APE code. | {{< code >}}/^[0-9]{3,4}[a-zA-Z]{1}$/s{{< /code >}} |
| isBirthDate | A valid date, in YYYY-MM-DD format. | n/a |
| isCleanHtml | Must not contain invalid HTML tags, nor XSS. | n/a |
| isColor | A valid HTML/CSS color, in #xxxxxx format or text format. | {{< code >}}/^(#[0-9a-fA-F]{6}|[a-zA-Z0-9-]*)$/{{< /code >}} |
| isDate | A valid date. | n/a |
| isDateFormat | A valid date format. | n/a |
| isEmail | A valid e-mail address. | n/a |
| isImageSize | A valid image size, between 0 and 9999. | {{< code >}}/^[0-9]{1,4}$/{{< /code >}} |
| isIp2Long | A valid IP for customer messages | {{< code >}}#^-?[0-9]+$#{{< /code >}} |
| isLanguageCode | A valid language code, in XX or XX-XX format. | {{< code >}}/^[a-zA-Z]{2}(-[a-zA-Z]{2})?$/{{< /code >}} |
| isLanguageIsoCode | A valid ISO language code, in XX or XXX format. | {{< code >}}/^[a-zA-Z]{2,3}$/{{< /code >}} |
| isLinkRewrite | A valid link rewrite. | {{< code >}}/^[_a-zA-Z0-9\-]+$/{{< /code >}} |
| isLocale | A valid locale code, in xx-XX format | {{< code >}}/^[a-z]{2}-[A-Z]{2}$/{{< /code >}} |
| isMd5 | A valid MD5 string: 32 characters, mixing lowercase, uppercase and numerals. | {{< code >}}/^[a-f0-9A-F]{32}$/{{< /code >}} |
| isNumericIsoCode | A valid ISO code, in 000 format. | {{< code >}}/^[0-9]{3}$/{{< /code >}} |
| isPasswd | A valid password, in. between 5 and 72 characters long. | {{< code >}}/^[.a-zA-Z_0-9-!@#$%\^&*()]{5,72}$/{{< /code >}} |
| isPasswdAdmin | A valid password, between 8 and 72 characters long. | {{< code >}}/^[.a-zA-Z_0-9-!@#$%\^&*()]{8,22}$/{{< /code >}} |
| isPercentage | A valid percentage: float between 0 and 100 | n/a |
| isPhpDateFormat | A valid PHP date – in fact, a string without '<' nor '>'. | {{< code >}}/^[^<>]+$/{{< /code >}} |
| isPriceDisplayMethod | A valid price display method, meaning the value be equals to constants `PS_TAX_EXC` or `PS_TAX_INC`. | {{< code >}}0|1{{< /code >}} |
| isReductionType | A valid reduction type. | {{< code >}}amount|percentage{{< /code >}} |
| isReference | A valid product reference. | {{< code >}}/^[^<>;={}]*$/u{{< /code >}} |
| isSha1 | A valid SHA1 string: 40 characters, mixing lowercase, uppercase and numerals. | {{< code >}}/^[a-fA-F0-9]{40}$/{{< /code >}} |
| isThemeName | A theme name. | {{< code >}}/^[\w-]{3,255}$/u{{< /code >}} |
| isTrackingNumber | A valid tracking number. | {{< code >}}/^[~:#,%&_=\(\)\[\]\.\? \+\-@\/a-zA-Z0-9]+$/{{< /code >}} |
| isUrl | A valid URL. | {{< code >}}/^[~:#,$%&_=\(\)\.\? \+\-@\/a-zA-Z0-9\pL\pS-]+$/u{{< /code >}} |
| isStockManagement | A stock management. | {{< code >}}WA|FIFO|LIFO{{< /code >}} |

### Names

| Format | Description | Expected format |
|--------|-------------|-----------------|
| isCatalogName | A valid product or category name. | {{< code >}}/^[^<>;=#{}]*$/u{{< /code >}} |
| isCarrierName | A valid carrier name. | {{< code >}}/^[^<>;=#{}]*$/u{{< /code >}} |
| isConfigName | A valid configuration key. | {{< code >}}/^[a-zA-Z_0-9-]+$/{{< /code >}} |
| isCustomerName | A valid customer name. | see `PrestaShop\PrestaShop\Core\ConstraintValidator\CustomerNameValidator` |
| isGenericName | A valid standard name. | {{< code >}}/^[^<>={}]*$/u{{< /code >}} |
| isImageTypeName | A valid image type. | {{< code >}}/^[a-zA-Z0-9_ -]+$/{{< /code >}} |
| isModuleName | A valid module name. | {{< code >}}/^[a-zA-Z0-9_-]+$/{{< /code >}} |
| isName | A valid name. | {{< code >}}/^[^0-9!<>,;?=+()@#"°{}_$%:¤|]*$/u{{< /code >}} |
| isTplName | A valid template name. | {{< code >}}/^[a-zA-Z0-9_-]+$/{{< /code >}} |

### Locations

| Format | Description | Expected format |
|--------|-------------|-----------------|
| isAddress | A valid postal address. | {{< code >}}/^[^!<>?=+@{}_$%]*$/u{{< /code >}} |
| isDniLite | A valid DNI (Documento Nacional de Identidad) identifier. Specific to some Spanish speaking countries or any country configured with DNI field. | {{< code >}}/^[0-9A-Za-z-.]{1,16}$/U{{< /code >}} |
| isCityName | A valid city name. | {{< code >}}/^[^!<>;?=+@#"°{}_$%]*$/u{{< /code >}} |
| isCoordinate | A valid latitude-longitude coordinates, in 00000.0000 form. | {{< code >}}/^\-?[0-9]{1,8}\.[0-9]{1,8}$/s{{< /code >}} |
| isMessage | A valid message. | {{< code >}}/[<>{}]/i{{< /code >}} |
| isPhoneNumber | A valid phone number. | {{< code >}}/^[+0-9. ()\/-]*$/{{< /code >}} |
| isPostCode | A valid postal code. | {{< code >}}/^[a-zA-Z 0-9-]+$/{{< /code >}} |
| isStateIsoCode | A valid state ISO code. | {{< code >}}/^[a-zA-Z0-9]{1,4}((-)[a-zA-Z0-9]{1,4})?$/{{< /code >}} |
| isZipCodeFormat | A valid zipcode format. | {{< code >}}/^[NLCnlc 0-9-]+$/{{< /code >}} |

### Products

| Format | Description | Expected format |
|--------|-------------|-----------------|
| isAbsoluteUrl | A valid absolute URL. | {{< code >}}/^(https?:)?\/\/[$~:;#,%&_=\(\)\[\]\.\? \+\-@\/a-zA-Z0-9]+$/{{< /code >}} |
| isEan13 | A valid barcode (EAN13). | {{< code >}}/^[0-9]{0,13}$/{{< /code >}} |
| isIsbn | A valid barcode (ISBN). | {{< code >}}/^[0-9-]{0,32}$/{{< /code >}} |
| isLinkRewrite | A valid friendly URL. | {{< code >}}/^[_a-zA-Z0-9\-]+$/{{< /code >}} |
|  | A valid friendly URL (with `PS_ALLOW_ACCENTED_CHARS_URL` enabled). | {{< code >}}/^[_a-zA-Z0-9\x{0600}-\x{06FF}\pL\pS-]+$/u{{< /code >}} |
| isMpn | A valid mpn (Manufacturer Part Number) 40 characters max. | n/a |
| isNegativePrice | A valid price value (including negative price) | {{< code >}}/^[-]?[0-9]{1,10}(\.[0-9]{1,9})?$/{{< /code >}} |
| isPrice | A valid price display method (either PS_TAX_EXC or PS_TAX_INC). | {{< code >}}0|1{{< /code >}} |
| isProductVisibility | A valid product visibility. | {{< code >}}/^both|catalog|search|none$/i{{< /code >}} |
| isUpc | A valid barcode (UPC). | {{< code >}}/^[0-9]{0,12}$/{{< /code >}} |
