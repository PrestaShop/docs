---
title: Change product image
weight: 2
---

## Adding a new image to a product

To create a new image we are going to use the `/images/products` API. We won't use the `PrestaShopWebservice` class here but a simple curl request.

```php
<?php
    $url = 'http://example.com';
    $key  = 'YOUR_GENERATED_API_ACCESS_KEY';

    $psProductId = 19;
    $urlImage = $url.'/api/images/products/'.$psProductId.'/';

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