---
title: Create a resource
menuTitle: 4 - Create a resource
weight: 4
---

# Create a resource

## Creation workflow

The creation workflow is a bit more complex than reading some data from the API, mainly because we rarely manage data via XML format. In most use cases the user is presented with a human understandable component, like a form, and the data entered is then processed. Besides we need to make sure that the XML sent to the webservice is understandable and complete.

As we explained in a previous tutorial the webservice provides two [resource schemas]({{< relref "../testing-access#resource-schemas" >}}). For creation we are going to use the *blank* schema which is an empty representation of a resource. This empty XML will be filled with our data and then sent to the webservice using the `add()` method.

{{< figure src="../../../img/create-resource.svg" title="Create Resource via Webservice" >}}

{{% notice note %}}
You can update this schema using the [source XML file](/8/schemas/create-resource.xml) importable in services like [draw.io](https://draw.io).
{{% /notice %}}

## Retrieve the blank schema

We already saw that the get method can be used to retrieve either a list or a specific resource (with the `resource` and `id` parameters) but it can only be used to get a specific `url`

| Key     | Value            |
|---------|------------------|
| **url** | blank schema url |

```php
<?php
try {
    // creating webservice access
    $webService = new PrestaShopWebservice('http://example.com/', 'ZR92FNY5UFRERNI3O9Z5QDHWKTP3YIIT', false);
 
    // call to retrieve the blank schema
    $blankXml = $webService->get(['url' => 'http://example.com/api/customers?schema=blank']);
} catch (PrestaShopWebserviceException $ex) {
    // Shows a message related to the error
    echo 'Other error: <br />' . $ex->getMessage();
}
```

## Fill the schema and create new resource

Now that you have the empty XML structure you can fill it with your data, once it is done you will use the `add()` method to create the new resource.

{{% notice note %}}
Remember that each resource has its own validation rules (required fields, field types and formats, ...), if you don't respect these rules the webservice will refuse the creation. To know the details a resource validation rules you can use the *synopsis* schema (e.g. `http://example.com/api/customers?schema=synopsis`)
{{% /notice %}}

| Key          | Value                  |
|--------------|------------------------|
| **resource** | customers              |
| **postXml**  | *XML content* (string) |

```php
<?php
try {
    // creating webservice access
    $webService = new PrestaShopWebservice('http://example.com/', 'ZR92FNY5UFRERNI3O9Z5QDHWKTP3YIIT', false);

    // call to retrieve the blank schema
    $blankXml = $webService->get(['url' => 'http://example.com/api/customers?schema=blank']);
    
    // get the entity
    $customerFields = $blankXml->customer->children();
    
    // edit entity fields
    $customerFields->firstname = 'John';
    $customerFields->lastname = 'DOE';
    $customerFields->email = 'john.doe@unknown.com';
    $customerFields->passwd = 'password1234';

    // send entity to webservice
    $createdXml = $webService->add([
        'resource' => 'customers',
        'postXml' => $blankXml->asXML(),
    ]);
    $newCustomerFields = $createdXml->customer->children();
    echo 'Customer created with ID ' . $newCustomerFields->id . PHP_EOL;
} catch (PrestaShopWebserviceException $ex) {
    // Shows a message related to the error
    echo 'Other error: <br />' . $ex->getMessage();
}
```
