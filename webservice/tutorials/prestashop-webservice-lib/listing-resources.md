---
title: Listing resources
menuTitle: 2 - Listing resources
weight: 2
---

# Listing resources

Let's now see how to view a full list of customer IDs. We could display more information and customize it, but that's for another part of this tutorial.

As we saw in the previous code sample, we need the `get()` method to retrieve an XML file containing all the customers. The parameter has to be a key-value array, where we define the resource we want:

| Key          | Value     |
|--------------|-----------|
| **resource** | customers |


## Using PrestaShopWebservice::get

```php
<?php
try {
    // creating webservice access
    $webService = new PrestaShopWebservice('http://example.com/', 'ZR92FNY5UFRERNI3O9Z5QDHWKTP3YIIT', false);
 
    // call to retrieve all customers
    $xml = $webService->get(['resource' => 'customers']);
} catch (PrestaShopWebserviceException $ex) {
    // Shows a message related to the error
    echo 'Other error: <br />' . $ex->getMessage();
}
```

## Returned data

The returned object is a `SimpleXMLElement` object containing this kind of data:

```xml
<?xml version="1.0" encoding="UTF-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
    <customers>
        <customer id="1" xlink:href="http://example.com/api/customers/1"/>
        <customer id="2" xlink:href="http://example.com/api/customers/2"/>
    </customers>
</prestashop>
```

## Access children data

You can now loop through this XML object to get each customer ID

```php
<?php
$resources = $xml->customers->children();
foreach ($resources as $resource) {
    $attributes = $resource->attributes();
    $resourceId = $attributes['id'];
    // From there you could, for example, use th resource ID to call the webservice to get its details
}
```
