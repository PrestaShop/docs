---
title: Getting started
menuTitle: Getting started
summary: "Getting started with multistore"
weight: 10
---

# Getting started

Before diving into technical aspects of the multistore, this article will show you the basics of setting up multiple shops from your PrestaShop's back office.

## Enabling multistore

By default, you can manage only one store in your back-office, if you want to manage more than one store you must enable multistore feature.

- In **Shop Parameters** > **General**, click on "Enable multistore"

## Creating a new store

Once the multistore mode has been enabled, a new BO page dedicated to the management of your multiple stores appears in the menu:

- **Advanced Parameters** > **Multistore**

From this page, you will be able to create new shops and shop groups: each shop must be assigned to a group. 

{{% notice note %}}
It might be useful to create different shop groups if you want to apply different configurations to subsets of shops.
{{% /notice %}}

## Choosing a shop context

From now on, at the top of the back office pages, you will see a dropdown allowing you to select a shop or a shop group, so that the actions made in configuration pages will be applied to the chosen context (all shops, all shops belonging to a specific group, or a specific shop).

{{< figure src="../../img/multistore-dropdown.png" title="Multistore context dropdown" >}}

{{% notice note %}}
Not all features and modules are compatible with multistore.
{{% /notice %}}