---
title: Create aPproduct from A to Z with the Webservices
menuTitle: Product from A to Z
weight: 6
---

# Create a product from A to Z with the Webservices

In this guide, we will show you how to handle the creation and manipulation of a `Product`, and its dependencies, from the Webservices. 

We will first create a `Supplier` and a `Manufacturer`. Secondly, we will create a `Category` to put our `Product` in. 

From this point, we will be able to add the `Product`. 

When the `Product` will be added, we will add some `Stocks`, upload an `Image`, and manage some multi-language content. 

We will illustrate those examples [with a Postman Collection]({{<relref "/8/webservice/tutorials/testing-webservice-postman">}}), that you can download and run against your own's PrestaShop Webservices. 

[Download the Postman Collection](https://github.com/PrestaShop/webservice-postman-examples/blob/main/demo_product_az_collection.json)

## Create a Supplier and Manufacturer

Altough optional, having `Manufacturer` and `Supplier` will help managing your stock and business. 

You have to send a request for each `Manufacturer` and `Supplier` to the Webservices before creating your `Product`. 

### Create a Manufacturer

Send a `POST` request to `/api/manufacturers` with this body: 

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

Send a `POST` request to `/api/suppliers` with this body: 

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

We will then create a `Category` to put our `Product` in. 

Send a `POST` request to `/api/categories` with this body:

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

Retrieve the newly created category `ID` from the Webservices's response.

{{% notice note %}}
Related request in the Postman collection: 

3 - Create category
{{% /notice %}}

## Create the Product

Now that we have all minimum `Product` dependencies, we can create a minimum `Product`.

Send a `POST` request to `/api/products` with this body: 

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

This will create a `Product`, of type: `ProductType::TYPE_STANDARD`, associated to the shop with `id:1`.

{{% notice note %}}
Related request in the Postman collection: 

4 - Create product
{{% /notice %}}

## Add some Stock to Product

When a `Product` entity is created, a matching `Stock_Available` entity is created. 

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

Then, update the available quantities by sending a `PATCH` request to `/api/stock_availables/{{id}}` (with `{{id}}` the previously retrieved stock_available entity id). 

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
Depending on your stock management strategy (`Share available quantities for sale` between shops, in `back office > Advanced Parameters > Multistore > Edit shop group`), you need to provide an `id_shop` (per shop stock) or an `id_shop_group` (shared shop stock) to the request.
{{% /notice %}}

## Upload an Image on the Product

To upload an Image on your Product, send a `POST` request to `/api/images/products/{{product_id}}` (with `{{id}}` the newly created Product entity id). 

Add an `image` form-data input in the body of the request, with your image content attached. 

{{% notice note %}}
Related request in the Postman collection: 

6 - Upload image
{{% /notice %}}

## Manage multi-lang content

Considering you have 2 languages set in your PrestaShop instance, let's say: 

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

## Create a ProductType::TYPE_COMBINATIONS Product

To create a Combination Product Type, you need to create your `Product` and then your `Combinations`. 

### Create the Product

Change in the xml body of the [Product creation request]({{< relref "#create-the-product" >}}), on the `<product_type>` node, the value from `standard` to `combinations`.

Send a `POST` request to `/api/products` with this body: 

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

### Create the Combinations

Send two `POST` requests to `/api/combinations` to create your combinations, with `{{id_product}}` your previously created product id. 

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
    </combination>
</prestashop>
```

{{% notice note %}}
Related request in the Postman collection: 

9 - Create Combinations
{{% /notice %}}

{{% notice info %}}
When a `Combination` is created, a matching `Stock_available` entity is created. To update the stocks of a `Combination`, query the `Stocks_available` endpoint with the id of the product or the id of the combination to retrieve the `Stock_available` entity, and update it with a `PATCH` or `PUT` query. 

You can also add images to the `Combination` with the same method as a `Product` (send a `POST` request to `/api/images/products/{{id_product}}/{{id_combination}}`). 
{{% /notice %}}