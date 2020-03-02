---
title: Extending Symfony form with upload image field tutorial
weight: 10
---

# Extending Symfony form with upload image field tutorial
{{< minver v="1.7.7.0" title="true" >}}

## Introduction

In this tutorial we are going to build module which extends Suppliers form with the Upload image field.
We will learn more about the following topics: 

    - how to add `field type` to Symfony form with `FormBuilder`
    - how Symfony renders form fields with `form_rest` / `form_widget`
    - how to use Form Type Extension (`ImageTypeExtension`) to create Image Upload field vith image preview
    - how to declare a new Controller allowing to delete uploaded image from the Supplier edit form

## Prerequisites

- To be familiar with basic module creation.
- To be familiar how Composer autoloads classes (https://devdocs.prestashop.com/1.7/modules/concepts/composer/)
- Basic understanding of Symfony forms could be helpful
