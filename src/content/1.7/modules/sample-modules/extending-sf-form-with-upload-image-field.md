---
title: Extending Symfony form with upload image field
weight: 3
aliases: 
    - /1.7/modules/sample_modules/grid-and-identifiable-object-form-hooks-usage
---

# Grid and identifiable object form hooks usage example
{{< minver v="1.7.7" title="true" >}}


## Introduction

In this tutorial we are going to build a module which extends `Suppliers` form (SELL -> Catalog -> Brands & Suppliers).
You will learn how to:

- Main module class
- Create Symfony controller
- Doctrine entity
- Repository class
- Image Uploader class
- Twig View

### Main module class

Let's create main module class `DemoExtendSymfonyForm2`

```php
<?php
declare(strict_types=1);

// use statements

if (!defined('_PS_VERSION_')) {
    exit;
}

require_once __DIR__.'/vendor/autoload.php';

/**
 * Class demoextendsymfonyform
 */
class DemoExtendSymfonyForm2 extends Module
{
    private const SUPPLIER_EXTRA_IMAGE_PATH = '/img/su/';

    public function __construct()
    {
        $this->name = 'demoextendsymfonyform2';
        $this->author = 'PrestaShop';
        $this->version = '1.0.0';
        $this->ps_versions_compliancy = ['min' => '1.7.7.0', 'max' => _PS_VERSION_];

        parent::__construct();

        $this->displayName = $this->l('Demo Symfony Forms #2');
        $this->description = $this->l('Demonstration of how to add an image upload field inside the Symfony form');
    }
```


 
