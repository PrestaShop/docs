---
title: Order view page new hooks demo tutorial 
weight: 10
---

# Order view page new hooks demo tutorial
{{< minver v="1.7.7.0" title="true" >}}

## Introduction

In this tutorial we are going to build module which extends Order view page. 
By the following tutorial you will learn to extend Order page with 
the following components:

 - User Signature card below the Customer card.
 - Package tracking card below the the card with 'Status', 'Documents',.. tabs.
 - Customer's review card below the Messages card
 - Other orders from this customer card at the bottom of the page
 - Previous / Next order buttons at the top of the Order page
 
While creating these components you will learn how to:

 - Use Repository classes extending Symfony EntityRepository (https://symfony.com/doc/3.4/doctrine/repository.html)
 - Use Twig templates to render HTML (https://twig.symfony.com/)
 
## Prerequisites

- To be familiar with basic module creation.

### Register hooks

On module installation the following hooks are being registered:

 - `displayBackOfficeOrderActions` - for adding actions to Order page between Customer and Messages cards
 - `displayAdminOrderContentOrder` - for adding Order content to Order page
 - `displayAdminOrderTabContent` - for adding tab content to Order page
 - `displayAdminOrderTabLink` - for adding tab links for tab content
 - `displayAdminOrderMain` - for adding Order main information
 - `displayAdminOrderSide` - for adding Order side information
 - `displayAdminOrder` - for adding info to the bottom of the Order page
 - `displayAdminOrderTop` - for adding info to the top of the Order page
 - `actionGetAdminOrderButtons` - for adding info at

## Result

After completing the steps above the results should be:

 - Signature and Package tracking cards:

 {{< figure src="../img/view-order-hooks-demo/view-order-demo-result.png" title="Signature card " >}}
