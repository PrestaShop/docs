---
title: Migrating controller layer horizontally
weight: 40
---

## The Bridge
A new namespace was introduced for the horizontal migration - `PrestaShopBundle\Bridge`. All the classes inside acts as bridges between Symfony and the legacy code.

- `PrestaShopBundle/Bridge/AdminController/` contains classes which helps to build the Symfony controller with the encapsulated legacy code under the hood.
- `PrestaShopBundle/Bridge/Helper/` contains bridges for List and Form helpers which encapsulates the legacy `HelperList` and `HelperForm` classes.
- `PrestaShopBundle/Bridge/Smarty/` contains a bridge for converting Smarty template to a Symfony controller response.

### Creating the Controller
To start migrating a page horizontally you need to create a new Symfony controller under `PrestaShopBundle/Controller/<path>/<Your>Controller` and extend the `FrameworkBundleAdminController` (same as with vertical migration). The controller must implement a `PrestaShopBundle\Bridge\AdminController\FrameworkBridgeControllerInterface` which requires 2 methods to be implemented:
 - `getLegacyControllerBridge(): LegacyControllerBridgeInterface`
 - `getControllerConfiguration(): ControllerConfiguration`
@todo; finish up.

## Strategy / To-do List

- Creations
  - Create `PrestaShopBundle/Controller/<path>/<Your>Controller`
  - Create related actions (functions matched to URIs)
  - Declare routing in `PrestaShopBundle/Resources/config/routing/admin/routing_*.yml` file
