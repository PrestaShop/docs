---
title: Delete a resource
menuTitle: 6 - Delete a resource
weight: 6
---

# Delete a resource

To delete a resource you only need its ID, then you can use the `delete()` method.

| Key          | Value               |
|--------------|---------------------|
| **resource** | customers           |
| **id**       | *resource_id* (int) |

## Using PrestaShopWebservice::delete

```php
<?php
try {
    $webService = new PrestaShopWebservice('http://example.com/', 'ZR92FNY5UFRERNI3O9Z5QDHWKTP3YIIT', false);

    $id = 2;
    $webService->delete([
        'resource' => 'customers',
        'id' => $id, // Here we use hard coded value but of course you could get this ID from a request parameter or anywhere else
    ]);
    echo 'Customer with ID ' . $id . ' was successfully deleted' . PHP_EOL;
} catch (PrestaShopWebserviceException $e) {
    echo 'Error:' . $e->getMessage();
}
```
