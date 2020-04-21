---
title: Reference
weight: 3
---

# Web service reference

All webservice APIs are accessible through the `/api/` gateway. For instance, `http://example.com/api/carriers`

## Available HTTP methods

Most resources can be accessed in a REST manner, with the 5 main HTTP request methods: GET, POST, PUT, DELETE, HEAD. The only exceptions are:

- `search`: only GET and HEAD.
- `stock_availables`: only GET, POST, and HEAD.
- `stock_movements`: only GET and HEAD.
- `stocks`: only GET and HEAD.
- `supply_order_details`: only GET and HEAD.
- `supply_order_histories`: only GET and HEAD.
- `supply_order_receipt_histories`: only GET and HEAD.
- `supply_order_states`: only GET and HEAD.
- `supply_orders`: only GET and HEAD.
- `warehouse_product_locations`: only GET and HEAD.
- `warehouses`: only GET, POST, PUT, and HEAD.

All resources have two schemas that are accessible via a parameter:

- `?schema=blank`: returns a blank XML tree of the chosen resource.
- `?schema=synopsis`: returns a blank XML tree of the chosen resource, with the format that is expected for each value and specific indicators (ie, if the node is required, and its maximum size in number of characters).

## Available resources

| Resource | Description |
|----------|-------------|
| addresses | The Customer, Manufacturer and Customer addresses |
| carriers | The Carriers |
| cart_rules | Cart rules management |
| carts | Customer's carts |
| categories | The product categories |
| combinations | The product combination |
| configurations | Shop configuration |
| contacts | Shop contacts |
| content_management_system | Content management system |
| countries | The countries |
| currencies | The currencies |
| customer_messages | Customer services messages |
| customer_threads | Customer services threads |
| customers | The e-shop's customers |
| deliveries | Product delivery |
| employees | The Employees |
| groups | The customer's groups |
| guests | The guests |
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
| languages | Shop languages |
| manufacturers | The product manufacturers |
| order_carriers |Details of an order |
| order_details | Details of an order |
| order_discounts | Discounts of an order |
| order_histories | The Order histories |
| order_invoices |The Order invoices |
| order_payments |The Order payments |
| order_states |The Order states |
| orders | The Customers orders |
| price_ranges | Price range |
| product_feature_values | The product feature values |
| product_features | The product features |
| product_option_values | The product options value |
| product_options | The product options |
| product_suppliers | Product Suppliers |
| products | The products |
| search | Search |
| shop_groups | Shop groups from multi-shop feature |
| shops |Shops from multi-shop feature |
| specific_price_rules |Specific price management |
| specific_prices | Specific price management |
| states | The available states of countries |
| stock_availables | Available quantities |
| stock_movement_reasons | The stock movement reason |
| stock_movements | Stock movements management |
| stocks |Stocks |
| stores | The stores |
| suppliers | The product suppliers |
| supply_order_details | Supply Order Details |
| supply_order_histories |Supply Order Histories |
| supply_order_receipt_histories | Supply Order Receipt Histories |
| supply_order_states | Supply Order States |
| supply_orders | Supply Orders |
| tags |The Products tags |
| tax_rule_groups | Tax rule groups |
| tax_rules | Tax rules entity |
| taxes | The tax rate |
| translated_configurations | Shop configuration |
| warehouse_product_locations | Location of products in warehouses |
| warehouses | Warehouses |
| weight_ranges | Weight ranges |
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

| Format | Description | Expected value |
|--------|-------------|----------------|
| isBool | A boolean value (true or false). | {{< code >}}0|1{{< /code >}} |
| isFloat | A floating-point value (between -3.4 × 10^38 and +3.4 × 10^38). | n/a |
| isInt | An integral value (between -2,147,483,648 and 2,147,483,647). | n/a |
| isNullOrUnsignedId | An integral and unsigned value (between 0 and 4294967296), or a NULL value. | n/a |
| isSerializedArray | PHP serialized data. | {{< code >}}/^a:[0-9]+:{.*;}$/s{{< /code >}} |
| isString | A string of characters. | n/a |
| isUnsignedId | An integral and unsigned value (between 0 and 4294967296). | n/a |

### Specific value types

| Format | Description | Expected value |
|--------|-------------|----------------|
| isBirthDate | A valid date, in YYYY-MM-DD format. | n/a |
| isCleanHtml | Must not contain invalid HTML tags, nor XSS. | n/a |
| isColor | A valid HTML/CSS color, in #xxxxxx format or text format. | {{< code >}}/^(#[0-9a-fA-F]{6}|[a-zA-Z0-9-]*)$/{{< /code >}} |
| isEmail | A valid e-mail address. | n/a |
| isImageSize | A valid image size, between 0 and 9999. | {{< code >}}/^[0-9]{1,4}$/{{< /code >}} |
| isLanguageCode | A valid language code, in XX or XX-XX format. | {{< code >}}/^[a-zA-Z]{2}(-[a-zA-Z]{2})?$/{{< /code >}} |
| isLanguageIsoCode | A valid ISO language code, in XX or XXX format. | {{< code >}}/^[a-zA-Z]{2,3}$/{{< /code >}} |
| isLinkRewrite | A valid link rewrite. | {{< code >}}/^[_a-zA-Z0-9-]+$/{{< /code >}} |
| isMd5 | A valid MD5 string: 32 characters, mixing lowercase, uppercase and numerals. | {{< code >}}/^[a-f0-9A-F]{32}$/{{< /code >}} |
| isNumericIsoCode | A valid ISO code, in 00 or 000 format. | {{< code >}}/^[0-9]{2,3}$/{{< /code >}} |
| isPasswd | A valid password, in. between 5 and 32 characters long. | {{< code >}}/^[.a-zA-Z_0-9-!@#$%\^&*()]{5,32}$/{{< /code >}} |
| isPasswdAdmin | A valid password, between 8 and 32 characters long. | {{< code >}}/^[.a-zA-Z_0-9-!@#$%\^&*()]{8,32}$/{{< /code >}} |
| isPhpDateFormat | A valid PHP date – in fact, a string without '<' nor '>'. | {{< code >}}/^[^<>]+$/{{< /code >}} |
| isPriceDisplayMethod | A valid price display method, meaning the value be equals to constants `PS_TAX_EXC` or `PS_TAX_INC`. | {{< code >}}0|1{{< /code >}} |
| isReference | A valid product reference. | {{< code >}}/^[^<>;={}]*$/u{{< /code >}} |
| isUrl | A valid URL. | {{< code >}}/^[~:#,%&_=\(\)\.\? \+\-@\/a-zA-Z0-9]+$/{{< /code >}} |

### Names

| Format | Description | Expected value |
|--------|-------------|----------------|
| isCatalogName | A valid product or category name. | {{< code >}}/^[^<>;=#{}]*$/u{{< /code >}} |
| isCarrierName | A valid carrier name. | {{< code >}}/^[^<>;=#{}]*$/u{{< /code >}} |
| isConfigName | A valid configuration key. | {{< code >}}/^[a-zA-Z_0-9-]+$/{{< /code >}} |
| isGenericName | A valid standard name. | {{< code >}}/^[^<>;=#{}]*$/u{{< /code >}} |
| isImageTypeName | A valid image type. | {{< code >}}/^[a-zA-Z0-9_ -]+$/{{< /code >}} |
| isName | A valid name. | {{< code >}}/^[^0-9!<>,;?=+()@#"°{}_$%:]*$/u{{< /code >}} |
| isTplName | A valid template name. | {{< code >}}/^[a-zA-Z0-9_-]+$/{{< /code >}} |

### Locations

| Format | Description | Expected value |
|--------|-------------|----------------|
| isAddress | A valid postal address. | {{< code >}}/^[^!<>?=+@{}_$%]*$/u{{< /code >}} |
| isCityName | A valid city name. | {{< code >}}/^[^!<>;?=+@#"°{}_$%]*$/u{{< /code >}} |
| isCoordinate | A valid latitude-longitude coordinates, in 00000.0000 form. | {{< code >}}/^\-?[0-9]{1,8}\.[0-9]{1,8}$/s{{< /code >}} |
| isMessage | A valid message. | {{< code >}}/[<>{}]/i{{< /code >}} |
| isPhoneNumber | A valid phone number. | {{< code >}}/^[+0-9. ()-]*$/{{< /code >}} |
| isPostCode | A valid postal code. | {{< code >}}/^[a-zA-Z 0-9-]+$/{{< /code >}} |
| isStateIsoCode | A valid state ISO code. | {{< code >}}/^[a-zA-Z0-9]{2,3}((-)[a-zA-Z0-9]{1,3})?$/{{< /code >}} |
| isZipCodeFormat | A valid zipcode format. | {{< code >}}/^[NLCnlc -]+$/{{< /code >}} |

### Products

| Format | Description | Expected value |
|--------|-------------|----------------|
| isAbsoluteUrl | A valid absolute URL. | {{< code >}}/^https?:\/\/[:#%&_=\(\)\.\? \+\-@\/a-zA-Z0-9]+$/{{< /code >}} |
| isDniLite | A valid DNI (Documento Nacional de Identidad) identifier. Specific to Spanish shops. | {{< code >}}/^[0-9A-Za-z-.]{1,16}$/U{{< /code >}} |
| isEan13 | A valid barcode (EAN13). | {{< code >}}/^[0-9]{0,13}$/{{< /code >}} |
| isLinkRewrite | A valid friendly URL. | {{< code >}}/^[_a-zA-Z0-9-]+$/{{< /code >}} |
| isPrice | A valid price display method (either PS_TAX_EXC or PS_TAX_INC). | {{< code >}}0|1{{< /code >}} |
| isUpc | A valid barcode (UPC). | {{< code >}}/^[0-9]{0,12}$/{{< /code >}} |
