---
title: Manage Configuration
menuTitle: Configuration
weight: 4
---

# Manage Configuration

You can manage your shop configuration thanks to the API, in this example we will set the `PS_MULTISHOP_FEATURE_ACTIVE` to true (which enables multishop mode).

## API call

First check if the configuration already exists by calling `/api/configurations/?display=[id,name,value]&filter[name]=[PS_MULTISHOP_FEATURE_ACTIVE]`

If the configuration doesn't exist yet, you need to POST on the `configuration` API `/api/configurations/`

```xml
<?xml version="1.0" encoding="UTF-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
    <configuration>
        <value>1</value>
        <name>PS_MULTISHOP_FEATURE_ACTIVE</name>
    </configuration>
</prestashop>
```

If it is already defined you need to update it via a PUT using the configuration ID: `/api/configurations/411`

```xml
<?xml version="1.0" encoding="UTF-8"?>
<prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
    <configuration>
        <id>411</id>
        <value>1</value>
        <name>PS_MULTISHOP_FEATURE_ACTIVE</name>
    </configuration>
</prestashop>
```

{{% notice warning %}}
The API being a simple CRUD it lacks logic on resources and doesn't check for existing values, so be sure to check the existence of the configuration and use the appropriate action `POST|PUT` if you want to avoid duplicates.
{{% /notice %}}

## PHP Webservice lib

```php
<?php

require_once('./vendor/autoload.php');

try {
    $webServiceUrl = 'http://example.com/';
    $webServiceKey = 'ZR92FNY5UFRERNI3O9Z5QDHWKTP3YIIT';
    $webService = new PrestaShopWebservice($webServiceUrl, $webServiceKey, false);

    $configurationName = 'PS_MULTISHOP_FEATURE_ACTIVE';
    $configurationValue = 1;

    // Start by checking if the configuration is present and get its ID
    $xml = $webService->get([
        'resource' => 'configurations',
        'filter[name]' => '['. $configurationName . ']',
    ]);

    $configurationId = null;
    if ($xml->configurations->configuration->count() > 0) {
        $configurationId = (int) $xml->configurations->configuration[0]->attributes()['id'];
    }

    // Get the base XML, either a blank one or the existing one
    if (null === $configurationId) {
        $configurationXml = $webService->get(['url' => $webServiceUrl . 'api/configurations?schema=blank']);    
    } else {
        $configurationXml = $webService->get([
            'resource' => 'configurations',
            'id' => $configurationId,
        ]);    
    }

    // Update values
    $configurationXml->configuration[0]->name = $configurationName;
    $configurationXml->configuration[0]->value = $configurationValue;
} catch (PrestaShopWebserviceException $e) {
    echo 'Error:' . $e->getMessage() . PHP_EOL;
}

// Either create new configuration or update it
if (null === $configurationId) {
    try {
        $webService->add([
            'resource' => 'configurations',
            'postXml' => $configurationXml->asXML(),
        ]);
        echo 'Successfully created configuration ' . $configurationName . ' = ' . $configurationValue . PHP_EOL;
    } catch (PrestaShopWebserviceException $e) {
        echo 'Error while adding the configuration:' . $e->getMessage() . PHP_EOL;
    }
} else {
    try {
        $webService->edit([
            'resource' => 'configurations',
            'id' => $configurationId,
            'putXml' => $configurationXml->asXML(),
        ]);
        echo 'Successfully updated configuration ' . $configurationName . ' = ' . $configurationValue . PHP_EOL;
    } catch (PrestaShopWebserviceException $e) {
        echo 'Error while updating the configuration:' . $e->getMessage() . PHP_EOL;
    }
}
```
