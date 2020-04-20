---
title: 6 - Delete a resource
weight: 6
---

# Delete a resource

To delete a resource you only need its ID, then you can use the `delete()` method.

| Key          | Value               |
|--------------|---------------------|
| **resource** | customers           |
| **id**       | *resource_id* (int) |

### Using PrestaShopWebservice::delete

```php
try {
    $webService = new PrestaShopWebservice('http://example.com/', 'ZR92FNY5UFRERNI3O9Z5QDHWKTP3YIIT', false);

    $opt = [
        'resource' => 'customers',
        'id' => 2, // Here we use hard coded value but of course you could get this ID from a request parameter or anywhere else
    ];
    
    $webService->delete($opt);
    echo 'Customer with ID ' . $opt['id'] . ' was successfully deleted' . PHP_EOL;
} catch (PrestaShopWebserviceException $e) {
    echo 'Error:' . $e->getMessage();
}
```