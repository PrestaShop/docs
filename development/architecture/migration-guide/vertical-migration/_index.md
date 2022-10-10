---
title: How to migrate Back Office pages to Symfony vertically
menuTitle: Vertical migration guide
chapter: true
weight: 40
summary: "The guide we use to migrate pages to Symfony vertically"
---

# How to migrate Back Office pages to Symfony vertically

_Pick up a legacy page in Back Office, refactor controllers, forms and templates to follow Symfony framework standards, delete all the legacy code which is not used anymore_.

## Strategy / To-do List

This is the list of items that usually need to be done in order to complete the migration of a legacy controller.

- Creations
  - Create `PrestaShopBundle/Controller/<path>/<Your>Controller`
  - Create related actions (functions matched to URIs)
  - Declare routing in `PrestaShopBundle/Resources/config/routing/admin/{path-following-menu}/*.yml` file (e.g. `PrestaShopBundle/Resources/config/routing/admin/sell/catalog/suppliers.yml`). Read more about routing in [Symfony documentation](https://symfony.com/doc/4.4/routing.html#creating-routes-in-yaml-xml-or-php-files)
  - Create Symfony form types for each form available in pages
  - Create and configure Javascript (using Webpack/ES6) file
  - Create every twig blocks in `views/<path>/*.html.twig`
  - Implement Forms submission
  - Implement Forms validation
  - If required, implement (request) Parameters update
  - Check Error Handling
  - Checks permissions and demo mode constraints
  - Re-introduce hooks (and document the missing one if you can't for a good reason)
  - Complete `Link` class to map PrestaShop menu to the new page
  - Create the smoke/survival tests for the migrated page
- Deletions
  - Remove the old controller in `controllers/admin/Admin*.php`
  - Remove related old templates (in `admin-dev/themes/default/template/controllers/*`)

## Contents of this guide

{{% children %}}
