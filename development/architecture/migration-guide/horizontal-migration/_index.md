---
title: How to migrate Back Office pages to Symfony with Horizontal migration
menuTitle: Horizontal migration guide
chapter: true
weight: 40
summary: "The guide we use to migrate pages to Symfony"
---

# How to migrate Back Office pages to Symfony

Migrating a legacy page in PrestaShop requires working on three parts of the application: templates, forms and controllers which contain the business logic.

## Strategy / To-do List

This is the list of items that usually need to be done in order to complete the migration of a legacy controller.

- Creations
  - Create `PrestaShopBundle/Controller/<path>/<Your>Controller`
  - Create related actions (functions matched to URIs)
  - Declare routing in `PrestaShopBundle/Resources/config/routing/admin/routing_*.yml` file
  - Migrate the list

## Contents of this guide

{{% children %}}
