---
title: Update a resource
menuTitle: 5 - Update a resource
weight: 5
---

# Update a resource

## Update workflow

The update workflow is quite similar to the [creation workflow]({{< relref "create-resource#creation-workflow" >}}), the main difference is that the initial input is not a blank XML but an existing one, so we use the `get()` method to get a prefilled XML, and then we can update its fields.

{{< figure src="../../../img/update-resource.svg" title="Update Resource via Webservice" >}}

{{% notice note %}}
You can update this schema using the [source XML file](/8/schemas/update-resource.xml) importable in services like [draw.io](https://draw.io).
{{% /notice %}}

## Retrieve the resource

```php
<?php
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

## Fill the schema and update resource

Quite similar to the resource creation, except we can update only some fields (since the others are already present) and we use the `edit()` method.

| Key          | Value                  |
|--------------|------------------------|
| **resource** | customers              |
| **id**       | *resource_id* (int)    |
| **putXml**   | *XML content* (string) |

```php
<?php
$customerFields = $xml->customer->children();
$customerFields->firstname = 'John';
$customerFields->lastname = 'DOE';

$updatedXml = $webService->edit([
    'resource' => 'customers',
    'id' => (int) $customerFields->id,
    'putXml' => $xml->asXML(),
]);
$customerFields = $updatedXml->customer->children();
echo 'Customer updated with ID ' . $customerFields->id . PHP_EOL;
```

{{% notice warning %}}
This example voluntarily deals with a simple resource that doesn't have complicated relationships or special webservice fields, this way we can use the API result as an XML input directly. Some more complex resources (categories, products, ...) are not as straightforward, and you'll need to use a less generic code to clean the extra fields or copy them into a **blank schema**.
{{% /notice %}}
