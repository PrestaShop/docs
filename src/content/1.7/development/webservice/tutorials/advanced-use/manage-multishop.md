---
title: Manage Multishop
menuTitle: Multishop
weight: 5
---

# Manage Multishop

In order to use web services when the multishop feature is enabled, you can use the regular API requests and add the `id_shop` parameter (or the `id_shop_group` parameter for overriding by group).

## Enable Multishop

The Multishop can be enabled via the `PS_MULTISHOP_FEATURE_ACTIVE` configuration value, here is a tutorial to [manage configuration via API]({{< ref "1.7/development/webservice/tutorials/advanced-use/manage-configuration" >}}).

## List shops

Once you have several instances you can access to the shop list and their IDs.

| Result | API call | PHP Webservice lib options |
|--------|----------|----------------------------|
| List `shops` | `/api/shops/` | {{< code php >}}$opt = [
    'resource' => 'shops'
];{{< /code >}} |

## Define shop specific override

To deal with shop specific values you can use the regular APIs and specify the `shop` or `shop_group` you are targeting. They can be used for read and/or write operations.

| Key               | Value         |
|-------------------|---------------|
| **id_shop**       | Shop id       |
| **id_shop_group** | Shop group id |

## Create shop

You can refer to the tutorial explaining how to [create a resource]({{< ref "1.7/development/webservice/tutorials/prestashop-webservice-lib/create-resource" >}}) or [update a resource]({{< ref "1.7/development/webservice/tutorials/prestashop-webservice-lib/update-resource" >}}) to add/update a `shop`. It also will need a `shop_url` otherwise using its `id_shop` will result in a redirection by the API.

```php
<?php

require_once('./vendor/autoload.php');

$webServiceUrl = 'http://example.com/';
$webServiceKey = 'ZR92FNY5UFRERNI3O9Z5QDHWKTP3YIIT';
$webService = new PrestaShopWebservice($webServiceUrl, $webServiceKey, false);

// Check shop presence
$shopName = 'Additional shop';
$searchedShop = $webService->get(['resource' => 'shops', 'filter[name]' => $shopName]);
$shopId = null;
if ($searchedShop->shops->shop->count() > 0) {
    $shopId = (int) $searchedShop->shops->shop[0]->attributes()['id'];
    echo 'Shop already exists' . PHP_EOL;
    die(1);
}

// Create shop
$blankXml = $webService->get(['url' => $webServiceUrl . 'api/shops?schema=blank']);
$shopXml = $blankXml->shop[0];
$shopXml->name = 'Additional shop';
$shopXml->id_shop_group = 1; // Default shop group
$shopXml->id_category = 2; // Default category Root
$shopXml->theme_name = 'classic';
$shopXml->active = 1;

$createdShop = $webService->add(['resource' => 'shops', 'postXml' => $blankXml->asXML()]);
$shopId = (int) $createdShop->shop->id;
echo 'Successfully created shop ' . $shopId . PHP_EOL;

// Create shop url
$blankXml = $webService->get(['url' => $webServiceUrl . 'api/shop_urls?schema=blank']);
$shopUrlXml = $blankXml->shop_url[0];
$shopUrlXml->id_shop = $shopId;
$shopUrlXml->active = 1;
$shopUrlXml->main = 1;
$shopUrlXml->domain = 'example.com';
$shopUrlXml->domain_ssl = 'example.com';
$shopUrlXml->physical_uri = '/';
$shopUrlXml->virtual_uri = '/additional';

$createdShopUrl = $webService->add(['resource' => 'shop_urls', 'postXml' => $blankXml->asXML()]);
$shopUrlId = (int) $createdShopUrl->shop_url->id;
echo 'Successfully created shop url ' . $shopUrlId . PHP_EOL;
```

## Update your webservice key permissions

At this point if you still use the same webservice key it will probably not have the permission to edit this new shop, you can edit your webservice key in the BackOffice and associate it with your new shop.

## Associate content to shop

A new shop has no content associated at first, so you have to assign each content you want in your shop one by one. There is no association API, however we can use the update API by sending the same content and specifying the `id_shop` parameter, this will update the association without changing the resource content.

```php
<?php

require_once('./vendor/autoload.php');

$webServiceUrl = 'http://example.com/';
$webServiceKey = 'ZR92FNY5UFRERNI3O9Z5QDHWKTP3YIIT';
$webService = new PrestaShopWebservice($webServiceUrl, $webServiceKey, false);

$shopName = 'Additional shop';

$searchedShop = $webService->get(['resource' => 'shops', 'filter[name]' => $shopName]);
$shopId = null;
if ($searchedShop->shops->shop->count() > 0) {
    $shopId = (int) $searchedShop->shops->shop[0]->attributes()['id'];
} else {
    echo 'No shop found: ' . $shopName . PHP_EOL;
    exit(1);
}

$copiedResources = [
    'content_management_system',
    'contacts',
];

foreach ($copiedResources as $resourceName) {
    echo 'Start cloning ' . $resourceName . PHP_EOL;
    // List all resources
    $listXml = $webService->get(['resource' => $resourceName]);
    $resourceNodes = $listXml->$resourceName->children();
    foreach ($resourceNodes as $listNode) {
        // Get single resource
        $resourceId = (int) $listNode->attributes()['id'];
        $resourceXml = $webService->get(['resource' => $resourceName, 'id' => $resourceId]);

        try {
            // Update resource with same content but shop ID defined, this will update the association without changing the resource content
            $updatedResource = $webService->edit(['resource' => $resourceName, 'id' => $resourceId, 'putXml' => $resourceXml->asXML(), 'id_shop' => $shopId]);
            echo sprintf('Successfully copied resource %s[%s] to shop %s', $resourceName, $resourceId, $shopId) . PHP_EOL;
        } catch (PrestaShopWebserviceException $e) {
            echo sprintf('Error cloning %s[%s] to shop %s: ', $resourceName, $resourceId, $shopId) . $e->getMessage() . PHP_EOL;
        }
    }
}
```

{{% notice warning %}}
This example voluntarily deals with a simple resource that doesn't have complicated relationships or special webservice fields, this way we can use the API result as an XML input directly. Some more complex resources (categories, products, ...) are not as straightforward, and you'll need to use a less generic code to clean the extra fields or copy them into a **blank schema**.
{{% /notice %}}
