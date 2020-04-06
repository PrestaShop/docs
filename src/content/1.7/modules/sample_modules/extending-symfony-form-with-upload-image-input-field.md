---
title: Extending Symfony form with upload image field tutorial
weight: 10
---

# Extending Symfony form with upload image field tutorial
{{< minver v="1.7.7.0" title="true" >}}

## Introduction

In this tutorial we are going to build a module which extends Suppliers form 
(Catalog -> Brands & Suppliers -> Suppliers -> Edit) with the Upload image field.

We will learn more about the following topics:

    - how to add `field type` to Symfony form with `FormBuilder`
    - how Symfony renders form fields with `form_rest` / `form_widget`
    - how to use Form Type Extension (`ImageTypeExtension`) to create Image Upload field vith image preview
    - how to declare a new Controller allowing to delete uploaded image from the Supplier edit form

## Prerequisites

- To be familiar with basic module creation.
- To be familiar how Composer autoload classes (https://devdocs.prestashop.com/1.7/modules/concepts/composer/)
- Basic understanding of Symfony forms could be helpful

### Composer

We use composer for our classes auto loading.

```.json
{
    "name": "prestashop/demosymfonyforms",
    "authors": [
        {
            "name": "Preston PrestaShop",
            "email": "preston@prestashop.com"
        }
    ],
    "autoload": {
      "psr-4": {
        "DemoSymfonyForms\\": "src/"
      },
      "config": {
        "prepend-autoloader": false
      },
      "type": "prestashop-module"
    }
}
```

Lets run `composer install` from terminal/command line and see `vendors` folder appear. 
After adding `autoload` field, you have to re-run this command `composer dump-autoload`.
See https://getcomposer.org/doc/01-basic-usage.md to learn more about basic usage of composer.

### Module class and constructor

{{% notice note %}}
It is important to require `autoload.php` like `require_once __DIR__ . '/vendor/autoload.php';` 
for module to install correctly if you plan to create a service class like we will create `SupplierSecondImageUploader`. 
We need it because we reuse constants between classes and currently PrestaShop modules do not support autoloading
 them by default even the service is registered in `config/services.yml`
{{% /notice %}}

```php
<?php

declare(strict_types=1);

if (!defined('_PS_VERSION_')) {
    exit;
}

require_once __DIR__ . '/vendor/autoload.php';

class demosymfonyforms extends Module
{
    public function __construct()
    {
        $this->name = 'demosymfonyforms';
        $this->author = 'PrestaShop';
        $this->version = '1.0.0';
        $this->ps_versions_compliancy = ['min' => '1.7.7.0', 'max' => _PS_VERSION_];

        parent::__construct();

        $this->displayName = $this->l('Demo Symfony Forms');
        $this->description = $this->l('Demonstration of how to add an image upload field inside the Symfony form');
    }
}
```

### Register hooks

On module installation the following hooks are being registered:

- `actionSupplierFormBuilderModifier` - for adding new  column to `Suppliers` form.
- `actionAfterUpdateSupplierFormHandler` - to upload an image when `Suppliers` form is submitted.

```php
    public function install()
    {
        return parent::install()
            && $this->registerHook('actionSupplierFormBuilderModifier')
            && $this->registerHook('actionAfterUpdateSupplierFormHandler');
    }
```

### Create uninstall method

```php
    public function uninstall()
    {
        return parent::uninstall();
    }
``` 

