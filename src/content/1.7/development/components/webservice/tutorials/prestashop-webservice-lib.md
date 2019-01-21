---
title: PrestaShop Webservice lib
weight: 1
---

## Install the lib

### Pre-requisites

* You need a server with `mod_rewrite` enabled
* You need the `curl` extension enabled in PHP

### Installing with Composer

If you are starting a new project you can init your composer project along with the dependency:

```bash
composer init --require="Prestashop/Prestashop-webservice-lib:dev-master" -n  
composer install
```

Or if you already have an existing project simply add the dependency:

```bash
composer require "Prestashop/Prestashop-webservice-lib"  
```

The library is not PSR compliant and has no namespace therefore you need to update your `composer.json` file to include the class in your `autoload`:

```json
{
    "require": {
        "Prestashop/Prestashop-webservice-lib": "dev-master"
    },
    "autoload": {
        "files": [
            "vendor/prestaShop/prestaShop-webservice-lib/PSWebServiceLibrary.php"
        ]
    }
}
```

And regenerate your `autoload`:

```bash
composer dump-autoload
```

## Read a resource

Then you will be able to use the `PrestaShopWebservice` class:

```php
<?php
    require_once 'vendor/autoload.php';
    
    $url = 'http://example.com';
    $key  = 'YOUR_GENERATED_API_ACCESS_KEY';
    $debug = false;
    
    $webService = new PrestaShopWebservice($url, $key, $debug);
    $xmlResponse = $webService->get(['resource' => 'addresses']);
    foreach ($xmlResponse->addresses->address as $address) {
        $addressId = (int) $address['id'];
        $addressXmlResponse = $webService->get(['resource' => 'addresses', 'id' => $addressId]);
        $address = $addressXmlResponse->address[0];
        echo sprintf('ID: %s, alias: %s' . PHP_EOL, $address->id, $address->alias);
    }
```

## Create a resource

To help you create a resource you can use the synopsis url of the target resource, it will provide you a basic xml object that you can fill

```php
<?php
    require_once 'vendor/autoload.php';
    
    $url = 'http://example.com';
    $key  = 'YOUR_GENERATED_API_ACCESS_KEY';
    $debug = false;
    
    $webService = new PrestaShopWebservice($url, $key, $debug);
    $xmlResponse = $webService->get(['url' => $url . '/api/addresses?schema=blank']);
    $addressXML = $xmlResponse->address[0];
    $addressXML->alias = 'My address';
    $addressXML->lastname = 'DOE';
    $addressXML->firstname = 'John';
    $addressXML->address1 = '5 oxford street';
    $addressXML->postcode = '75009';
    $addressXML->city = 'Paris';
    $addressXML->id_country = 1;

    try {
        $addedAddressResponse = $webService->add([
            'resource' => 'addresses',
            'postXml' => $xmlResponse->asXML(),
        ]);
        $addressXML = $addedAddressResponse->address[0];
        echo sprintf("Successfully create address with ID: %s", (string) $addressXML->id);
    } catch (PrestaShopWebserviceException $e) {
        echo $e->getMessage();
    }
```

## Update a resource

This is the same principle as the creation, except you request an existing resource as your XML source.

```php
<?php
    require_once 'vendor/autoload.php';
    
    $url = 'http://example.com';
    $key  = 'YOUR_GENERATED_API_ACCESS_KEY';
    $debug = false;
    
    $webService = new PrestaShopWebservice($url, $key, $debug);
    $xmlResponse = $webService->get(['resource' => 'addresses', 'id' => 1]);
    $addressXML = $xmlResponse->address[0];
    $addressXML->lastname = 'MOUSE';
    $addressXML->firstname = 'Mickey';

    try {
        $addedAddressResponse = $webService->edit([
            'resource' => 'addresses',
            'id' => (int) $addressXML->id,
            'putXml' => $xmlResponse->asXML(),
        ]);
        $addressXML = $addedAddressResponse->address[0];
        echo sprintf("Successfully updated address with ID: %s", (string) $addressXML->id);
    } catch (PrestaShopWebserviceException $e) {
        echo $e->getMessage();
    }
```

## Delete a resource

Deleting a resource is actually the simplest of the actions.

```php
<?php
    require_once 'vendor/autoload.php';
    
    $url = 'http://example.com';
    $key  = 'YOUR_GENERATED_API_ACCESS_KEY';
    $debug = false;
    
    $webService = new PrestaShopWebservice($url, $key, $debug);

    try {
        $webService->delete([
            'resource' => 'addresses',
            'id' => 1,
        ]);
        echo "Successfully deleted address";
    } catch (PrestaShopWebserviceException $e) {
        echo $e->getMessage() . ' ' .$e->getTraceAsString();
    }
```
