---
title: Create a product from start to finish with Webservices
menuTitle: Creating a product - complete guide
weight: 6
---

# Create a product from start to finish with Webservices

This guide will demonstrate how to create and manipulate a `Product` and its dependencies from the Webservices.

Firstly, we will generate a `Supplier` and a `Manufacturer`. Secondly, we will establish a `Category` to organize our `Product`.

Once the `Product` is added, we'll include some `Stocks`, upload an `Image`, and handle multi-language content.

Finally, we'll explain how to manage `Features`, `Combinations` and `Attributes`.

We will illustrate those examples [with a Postman Collection]({{<relref "/8/webservice/tutorials/testing-webservice-postman">}}), that you can download and run against your own PrestaShop Webservices. 

[Download the Postman Collection](https://github.com/PrestaShop/webservice-postman-examples/blob/main/demo_product_az.json)

## Create a Supplier and Manufacturer

Although optional, having both `Manufacturer` and `Supplier` information will assist in managing your stock and business efficiently.

You have to send a request for each `Manufacturer` and `Supplier` to the Webservices before creating your `Product`. 

### Create a Manufacturer

Send a `POST` request to `/api/manufacturers` with the following body: 

```xml
<?xml version="1.0" encoding="UTF-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
    <manufacturer>
        <name>ACMEManufacturer</name>
    </manufacturer>
</prestashop>
```

Retrieve the newly created manufacturer `ID` from the Webservices's response: 

```xml
<?xml version="1.0" encoding="UTF-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
    <manufacturer>
        <id>
            <![CDATA[4]]>
        </id>
        <active>
            <![CDATA[]]>
        </active>
        <link_rewrite notFilterable="true">
            <![CDATA[acmemanufacturer]]>
        </link_rewrite>
        <name>
            <![CDATA[ACMEManufacturer]]>
        </name>
        <date_add>
            <![CDATA[2023-08-07 09:31:06]]>
        </date_add>
        <date_upd>
            <![CDATA[2023-08-07 09:31:06]]>
        </date_upd>
        <description>
            <language id="1">
                <![CDATA[]]>
            </language>
        </description>
        <short_description>
            <language id="1">
                <![CDATA[]]>
            </language>
        </short_description>
        <meta_title>
            <language id="1">
                <![CDATA[]]>
            </language>
        </meta_title>
        <meta_description>
            <language id="1">
                <![CDATA[]]>
            </language>
        </meta_description>
        <meta_keywords>
            <language id="1">
                <![CDATA[]]>
            </language>
        </meta_keywords>
        <associations>
            <addresses nodeType="address" api="addresses"/>
        </associations>
    </manufacturer>
</prestashop>
```

{{% notice note %}}
Related request in the Postman collection: 

1 - Create manufacturer
{{% /notice %}}

### Create a Supplier

Send a `POST` request to `/api/suppliers` with the following body: 

```xml
<?xml version="1.0" encoding="UTF-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
    <supplier>
        <name>ACMESupplier</name>
    </supplier>
</prestashop>
```

Retrieve the newly created supplier `ID` from the Webservices's response.

{{% notice note %}}
Related request in the Postman collection: 

2 - Create supplier
{{% /notice %}}

## Create a Category for our Product

Let's create a designated `Category` for our `Product`.

Send a `POST` request to `/api/categories` with the following body:

```xml
<?xml version="1.0" encoding="UTF-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
<category>
    <name>
        <language id="1"><![CDATA[Category demo]]></language>
    </name>
    <link_rewrite>
        <language id="1"><![CDATA[category-demo]]></language>
    </link_rewrite>
    <description>
        <language id="1"><![CDATA[my awesome category description]]></language>
    </description>
    <active>1</active>
    <id_parent>1</id_parent>
</category>
</prestashop>
```
Ensure the provided `Language` ID corresponds to your `Language` ID in your back office.

Retrieve the newly created category `ID` from the Webservices's response.

{{% notice note %}}
Related request in the Postman collection: 

3 - Create category
{{% /notice %}}

## Create the Product

Now that the required dependencies are in place, we can move forward with crafting the minimum viable product.

Send a `POST` request to `/api/products` with the following body: 

```xml
<?xml version="1.0" encoding="UTF-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
<product>
    <id_manufacturer><![CDATA[1]]></id_manufacturer>
    <id_supplier><![CDATA[1]]></id_supplier>
    <id_category_default><![CDATA[1]]></id_category_default>
    <new><![CDATA[1]]></new>
    <id_default_combination><![CDATA[1]]></id_default_combination>
    <id_tax_rules_group><![CDATA[1]]></id_tax_rules_group>
    <type><![CDATA[1]]></type>
    <id_shop_default><![CDATA[1]]></id_shop_default>
    <reference><![CDATA[123456]]></reference>
    <supplier_reference><![CDATA[ABCDEF]]></supplier_reference>
    <ean13><![CDATA[1231231231231]]></ean13>
    <state><![CDATA[1]]></state>
    <product_type><![CDATA[standard]]></product_type>
    <price><![CDATA[123.45]]></price>
    <unit_price><![CDATA[123.45]]></unit_price>
    <active><![CDATA[1]]></active>
    <meta_description>
        <language id="1"><![CDATA[Description]]></language>
    </meta_description>
    <meta_keywords>
        <language id="1"><![CDATA[Keywords]]></language>
    </meta_keywords>
    <meta_title>
        <language id="1"><![CDATA[My Title for SEO]]></language>
    </meta_title>
    <link_rewrite>
        <language id="1"><![CDATA[awesome-product]]></language>
    </link_rewrite>
    <name>
        <language id="1"><![CDATA[My awesome Product]]></language>
    </name>
    <description>
        <language id="1"><![CDATA[Description]]></language>
    </description>
    <description_short>
        <language id="1"><![CDATA[Short description]]></language>
    </description_short>
    <associations>
        <categories>
            <category>
                <id><![CDATA[1]]></id>
            </category>
        </categories>
    </associations>
</product>
</prestashop>
```

Replace `id_manufacturer`, `id_supplier`, `id_category_default`, `associations > categories > category > id` with the retrieved IDs from the previously created entities.

This will create a `Product`, of type: `ProductType::TYPE_STANDARD`, associated with the `Shop` with `id:1`.

{{% notice note %}}
Related request in the Postman collection: 

4 - Create product
{{% /notice %}}

## Product Stock management

Whenever a `Product` entity is formed, a corresponding `Stock_Available` record is also generated and inserted to the database.

We first need to retrieve this entity, to be able to update its value.

Send a `GET` request to /api/stock_available with additionnal parameters: 

- `filter[id_product]`, with the newly created `Product` id as value
- `display`, with value: `full`

Eg. `{{webservice_url}}/api/stock_availables?filter[id_product]={{product_id}}&display=full`.

You will receive the full information about your Product's Stock_Available: 

{{% notice note %}}
Related request in the Postman collection: 

5 - Get stock available
{{% /notice %}}

```xml
<?xml version="1.0" encoding="UTF-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
    <stock_availables>
        <stock_available>
            <id>
                <![CDATA[67]]>
            </id>
            <id_product xlink:href="http://localhost:8080/api/products/27">
                <![CDATA[27]]>
            </id_product>
            <id_product_attribute>
                <![CDATA[0]]>
            </id_product_attribute>
            <id_shop xlink:href="http://localhost:8080/api/shops/1">
                <![CDATA[1]]>
            </id_shop>
            <id_shop_group>
                <![CDATA[0]]>
            </id_shop_group>
            <quantity>
                <![CDATA[0]]>
            </quantity>
            <depends_on_stock>
                <![CDATA[0]]>
            </depends_on_stock>
            <out_of_stock>
                <![CDATA[2]]>
            </out_of_stock>
            <location>
                <![CDATA[]]>
            </location>
        </stock_available>
    </stock_availables>
</prestashop>
```

You can update the available quantities by sending a `PATCH` request to `/api/stock_availables/{{id}}` (with `{{id}}` the previously retrieved stock_available entity id). 

In this example, the returned stock_available entity id was: `67`.

```xml
<?xml version="1.0" encoding="UTF-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
    <stock_available>
        <id><![CDATA[67]]></id>
        <quantity><![CDATA[10]]></quantity>
    </stock_available>
</prestashop>
```

{{% notice note %}}
Related request in the Postman collection: 

5 - Update stock available
{{% /notice %}}

### Complete update of the Stock_available entity

You can also update the whole `Stock_available` entity by changing the `PATCH` request to a `PUT` request, and provide all the fields. 
 
{{% notice note %}}
Related request in the Postman collection: 

5 - Update stock available - complete
{{% /notice %}}

{{% notice info %}}
Depending on your stock management strategy (`Share available quantities for sale` between shops, in the `Back office > Advanced Parameters > Multistore > Edit shop group`), you need to provide an `id_shop` (per shop stock) or an `id_shop_group` (shared shop stock) to the request.
{{% /notice %}}

## Product images management

To upload an `Image` to your `Product`, send a `POST` request to `/api/images/products/{{product_id}}` (with `{{id}}` of the newly created `Product` entity). 

Add an `image` form-data input in the body of the request, with your image content attached. 

{{% notice note %}}
Related request in the Postman collection: 

6 - Upload image
{{% /notice %}}

## Manage multi-lang content

If you have two languages set up in your PrestaShop instance, for example:

- `id:1` - English
- `id:2` - French

You can add translations for your multi-lang fields on your `Product` by sending a `PATCH` request on `/api/products/{{id}}` (with `{{id}}` your product id) with this body: 

```xml
<?xml version="1.0" encoding="UTF-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
    <product>
        <id><![CDATA[{{id}}]]></id>
        <meta_description>
            <language id="1"><![CDATA[Meta English description]]></language>
            <language id="2"><![CDATA[Description meta en français]]></language>
        </meta_description>
        <meta_keywords>
            <language id="1"><![CDATA[EN keyworkds]]></language>
            <language id="2"><![CDATA[Mots clés FR]]></language>
        </meta_keywords>
        <meta_title>    
            <language id="1"><![CDATA[English Title]]></language>
            <language id="2"><![CDATA[Titre en Francais]]></language>
        </meta_title>
        <link_rewrite>
            <language id="1"><![CDATA[english-title]]></language>
            <language id="2"><![CDATA[titre-francais]]></language>
        </link_rewrite>
        <name>
            <language id="1"><![CDATA[Product name]]></language>
            <language id="2"><![CDATA[Nom du produit]]></language>
        </name>
        <description>
            <language id="1"><![CDATA[English Description]]></language>
            <language id="2"><![CDATA[Description en français]]></language>
        </description>
        <description_short>
            <language id="1"><![CDATA[Short English description]]></language>
            <language id="2"><![CDATA[Description courte en français]]></language>
        </description_short>
    </product>
</prestashop>
```

{{% notice note %}}
Related request in the Postman collection: 

7 - Update multi-lang fields
{{% /notice %}}

## Product Features

`Features` are a way to describe and filter your `Products`. [Learn the differences between `Features` and `Attributes`](https://docs.prestashop-project.org/v.8-documentation/user-guide/selling/managing-catalog/managing-product-features).

### Use an existing Feature and Feature Value

From the Back Office, identify the `Feature` and the `Feature Value` that you will use in your `Product`. 

You need to retrieve the ID of the `Feature Value`. 

### Create a Feature and a Feature Value

To create a new `Feature`, send a `POST` request to `/api/product_features` with the following body: 

```xml
<?xml version="1.0" encoding="UTF-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
    <product_feature>
        <name>
            <language id="1"><![CDATA[{{feature_name}}]]></language>
        </name>
    </product_feature>
</prestashop>
```

{{% notice note %}}
Related request in the Postman collection: 

12 - Create Feature
{{% /notice %}}

Retrieve the `id` of the `Feature` created, and create your `Feature Value` by sending a `POST` request to `/api/product_feature_values`: 

```xml
<?xml version="1.0" encoding="UTF-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
    <product_feature_value>
        <id_feature><![CDATA[{{id_feature}}]]></id_feature>
        <value>
            <language id="1"><![CDATA[{{value}}]]></language>
        </value>
    </product_feature_value>
</prestashop>
```

{{% notice note %}}
Related request in the Postman collection: 

13 - Create Feature value
{{% /notice %}}

### Associate your Feature Value to your Product

When creating or updating a `Product`, fill the `associations > product_features > product_feature` node with the `ID` of the  `Feature` and the `ID` of the `Feature Value` retrieved from the Back Office or created with the webservice.

```xml
<?xml version="1.0" encoding="UTF-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
    <product>
        [...]
	<associations>
            <product_features>
                <product_feature>
                    <id><![CDATA[{{id_feature}}]]></id>
                    <id_feature_value><![CDATA[{{id_feature_value}}]]></id_feature_value>
                </product_feature>
            </product_features>
        </associations>
        [...]
    </product>
</prestashop>
```

{{% notice note %}}
Related request in the Postman collection: 

14 - Associate Feature to Product
{{% /notice %}}


## Create a Product with Combinations - ProductType::TYPE_COMBINATIONS

`Combinations` (or product variations) are a way to work with different versions of a `Product` (for examples sizes, colors, ...), by varying `Attributes`. [Learn the differences between `Features` and `Attributes`](https://docs.prestashop-project.org/v.8-documentation/user-guide/selling/managing-catalog/managing-product-features).

To create a Product with Combinations, you must make your `Product`, create or identify an `Attribute` to vary, and then add your `Combinations`. 

### Create the Product

Change XML body of the [Product creation request]({{< relref "#create-the-product" >}}). Modify `<product_type>` node, and replace `standard` with `combinations`.

Send a `POST` request to `/api/products` with the following body: 

```xml
<?xml version="1.0" encoding="UTF-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
    <product>
        <id_manufacturer><![CDATA[1]]></id_manufacturer>
        <id_supplier><![CDATA[1]]></id_supplier>
        <id_category_default><![CDATA[1]]></id_category_default>
        <new><![CDATA[1]]></new>
        <id_default_combination><![CDATA[1]]></id_default_combination>
        <id_tax_rules_group><![CDATA[1]]></id_tax_rules_group>
        <type><![CDATA[1]]></type>
        <id_shop_default><![CDATA[1]]></id_shop_default>
        <reference><![CDATA[123456]]></reference>
        <supplier_reference><![CDATA[ABCDEF]]></supplier_reference>
        <ean13><![CDATA[1231231231231]]></ean13>
        <state><![CDATA[1]]></state>
        <product_type><![CDATA[combinations]]></product_type>
        <price><![CDATA[123.45]]></price>
        <unit_price><![CDATA[123.45]]></unit_price>
        <active><![CDATA[1]]></active>
        <meta_description>
            <language id="1"><![CDATA[Description]]></language>
        </meta_description>
        <meta_keywords>
            <language id="1"><![CDATA[Keywords]]></language>
        </meta_keywords>
        <meta_title>
            <language id="1"><![CDATA[My Title for SEO]]></language>
        </meta_title>
        <link_rewrite>
            <language id="1"><![CDATA[awesome-product]]></language>
        </link_rewrite>
        <name>
            <language id="1"><![CDATA[My awesome Product with combinations]]></language>
        </name>
        <description>
            <language id="1"><![CDATA[Description]]></language>
        </description>
        <description_short>
            <language id="1"><![CDATA[Short description]]></language>
        </description_short>
        <associations>
            <categories>
                <category>
                    <id><![CDATA[1]]></id>
                </category>
            </categories>
        </associations>
    </product>
</prestashop>
```

{{% notice note %}}
Related request in the Postman collection: 

8 - Create Combination Product
{{% /notice %}}

### Create or identify an Attribute Value

#### Use an existing Attribute and Attribute Value

From the Back Office, identify the `Attribute` and the `Attribute Value` that you will declinate. 

You need to retrieve the ID of the `Attribute Value`. 

#### Create an Attribute and Attribute Value

To create a new `Attribute`, send a `POST` request to `/api/product_options` with the following body: 

```xml
<?xml version="1.0" encoding="UTF-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
    <product_option>
        <is_color_group><![CDATA[0]]></is_color_group>
        <group_type><![CDATA[select]]></group_type>
        <name>
            <language id="1"><![CDATA[{{attribute_name}}]]></language>
        </name>
        <public_name>
            <language id="1"><![CDATA[{{attribute_name}}]]></language>
        </public_name>
    </product_option>
</prestashop>
```

{{% notice note %}}
Related request in the Postman collection: 

9 - Create Product option 
{{% /notice %}}

For the `group_type` attribute, you can choose between `radio` (radio input type) or `select` (select / option input type). 
You can also choose `color` for this attribute, and set `is_color_group` to `1` to make your `Attribute` a swatch to select colors.

Retrieve the `id` of the `Attribute` created, and create your `Attribute Values` by sending a `POST` request to `/api/product_option_values`: 

```xml
<?xml version="1.0" encoding="UTF-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
    <product_option_value>
        <id_attribute_group><![CDATA[{{id_product_attribute}}]]></id_attribute_group>
        <name>
            <language id="1"><![CDATA[{{attribute_value_name}}]]></language>
        </name>
    </product_option_value>
</prestashop>
```

{{% notice note %}}
Related request in the Postman collection: 

10 - Create Product option value
{{% /notice %}}

### Create the Combinations

Send as many `POST` requests to `/api/combinations` as combinations to be created. Use `{{id_product}}` of your previously created `Product`, and `{{id_product_attribute_value}}` previously retrieved (from existing values in the Back Office or created with the webservice). 

```xml
<?xml version="1.0" encoding="UTF-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
    <combination>
        <id_product><![CDATA[{{id_product}}]]></id_product>
        <ean13><![CDATA[1234567890123]]></ean13>
        <mpn><![CDATA[123456]]></mpn>
        <reference><![CDATA[demo_1]]></reference>
        <supplier_reference><![CDATA[mfr_1]]></supplier_reference>
        <price><![CDATA[10.000000]]></price>
        <associations>
            <product_option_values nodeType="product_option_value" api="product_option_values">
                <product_option_value>
                    <id><![CDATA[{{id_product_attribute_value}}]]></id>
                </product_option_value>
            </product_option_values>
        </associations>
    </combination>
</prestashop>
```

{{% notice note %}}
Related request in the Postman collection: 

11 - Create Combinations
{{% /notice %}}

{{% notice info %}}
When a `Combination` is created, a matching `Stock_available` entity is created. To update the stocks of a `Combination`, query the `Stocks_available` endpoint with the id of the product or the id of the combination to retrieve the `Stock_available` entity, and update it with a `PATCH` or `PUT` query. 

You can also add images to the `Combination` with the same method as a `Product` (send a `POST` request to `/api/images/products/{{id_product}}/{{id_combination}}`). 
{{% /notice %}}
