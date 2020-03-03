---
title: Extending Symfony form with upload image field tutorial
weight: 10
---

# Extending Symfony form with upload image field tutorial
{{< minver v="1.7.7.0" title="true" >}}

## Introduction

In this tutorial we are going to build module which extends Suppliers form 
(Catalog->Brands & Suppliers->Suppliers->Edit) with the Upload image field.

We will learn more about the following topics: 

    - how to add `field type` to Symfony form with `FormBuilder`
    - how Symfony renders form fields with `form_rest` / `form_widget`
    - how to use Form Type Extension (`ImageTypeExtension`) to create Image Upload field vith image preview
    - how to declare a new Controller allowing to delete uploaded image from the Supplier edit form

## Prerequisites

- To be familiar with basic module creation.
- To be familiar how Composer autoload classes (https://devdocs.prestashop.com/1.7/modules/concepts/composer/)
- Basic understanding of Symfony forms could be helpful

### Module class and constructor

```php
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

- `action`**Supplier**`FormBuilderModifier` - for adding new  column to `Suppliers` form.
- `actionAfterUpdate`**Supplier**`FormHandler` - to upload an image when `Suppliers` form is submitted.

```php
    public function install()
    {
        return parent::install()
            && $this->registerHook('actionSupplierFormBuilderModifier')
            && $this->registerHook('actionAfterUpdateSupplierFormHandler');
    }
```



