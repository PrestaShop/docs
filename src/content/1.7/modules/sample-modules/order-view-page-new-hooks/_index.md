---
title: Order view page new hooks demo tutorial 
weight: 2
aliases:
    - /1.7/modules/sample_modules/order_pages_new_hooks/
---

# Order pages new hooks demo tutorial
{{< minver v="1.7.7.0" title="true" >}}

## Introduction

In this tutorial we are going to build a module to extend Order view page and the Orders' preview. 
The module will add the following components:

 - User Signature card below the Customer card.
 - Additional action buttons in the main buttons bar.
 
While creating this component you will learn how to:

 - Create a module with namespace thanks to composer
 - Use Doctrine (https://devdocs.prestashop.com/1.7/modules/concepts/doctrine/)
 - Use Repository classes extending Symfony EntityRepository (https://symfony.com/doc/3.4/doctrine/repository.html)
 - Use Symfony services (https://devdocs.prestashop.com/1.7/modules/concepts/services/)
 - Use Twig templates to render HTML (https://devdocs.prestashop.com/1.7/development/architecture/migration-guide/templating-with-twig/)
 - Various design patterns: Repository, Factory, Presenter
 
{{% notice note %}}
We use this module to demonstrate how to use these concepts/components because they bring some additional value
but this is not mandatory. These are just some of the "how to" examples. Would recommend to focus on your
project needs and don't hesitate to write a note to PrestaShop Core developers if we could do it better!
{{% /notice %}}

## Prerequisites

- To be familiar with basic module creation.
- To be familiar how Composer autoloads classes (https://devdocs.prestashop.com/1.7/modules/concepts/composer/)

### Available hooks

On module installation the following hooks can be registered, on the order view page:

 - `displayAdminOrderTabLink` - for adding tab links for tab content
 - `displayAdminOrderTabContent` - for adding tab content to Order page
 - `displayAdminOrderMain` - for adding Order main information
 - `displayAdminOrderSide` - displayed between Customer and Messages cards in the Order page
 - `displayAdminOrderSideBottom` - for adding Order side information
 - `displayAdminOrder` - displayed at the bottom of the Order page
 - `displayAdminOrderTop` - displayed at the top of the Order page
 - `actionGetAdminOrderButtons` - to display additional action buttons into the main buttons bar.

on the listing page:
 - `displayOrderPreview ` -  displayed at the bottom of the order's preview on the order's listing page.
 
These hooks are visualized in the picture below:

 {{< figure src="../img/view-order-hooks-demo/ps-view-order-page-hooks.jpg" title="Order view page hooks locations" >}}
 
 {{< figure src="../img/view-order-hooks-demo/ps-listing-order-page-hook.png" title="Order listing page hooks locations" >}}

This tutorial has these sections:

{{% children %}} 
