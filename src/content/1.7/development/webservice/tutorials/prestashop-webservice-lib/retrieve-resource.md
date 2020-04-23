---
title: Retrieve a resource
menuTitle: 3 - Retrieve a resource
weight: 3
---

# Retrieve a resource

Now that we have retrieved a list of resources let's see how to access the details of one resource in particular. In the XML list you can see that each individual resource as a unique ID that you can use to get its details:

```xml
<?xml version="1.0" encoding="UTF-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
    <customers>
        <customer id="1" xlink:href="http://example.com/api/customers/1"/>
        <customer id="2" xlink:href="http://example.com/api/customers/2"/>
    </customers>
</prestashop>
```

We are going to use the same `get()` method but provide an additional `id` parameter

| Key          | Value               |
|--------------|---------------------|
| **resource** | customers           |
| **id**       | *resource_id* (int) |

## Using PrestaShopWebservice::get

```php
try {
    // creating webservice access
    $webService = new PrestaShopWebservice('http://example.com/', 'ZR92FNY5UFRERNI3O9Z5QDHWKTP3YIIT', false);
 
    // call to retrieve customer with ID 2
    $xml = $webService->get([
        'resource' => 'customers',
        'id' => 2, // Here we use hard coded value but of course you could get this ID from a request parameter or anywhere else
    ]);
} catch (PrestaShopWebserviceException $ex) {
    // Shows a message related to the error
    echo 'Other error: <br />' . $ex->getMessage();
}
```

## Returned data

You will receive the same xml as if you request http://example.com/api/customers/1 in your browser:

```xml
<?xml version="1.0" encoding="UTF-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
    <customer>
        <id><![CDATA[2]]></id>
        <id_default_group xlink:href="http://example.com/api/groups/3"><![CDATA[3]]></id_default_group>
        <id_lang xlink:href="http://example.com/api/languages/1"><![CDATA[1]]></id_lang>
        <newsletter_date_add><![CDATA[2013-12-13 08:19:15]]></newsletter_date_add>
        <ip_registration_newsletter></ip_registration_newsletter>
        <last_passwd_gen><![CDATA[2020-04-09 13:31:19]]></last_passwd_gen>
        <secure_key><![CDATA[86b9ae3ec67dd49122e3a574fc131af4]]></secure_key>
        <deleted><![CDATA[0]]></deleted>
        <passwd><![CDATA[33bdf9cf5657bf97149906b83ea3c6ed]]></passwd>
        <lastname><![CDATA[DOE]]></lastname>
        <firstname><![CDATA[John]]></firstname>
        <email><![CDATA[pub@prestashop.com]]></email>
        <id_gender><![CDATA[1]]></id_gender>
        <birthday><![CDATA[1970-01-15]]></birthday>
        <newsletter><![CDATA[1]]></newsletter>
        <optin><![CDATA[1]]></optin>
        <website></website>
        <company></company>
        <siret></siret>
        <ape></ape>
        <outstanding_allow_amount><![CDATA[0.000000]]></outstanding_allow_amount>
        <show_public_prices><![CDATA[0]]></show_public_prices>
        <id_risk><![CDATA[0]]></id_risk>
        <max_payment_days><![CDATA[0]]></max_payment_days>
        <active><![CDATA[1]]></active>
        <note></note>
        <is_guest><![CDATA[0]]></is_guest>
        <id_shop><![CDATA[1]]></id_shop>
        <id_shop_group><![CDATA[1]]></id_shop_group>
        <date_add><![CDATA[2020-04-09 19:31:19]]></date_add>
        <date_upd><![CDATA[2020-04-09 19:31:19]]></date_upd>
        <reset_password_token></reset_password_token>
        <reset_password_validity><![CDATA[0000-00-00 00:00:00]]></reset_password_validity>
        <associations>
            <groups nodeType="group" api="groups">
                <group xlink:href="http://example.com/api/groups/3">
                    <id><![CDATA[3]]></id>
                </group>
            </groups>
        </associations>
    </customer>
</prestashop>
```

## Access resource fields

You can now loop through this XML object to get each customer field value, or access specific fields individually

```php
$customerFields = $xml->customer->children();
$firstName = $customerFields->firstname;
$lastName = $customerFields->lastname;
echo 'Details for '. $firstName . ' ' . $lastName . PHP_EOL . PHP_EOL;
foreach ($customerFields as $key => $value) {
    echo $key . ': ' . $value . PHP_EOL;
}
```

