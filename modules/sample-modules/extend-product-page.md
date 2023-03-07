---
title: Extending the new product page form
weight: 3
---

# Extending the new product page form
{{< minver v="8.0" title="true" >}}

To allow the new product page to be easily extendable by modules, a new feature was introduced in {{< minver v="8.1.0" title="true" >}} 
This features allows to add new custom tabs with the `NavigationTabType`.

The goal of this How-to is to show how to customize the new product page with all this new introduced features, and older ones. 

The example module we are going to create can be found [here](https://github.com/PrestaShop/example-modules/tree/master/demoproductform) in our [example modules repository](https://github.com/PrestaShop/example-modules).

## What will be achieved with this how-to ?

In this how-to, we will create a new module, and add a new custom field in the native description tab. 

![custom field in product form](../img/productform-customfield.png)

Then, we will create a new empty tab, and we will add a new custom field in this module created tab.

![custom tab in product form](../img/productform-customtab.png)

Finally, we will experience how those features work in older versions of PrestaShop since they are backward compatible.

![custom field and tabs in older versions of PrestaShop](../img/productform-backward.png)

## Create the module

To create the module, we use the [regular module creation method]({{< ref "8/modules/creation/tutorial" >}}).

Our regular module skeleton: 

```php
<?php

declare(strict_types=1);

if (!defined('_PS_VERSION_')) {
    exit;
}

require_once __DIR__ . '/vendor/autoload.php';

class DemoProductForm extends Module
{
    public function __construct()
    {
        $this->name = 'demoproductform';
        $this->author = 'PrestaShop';
        $this->version = '1.0.0';
        $this->ps_versions_compliancy = ['min' => '8.1.0', 'max' => _PS_VERSION_];

        parent::__construct();

        $this->displayName = $this->trans('DemoProductForm', [], 'Modules.Demoproductform.Config');
        $this->description = $this->trans('DemoProductForm module description', [], 'Modules.Demoproductform.Config');
    }
}
```

In this example module, we use the [new translation system]({{< ref "/8/modules/creation/module-translation/new-system" >}}), so we need to add this method to enable the translation system: 

```php
    public function isUsingNewTranslationSystem(): bool
    {
        return true;
    }
```

This module is also PSR4 compliant, and namespaced, so we require the `autoload.php`, and our `composer.json` contains the following content: 

```json
{
  "name": "prestashop/demoproductform",
  "authors": [
    {
      "name": "Julius Zukauskas",
      "email": "julius.zukauskas@invertus.eu"
    },
    {
      "name": "PrestaShop Core team"
    }
  ],
  "autoload": {
    "psr-4": {
      "PrestaShop\\Module\\DemoProductForm\\": "src/"
    },
    "config": {
      "prepend-autoloader": false
    },
    "type": "prestashop-module"
  },
  "require-dev": {
    "friendsofphp/php-cs-fixer": "^3.14"
  }
}
```


## Create a custom field in description tab

## Create a new tab

## Create a custom field in the new tab

## Backward compatibility of those features


## Next steps