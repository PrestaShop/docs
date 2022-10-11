---
title: How to migrate Back Office pages to Symfony horizontally
menuTitle: Horizontal migration guide
chapter: true
weight: 40
summary: "The guide we use to migrate pages to Symfony horizontally"
---

# How to migrate Back Office pages to Symfony horizontally

{{% notice note %}}
The horizontal migration strategy is still in progress, so docs may change slightly as it develops.
{{% /notice %}}

_Pick up a legacy page, refactor the code in a single layer to follow Symfony framework standards (depending on stage of migration it may be the `model`, `view` or a `controller`). When one layer is migrated in all the pages, then the whole layer of legacy code can be deleted_.

For more information about the `horizontal` migration strategy you can refer to the [ADR](https://github.com/PrestaShop/ADR/blob/master/0018-horizontal-migration.md) and the [blog post](https://build.prestashop-project.org/news/introducing-horizontal-migration/).

## The bridge
A new namespace was introduced for the horizontal migration - `PrestaShopBundle\Bridge`. All the classes inside acts as bridges between the Symfony and the legacy code.

- `PrestaShopBundle/Bridge/AdminController/` contains classes which helps to build the Symfony controller with the encapsulated legacy code under the hood.
- `PrestaShopBundle/Bridge/Helper/` contains bridges for List and Form helpers which encapsulates the legacy `HelperList` and `HelperForm` classes.
- `PrestaShopBundle/Bridge/Smarty/` contains a bridge for converting Smarty template to a Symfony controller response.

### The legacy context and the flow

As you may already know, lots of legacy classes depends on values from Context (there are links, shop, cart, locales, controller and other important data). When migrating layer by layer, we must keep the context present because other layers in legacy code depends on it. The problem is that the Context is initiated in the legacy `controller`, and it is the first layer which is migrated. So we have implemented something to replace it by:
- `PrestaShopBundle\Bridge\AdminController\Listener\InitFrameworkBridgeControllerListener` - is the entry point for horizontal migration controllers, and it is the class responsible for setting up the context so that other layers in legacy system can depend on it as it used to. It listens for `kernel.controller` event and if the controller implements `FrameworkBridgeControllerInterface` sets up the values in the context.
- `PrestaShopBundle\Bridge\AdminController\LegacyControllerBridge` - is a class which mimics the legacy controller that is stored in the context. It provides all the methods and properties that legacy AdminController had by relying on `PrestaShopBundle\Bridge\AdminController\ControllerConfiguration` class.
- `PrestaShopBundle\Bridge\AdminController\ControllerConfiguration` - todo: finish up
## Contents of this guide

{{% children %}}

