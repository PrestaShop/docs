---
title: Image management
weight: 2
aliases:
  - /1.7/development/webservice/tutorials/advanced-use/image-management/
  - /1.7/development/webservice/tutorials/change_product_image/
---

# Image management

PrestaShop manages images via the `image` resource, and several other resources use it as well to manage their own images. There are several types of images available, which can all be accessed via their respective API:

| Image type           | API url                      |
|----------------------|------------------------------|
| General shop images  | `/api/images/general`        |
| Product images       | `/api/images/products`       |
| Category images      | `/api/images/categories`     |
| Customization images | `/api/images/customizations` |
| Manufacturer images  | `/api/images/manufacturers`  |
| Supplier images      | `/api/images/suppliers`      |
| Store images         | `/api/images/stores`         |

{{% notice note %}}
If you need to get a list of image types you can also use the `/api/images` API which lists all of them.
{{% /notice %}}

## The image format

Except for the general shop images, all the images API will return the same kind of format:

```xml
<?xml version="1.0" encoding="UTF-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
    <image_types>
        <image_type id="5" name="large_default" xlink:href="http://example.com/api/image_types/5"/>
        <image_type id="3" name="medium_default" xlink:href="http://example.com/api/image_types/3"/>
        <image_type id="2" name="small_default" xlink:href="http://example.com/api/image_types/2"/>
    </image_types>
    <images>
        <image id="2" xlink:href="http://example.com/api/images/manufacturers/2"/>
        <image id="1" xlink:href="http://example.com/api/images/manufacturers/1"/>
    </images>
</prestashop>
```

- a list of **image types** related to the resource; each one defines the expected image size for each resource (in this example we can see that manufacturers have three image sizes: small, medium and large)
- a list of images for this kind of resource

### Using webservice lib

You can get the information about a specific resource's images using our Webservice library:

```php
<?php
try {
    $webService = new PrestaShopWebservice('http://example.com/', 'ZR92FNY5UFRERNI3O9Z5QDHWKTP3YIIT', false);

    $xml = $webService->get(['resource' => 'images/products']);
    $imageTypes = $xml->image_types->children();
    $images = $xml->images->children();
} catch (PrestaShopWebserviceException $e) {
    echo 'Error:' . $e->getMessage();
}
```

## GET image

The GET image API allows you to request an image associated to a resource. The response is the image itself.

### Default behaviour

For most resources the url format is as follows: `/api/images/{resource}/{resource_id}`. You can use an additional parameter by appending the image format `/api/images/{resource}/{resource_id}/{image_type}`. In both cases, placeholders are:

- **resource**: the resource name (ex: categories, manufacturers, ...)
- **resource_id**: the integer ID to identify the resource
- **image_type**: the **name** of the image type requested (ex: small_default, category_default, ...)

This will return the target image as a response.

### General shop 

The general image API only returns a list of images related to the shop configuration like the header or icon image. The `/api/images/general` returns the list of image types which you can then append to the URL (much like the image type in the default use case).

For example `/api/images/general/header` returns the header image.

### Product images

The product images API behaves mostly like the default ones, except that products may have multiple images, so the API contains an extra parameter for the image ID `/api/images/products/{product_id}/{image_id}`

## Adding a new image to a product

{{% notice note %}}
We only refer to product here as it's the only resource that has multiple images. For other resources we only update its image.
{{% /notice %}}

Only one image is posted to the API, this image will then be resized into all the formats associated to the resource.

### Using an HTML form

```html
<form enctype="multipart/form-data" method="POST" action="http://ZR92FNY5UFRERNI3O9Z5QDHWKTP3YIIT@example.com/api/images/products/1">
  <fieldset>
    <legend>Add image for products No 1</legend>
    <input type="file" name="image">
    <input type="submit" value="Execute">
  </fieldset>
</form>
```

### Using cURL

To create a new image we are going to use the `/images/products` API. We won't use the `PrestaShopWebservice` class here, but a cURL request.

```php
<?php

$urlImage = 'http://example.com/api/images/products/10/';
$key  = 'ZR92FNY5UFRERNI3O9Z5QDHWKTP3YIIT';

//Here you set the path to the image you need to upload
$image_path = '/path/to/the/image.jpg';
$image_mime = 'image/jpg';

$args['image'] = new CurlFile($image_path, $image_mime);

$ch = curl_init();
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLINFO_HEADER_OUT, 1);
curl_setopt($ch, CURLOPT_URL, $urlImage);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_USERPWD, $key.':');
curl_setopt($ch, CURLOPT_POSTFIELDS, $args);
$result = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if (200 == $httpCode) {
    echo 'Product image was successfully created.';
}
```

## Update the image of a resource

{{% notice info %}}
It's almost the same principle as adding an image except the API expects a PUT method. Since not all clients can handle this HTTP method, we can add a parameter `ps_method` in the URL to simulate it (recommended workaround).
{{% /notice %}}

### Using an HTML form

```html
<form action="http://ZR92FNY5UFRERNI3O9Z5QDHWKTP3YIIT@example.com/api/images/categories/2" method="POST" enctype="multipart/form-data">
  <fieldset>
    <legend>Update category image 2</legend>
    <input name="ps_method" value="PUT" type="hidden">
    <input name="image" type="file">
    <input value="Execute" type="submit">
  </fieldset>
</form>
```

### Using cURL

```php
<?php

// DON'T FORGET to add the ps_method parameter
$urlImage = 'http://example.com/api/images/categories/2/?ps_method=PUT';
$key  = 'ZR92FNY5UFRERNI3O9Z5QDHWKTP3YIIT';

//Here you set the path to the image you need to upload
$image_path = '/path/to/the/image.jpg';
$image_mime = 'image/jpg';

$args['image'] = new CurlFile($image_path, $image_mime);

$ch = curl_init();
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLINFO_HEADER_OUT, 1);
curl_setopt($ch, CURLOPT_URL, $urlImage);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_USERPWD, $key.':');
curl_setopt($ch, CURLOPT_POSTFIELDS, $args);
$result = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if (200 == $httpCode) {
    echo 'Category image was successfully updated.';
}
```
