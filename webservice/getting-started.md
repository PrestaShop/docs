---
title: Getting Started
weight: 10
showOnHomepage: true
---

# Getting Started

## About CRUD & REST

The PrestaShop web service uses the REST architecture in order to be available on as many platforms as possible, since the HTTP protocol and XML files are understood by most platforms, if not all.

{{% notice note %}}
[CRUD](https://en.wikipedia.org/wiki/Create,_read,_update_and_delete)
 is an acronym that stands for "Create, Read, Update, and Delete". These are the four basic operations for managing data in an application.

[REST](https://en.wikipedia.org/wiki/REST) defines roughly a style of software architecture, which promotes the use of HTTP methods when building web application, instead of custom methods or protocols such as SOAP or WSDL. It defines several rules, including one that is similar to CRUD, which is described below.
{{% /notice %}}

HTTP has several methods that can perform processing on data as defined in the REST architecture, among which are [5 main methods](https://en.wikipedia.org/wiki/HTTP#Request_methods):

| HTTP/REST | CRUD   | SQL    |
|-----------|--------|--------|
| POST      | Create | INSERT |
| GET       | Read   | SELECT |
| PUT       | Update | UPDATE |
| PATCH     | Update | UPDATE |
| DELETE    | Delete | DELETE |

## Enabling & Creating an access to the webservice

Reach the [dedicated page]({{< relref "tutorials/creating-access" >}}).

## Accessing the webservice

After generating your access key, you can proceed to test your store's webservice. The webservice endpoint is located in the '/api/' folder at the root of your PrestaShop installation. To test your API quickly, you can simply use your browser:

* If PrestaShop is installed at the root of your server, you can access the API here: http://example.com/api/
* If PrestaShop is installed in a subfolder of your server, you can access the API here: http://example.com/prestashop/api/

{{% notice warning %}}
The endpoint `/api` is reachable if URL is correctly rewritten to use it. For httpd, this is done by the `.htaccess` which means you need to make sure httpd is processing this file (it needs `mod_rewrite` enabled and VirtualHost must have `AllowOverride All`).
{{% /notice %}}

The shop should prompt you for a username and a password to enter. The username is the authentication key you created and **there is no password to enter**.

The second and more appropriate way to access the API is to include your access key in the url, this will prevent you from entering any user name.
This is also the recommended way to call the API from a javascript client, or any application. Here is an example, assuming your access API key is `UCCLLQ9N2ARSHWCXLT74KUKSSK34BFKX`:

* At the root of the server: https://UCCLLQ9N2ARSHWCXLT74KUKSSK34BFKX@example.com/api/
* In a subfolder of the server: https://UCCLLQ9N2ARSHWCXLT74KUKSSK34BFKX@example.com/prestashop/api/

{{% notice note %}}
To test/call your APIs we recommend you use an API client such as [Insomnia](https://insomnia.rest/) or [Postman](https://www.getpostman.com/), it is easier to call the APIs than with a browser, especially for write actions.
{{% /notice %}}

{{% notice warning %}}
As you noticed no password nor authentication process is required to access the APIs which is why you need to be **extra careful** with you access key rights and how (and to whom) you disclose them.
{{% /notice %}}

## Using your webservice API

### Describe a resource

When you call the root `/api` url you will get a summary of the available APIs you can call with your access token. In this example we see that we have all rights on the `/api/addresses` API:

```xml
<?xml version="1.0" encoding="UTF-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
    <api shopName="Prestashop">
        <addresses xlink:href="http://example.com/api/addresses" get="true" put="true" post="true" patch="true" delete="true" head="true">
            <description xlink:href="http://example.com/api/addresses" get="true" put="true" post="true" patch="true" delete="true" head="true">
            The Customer, Brand and Customer addresses</description>
            <schema xlink:href="http://example.com/api/addresses?schema=blank" type="blank"/>
            <schema xlink:href="http://example.com/api/addresses?schema=synopsis" type="synopsis"/>
        </addresses>
    </api>
</prestashop>
```

Each API comes with two schema APIs:

* `/api/RESOURCE?schema=synopsis` returns basic info on the API format, the name of fields and their type
* `/api/RESOURCE?schema=blank` will return a default blank data which you could use as a base for your write actions

Both calls are very much alike, only synopsis contains more information about the data format and types:

```xml
<?xml version="1.0" encoding="UTF-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
    <address>
        <id_customer format="isNullOrUnsignedId"></id_customer>
        <id_manufacturer format="isNullOrUnsignedId"></id_manufacturer>
        <id_supplier format="isNullOrUnsignedId"></id_supplier>
        <id_warehouse format="isNullOrUnsignedId"></id_warehouse>
        <id_country required="true" format="isUnsignedId"></id_country>
        <id_state format="isNullOrUnsignedId"></id_state>
        <alias required="true" maxSize="32" format="isGenericName"></alias>
        <company maxSize="255" format="isGenericName"></company>
        <lastname required="true" maxSize="255" format="isName"></lastname>
        <firstname required="true" maxSize="255" format="isName"></firstname>
        <vat_number format="isGenericName"></vat_number>
        <address1 required="true" maxSize="128" format="isAddress"></address1>
        <address2 maxSize="128" format="isAddress"></address2>
        <postcode maxSize="12" format="isPostCode"></postcode>
        <city required="true" maxSize="64" format="isCityName"></city>
        <other maxSize="300" format="isMessage"></other>
        <phone maxSize="32" format="isPhoneNumber"></phone>
        <phone_mobile maxSize="32" format="isPhoneNumber"></phone_mobile>
        <dni maxSize="16" format="isDniLite"></dni>
        <deleted format="isBool"></deleted>
        <date_add format="isDate"></date_add>
        <date_upd format="isDate"></date_upd>
    </address>
</prestashop>
```

### Read a resource

Each resource comes with an XLink argument. Using XLink, you will be able to access your various resources. XLink associates an XML file to another XML file via a link.
From our root API example we can see that we have access to `http://example.com/api/addresses` which will return the list of Addresses:

```xml
<?xml version="1.0" encoding="UTF-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
    <addresses>
        <address id="2" xlink:href="http://example.com/api/addresses/2"/>
        <address id="3" xlink:href="http://example.com/api/addresses/3"/>
        <address id="1" xlink:href="http://example.com/api/addresses/1"/>
        <address id="4" xlink:href="http://example.com/api/addresses/4"/>
    </addresses>
</prestashop>
```

{{% notice note %}}
You can notice that a resource API url always follow the same pattern:

* `http://example.com/api/RESOURCE_NAME` list a type of resource
* `http://example.com/api/RESOURCE_NAME/ID_RESOURCE` will return the information of the specified resource
{{% /notice %}}

Here is what a resource API call could look like (in this case `http://example.com/api/addresses/1`):

```xml
<?xml version="1.0" encoding="UTF-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
    <address>
        <id><![CDATA[1]]></id>
        <id_customer xlink:href="http://example.com/api/customers/1"><![CDATA[1]]></id_customer>
        <id_manufacturer><![CDATA[0]]></id_manufacturer>
        <id_supplier><![CDATA[0]]></id_supplier>
        <id_warehouse><![CDATA[0]]></id_warehouse>
        <id_country xlink:href="http://example.com/api/countries/8"><![CDATA[8]]></id_country>
        <id_state><![CDATA[0]]></id_state>
        <alias><![CDATA[Mon adresse]]></alias>
        <company><![CDATA[My Company]]></company>
        <lastname><![CDATA[DOE]]></lastname>
        <firstname><![CDATA[John]]></firstname>
        <vat_number></vat_number>
        <address1><![CDATA[16, Main street]]></address1>
        <address2><![CDATA[2nd floor]]></address2>
        <postcode><![CDATA[75002]]></postcode>
        <city><![CDATA[Paris ]]></city>
        <other></other>
        <phone><![CDATA[0102030405]]></phone>
        <phone_mobile></phone_mobile>
        <dni></dni>
        <deleted><![CDATA[0]]></deleted>
        <date_add><![CDATA[2019-01-15 22:46:55]]></date_add>
        <date_upd><![CDATA[2019-01-15 22:46:55]]></date_upd>
    </address>
</prestashop>
```

#### Available parameters

You can add these **GET** parameters to your request to modify the READ response:

* `display` to control which fields are returned
* `filter` to control which items are returned
* `language` to control which language values are returned

##### Control returned fields with "display"

The `display` parameter can be used to return all fields when used with the **full** value: `http://example.com/api/addresses/?display=full`.

You can also ask for certain fields if you use a list of fields names in brackets: `http://example.com/api/addresses/?display=[id,lastname,firstname,phone_mobile]`

{{% notice note %}}
This parameter can only be used for listings, not for individual records. If you want individual record with specific fields, you need to use both `display` and `filter` parameters.
{{% /notice %}}

{{% notice note %}}
A response obtained with "display" other than "full" can't be used in a **PUT** (update) request, because the `WebserviceRequest` class validation for fields is the same for **POST** (create) and **PUT** (update).

The **PATCH** method allows using a partial display.
{{% /notice %}}

##### Control returned items with "filter"

The **EQUAL** operator is used when you need to get specific items. For example, if you want the addresses for customer #1, you can filter your **GET** request with the `filter` parameter: `http://example.com/api/addresses?filter[id_customer]=1`

The **LIKE** operator is used when you need to search for items. For example, if you want the addresses with cities starting with "SAINT": `http://example.com/api/addresses?filter[city]=[saint]%`

The **OR** operator is used when you need to get items matching several criteria: `http://example.com/api/addresses?filter[city]=[paris|lyon]`

Other operators can be used, such as: 

- **NOT EQUAL** (single value): `http://example.com/api/customers?filter[firstname]=![hubert]` (apologies to all Huberts)
- **NOT EQUAL** (multiple values): `http://example.com/api/customers?filter[firstname]=![hubert|leon|gaspard]` (apologies again...)
- **GREATER THAN**: `http://example.com/api/customers?filter[birthday]=>[2000-00-00%2000:00:00]` (millenials only 🙂)
- **LOWER THAN**: `http://example.com/api/customers?filter[birthday]=<[2000-00-00%2000:00:00]` (previous century only 😄)

This can be used in combination with the `display` parameter! Let's say you want to get the mobile phone numbers of customers #1, #7 and #42: `http://example.com/api/addresses?filter[id_customer]=[1|7|42]&display=[phone_mobile]`

You can also filter by dates! A typical example would be a routine in an ERP fetching the orders since the last call: `http://example.com/api/orders?display=full&date=1&filter[date_add]=[2019-11-14%2013:00:00,2019-11-14%2014:00:00]`. In this example, we request the orders created on 2019-11-14 between 1pm and 2pm.

{{% notice note %}}
Pay attention to: 

* The url-encoded space (%20) in the datetime values
* The `date=1` parameter used to allow date filtering
* The dates range, with an inclusive first member and an exclusive last member (from 13:00:00 to 13:59:59)
{{% /notice %}}

##### Special parameters

The `date=1` parameter must be used to allow date filtering (see example above).

The `limit=0,100` parameter can be used to limit the number of returned items (similar to MySQL's LIMIT clause).

The `sort=[field1_ASC,field2_DESC]` parameter can be used to sort the results (similar to MySQL's ORDER BY clause, with underscore to separate the field name and the order way).

The `language=1` or `language=[1|2]` parameter can be used to return only these languages for translatable fields (eg: product description, category name, etc.).

The `sendemail=1` parameter can be used if you need to change the state of an order AND you want the emails to be sent to the customer: you will have to do a **POST** on `http://example.com/api/order_histories?sendemail=1`

The `sendemail=1` parameter can be used on the `order_carriers` endpoint to send the _in-transit_ email with the tracking number. Example: `http://example.com/api/order_carriers/12345?sendemail=1`
12345 is the order carrier id.

##### Cache handling

A cache mechanism has been introduced and bug fixed in {{< minver v="8.0" >}}, it allows you to detect if the content changed between your API calls. 

To use it:

1) in your first API call, retrieve the header `Content-Sha1` and store it on your side.
2) in your second API call, add a `Local-Content-Sha1` header, with the previously stored `Content-Sha1` value. 

If the content has not changed, the API will return a `304 Not Modified` response code.
If the content has changed, the API will return a `200 Ok` response code. 

{{% notice note %}}
It can be used to avoid unnecessary updates if the resource didn't change since the last API call. 
{{% /notice %}}

### Create a resource

To create a resource, you simply need to **GET** the XML blank data for the resource (example `/api/addresses?schema=blank`), fill it with your changes, and send **POST HTTP request** with the whole XML as body content to the `/api/addresses/` URL.

PrestaShop will take care of adding everything in the database, and will return an XML file indicating that the operation has been successful, along with the **ID** of the newly created customer.

### Update a resource

To edit an existing resource: **GET** the full XML file for the resource you want to change (example `/api/addresses/1`), edit its content as needed, then send a **PUT HTTP request** with the whole XML file as a body content to the same URL again.

### Partially update a resource

To partially edit an existing resource: **GET** a part of the XML file for the resource you want to change (example `/api/addresses/1`), edit its content as needed, then send a **PATCH HTTP request** with the partial XML file as the body content to the same URL again.

When partially updating a resource, the only required parameter is the `id` of the resource. Then, add the changed `parameters`, and **PATCH** method will handle that partial update. 

Example: update the company name for the address of `id=1` : `PATCH /api/addresses/1`

```xml
<?xml version="1.0" encoding="UTF-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
    <address>
        <id><![CDATA[1]]></id>
        <company><![CDATA[Acme Limited]]></company>
    </address>
</prestashop>
```

### Using JSON instead of XML

The Web services can also output JSON instead of XML. To enable JSON output you have two choices:

##### Query parameter

Add one of the following parameters to your query string:

- `output_format=JSON`
- `io_format=JSON`

Example:

```text
https://UCCLLQ9N2ARSHWCXLT74KUKSSK34BFKX@example.com/api/?output_format=JSON
```

##### HTTP header

Add the one of the following headers to your HTTP request:

- `Io-Format: JSON`
- `Output-Format: JSON`

Example:

```http
GET /api/ HTTP/1.1
Host: example.com
Output-Format: JSON
Authorization: Basic VUNDTExROU4yQVJTSFdDWExUNzRLVUtTU0szNEJGS1g6
```

{{% notice note %}}
Note that the API key has been encoded in Base64 for use in headers, as explained in [Using an authorization header]({{< relref "tutorials/testing-access/#using-an-authorization-header-recommended" >}}).
{{% /notice %}}
