---
title: Testing access to the Webservice
menuTitle: 2 - Testing access
weight: 2
---

# Testing access to the Webservice

Now that your access key is generated you can test your store's webservice, its endpoint is located in the `/api/` uri at the root of your installation of Prestashop.

## Accessing /api/

The quickest way to test your API is to use your browser:

* If PrestaShop is installed at the root of your server, you can access the API here: http://example.com/api/
* If PrestaShop is installed in a subfolder of your server, you can access the API here: http://example.com/prestashop/api/

### Browser prompt

The shop should prompt you for a username and a password to enter. The username is the authentication key you created and **there is no password to enter**. If no permission has been set for the key, than the browser will keep asking you to enter the key indefinitely.

### Include key in url (risky)

The second way to access the API is to include your access key in the url, this will prevent you from entering any user name. Here is an example, assuming your access API key is `UCCLLQ9N2ARSHWCXLT74KUKSSK34BFKX`:

* At the root of the server: https://UCCLLQ9N2ARSHWCXLT74KUKSSK34BFKX@example.com/api/
* In a subfolder of the server: https://UCCLLQ9N2ARSHWCXLT74KUKSSK34BFKX@example.com/prestashop/api/

{{% notice warning %}}
This method might be convenient for development but **very risky** as you expose your API key directly in the url, so anyone able to see (or hack) your browser history or access logs would be able to get your key. This should **never** be used on a production shop.
{{% /notice %}}

### Using an Authorization header (recommended)

The best way to authenticate your API calls is to use an `Authorization` header, this way you don't expose your API key directly but a `base64_encode` compute of your `user:password` couple. Although PrestaShop API only has a user with empty password, so in order to compute your authorization key you can do as follows:

```php
<?php
$apiKey = `UCCLLQ9N2ARSHWCXLT74KUKSSK34BFKX`;
$authorizationKey = base64_encode($apiKey . ':'); // VUNDTExROU4yQVJTSFdDWExUNzRLVUtTU0szNEJGS1g6
```

Then you can use this value in your request header:

| Key             | Value                                                |
|-----------------|------------------------------------------------------|
| `Authorization` | `Basic VUNDTExROU4yQVJTSFdDWExUNzRLVUtTU0szNEJGS1g6` |

To test/call your APIs we recommend you use an API client such as [Insomnia](https://insomnia.rest/) or [Postman](https://www.getpostman.com/), it is easier to call the APIs than with a browser, you can easily switch with HTTP methods, and it's easier to set request parameters and headers.

{{% notice warning %}}
As you noticed no password nor authentication process is required to access the APIs which is why you need to be **extra careful** with your access key rights and how (and to whom) you disclose them.
{{% /notice %}}

## Available resources

The `/api/` URL gives you the root of all the resources, in the form of an XML file. Here is an example of what you should see if you authorized full access to `addresses`, `images` and `products` resources:

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
        <images xlink:href="http://example.com/api/images" get="true" put="true" post="true" patch="true" delete="true" head="true">
            <description xlink:href="http://example.com/api/images" get="true" put="true" post="true" patch="true" delete="true" head="true">
            The images</description>
        </images>
        <products xlink:href="http://example.com/api/products" get="true" put="true" post="true" patch="true" delete="true" head="true">
            <description xlink:href="http://example.com/api/products" get="true" put="true" patch="true" post="true" delete="true" head="true">
            The products</description>
            <schema xlink:href="http://example.com/api/products?schema=blank" type="blank"/>
            <schema xlink:href="http://example.com/api/products?schema=synopsis" type="synopsis"/>
        </products>
    </api>
</prestashop>
```

## Resource schemas

You can also see that each resource provides two links to access its schemas:

- **blank schema** which you can use as a blank content to create a resource
- **synopsis schema** which is the same blank schema with additional details on each field

Let's see what they look like for the `address` resource.

### Blank schema

`/api/addresses?schema=blank`

```xml
<?xml version="1.0" encoding="UTF-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
    <address>
        <id></id>
        <id_customer></id_customer>
        <id_manufacturer></id_manufacturer>
        <id_supplier></id_supplier>
        <id_warehouse></id_warehouse>
        <id_country></id_country>
        <id_state></id_state>
        <alias></alias>
        <company></company>
        <lastname></lastname>
        <firstname></firstname>
        <vat_number></vat_number>
        <address1></address1>
        <address2></address2>
        <postcode></postcode>
        <city></city>
        <other></other>
        <phone></phone>
        <phone_mobile></phone_mobile>
        <dni></dni>
        <deleted></deleted>
        <date_add></date_add>
        <date_upd></date_upd>
    </address>
</prestashop>
```

### Synopsis schema

`/api/addresses?schema=synopsis`

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

## JSON format

The Webservices can also output JSON instead of XML. To enable JSON output you have two choices:

### Query parameter

Add one of the following parameters to your query string:

- `output_format=JSON`
- `io_format=JSON`

Example:

```text
https://UCCLLQ9N2ARSHWCXLT74KUKSSK34BFKX@example.com/api/?output_format=JSON
```

### HTTP header

Add the one of the following headers to your HTTP request:

- `Io-Format: JSON`
- `Output-Format: JSON`

Example:

```http
GET /api/ HTTP/1.1
Host: example.com
Output-Format: JSON
Authorization: Basic UCCLLQ9N2ARSHWCXLT74KUKSSK34BFKX
```
