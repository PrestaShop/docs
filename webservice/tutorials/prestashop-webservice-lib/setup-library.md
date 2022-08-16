---
title: Setup library
menuTitle: 1 - Setup library
weight: 1
---

# Setup library

Now that your webservice is configured and accessible you might want to use it. To help you perform requests on your webservice, you can use the [PHP library for PrestaShop Webservices](https://github.com/PrestaShop/PrestaShop-webservice-lib).

## Install the library

### Prerequisites

* You need a server with `mod_rewrite` enabled
* You need the `curl` extension enabled in PHP

### Installing with Composer

If you are starting a new project you can init your composer project along with the dependency:

```bash
composer init --require="prestashop/prestashop-webservice-lib:dev-master" -n
composer install
```

Or if you already have an existing project simply add the dependency:

```bash
composer require prestashop/prestashop-webservice-lib
```

The library is not PSR compliant and has no namespace therefore you need to update your `composer.json` file to include the class in your `autoload`:

```json
{
    "require": {
        "prestashop/prestashop-webservice-lib": "dev-master"
    },
    "autoload": {
        "files": [
            "vendor/prestashop/prestashop-webservice-lib/PSWebServiceLibrary.php"
        ]
    }
}
```

And regenerate your `autoload`:

```bash
composer dump-autoload
```

Then you can use the library with Composer's autoloading:

```php
<?php

require_once('./vendor/autoload.php');

$webService = new PrestaShopWebservice(...);
```

### Manual install

If you don't use composer you can download the [library archive](https://github.com/PrestaShop/PrestaShop-webservice-lib/archive/master.zip) and extract it where you need.
You will then need to manually load the `PSWebServiceLibrary` in your PHP script or application:

```php
<?php
require_once('./PSWebServiceLibrary.php');

$webService = new PrestaShopWebservice(...);
```

## Accessing the webservice

### Create your client

First, you must create an instance of the `PrestaShopWebservice` object, which takes 3 parameters in its constructor:

- The store's root path (ex: http://example.com/ ).
- The authentication key (ex: ZR92FNY5UFRERNI3O9Z5QDHWKTP3YIIT).
- A boolean value, indicating whether the Webservice must use its debug mode.

```php
<?php
$webService = new PrestaShopWebservice('http://example.com/', 'ZR92FNY5UFRERNI3O9Z5QDHWKTP3YIIT', false);
```

Once the instance is created you can access the following methods:

| Method   | HTTP equivalent   | SQL    |
|----------|-------------------|--------|
| add()    | POST              | INSERT |
| get()    | GET               | SELECT |
| edit()   | PUT               | UPDATE |
| delete() | DELETE            | DELETE |

{{% notice note %}}
**PATCH** method is not available in this library.
{{% /notice %}}

### Handling errors

It is essential that you understand how to handle errors with the webservice library. By implementing error-catch method early, you will more easily detect issues, and be able to correct them on the go.

Error handling with the webservice library is done using PHP exceptions. If you do not know about them, you should [read about it](http://php.net/manual/en/language.exceptions.php), as exceptions are an essential part of good coding practices.

The error handling is done within a `try...catch` block, with the webservice instantiation and execution being done in the `try` section, the `catch` one containing the error handling code. There are many types of exception that exist you can catch specific ones which allows you to deal with each error case accordingly, the webservice library uses `PrestaShopWebserviceException` so you can catch this one only to deal with errors related to webservice.

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
