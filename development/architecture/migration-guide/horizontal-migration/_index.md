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

### The legacy context and the ControllerConfiguration

As you may already know, lots of legacy classes depends on values from Context (there are links, shop, cart, locales, controller and other important data). When migrating layer by layer, we must keep the context present because other layers in legacy code depends on it. The problem is that the Context is initiated in the legacy `controller`, and it is the first layer which is migrated. So we have implemented something to replace it by:
- `PrestaShopBundle\Bridge\AdminController\Listener\InitFrameworkBridgeControllerListener` - is the entry point for horizontal migration controllers, and it is the class responsible for setting up the context so that other layers in legacy system can depend on it as it used to. It listens for `kernel.controller` event and if the controller implements `FrameworkBridgeControllerInterface` sets up the required data in the context.
- `PrestaShopBundle\Bridge\AdminController\LegacyControllerBridge` - is a class which mimics the legacy controller that is stored in the context. It provides all the methods and properties that legacy AdminController had, by relying on `PrestaShopBundle\Bridge\AdminController\ControllerConfiguration` class. We separated the controller and the configuration, but it required some "nasty" magic methods to stay intact. You can see `LegacyControllerBridge::__get()` and `LegacyControllerBridge::__set()` methods, which allows to access the `ControllerConfiguration` properties straight through the LegacyControllerBridge. So any internal code that used to call `context->controller->{foo}` should still work as before.
- `PrestaShopBundle\Bridge\AdminController\ControllerConfiguration` - is a class which defines the controller that is being migrated horizontally, and its properties reflect the properties of legacy AdminController. It is mandatory to build the `ControllerConfiguration` in every migrated controller, therefore the `PrestaShopBundle\Bridge\AdminController\FrameworkBridgeControllerInterface` requires implementing a method `getControllerConfiguration()`. 


### The Helpers

When building lists and forms, the legacy code used to rely on helper classes called [HelperList, HelperForm and HelperOptions]({{< ref "/8/development/components/helpers/#the-main-helpers" >}}). The `HelperOptions` is not relevant in horizontal migration, because all the configuration forms are already migrated.
For the HelperList there is a `PrestaShopBundle\Bridge\Helper\Listing\HelperBridge\HelperListBridge`, and for HelperForm there is a HelperFormBridge (_forms are in progress, more info later_). 

- The `PrestaShopBundle\Bridge\Helper\Listing\HelperBridge\HelperListBridge` relies on the `PrestaShopBundle\Bridge\Helper\Listing\HelperListConfiguration` to generate the list content by using the legacy HelperList inside, therefore acting as a proxy between symfony controller and the legacy HelperList. It contains some list-related logic, which originally existed in the legacy AdminController.
- The `PrestaShopBundle\Bridge\Helper\Listing\HelperListConfiguration` holds the definition of the list. All the list columns, actions and options are defined using this class. The logic and the hooks which existed in the legacy HelperList should still behave the same way.
- The `PrestaShopBundle\Bridge\Helper\Listing\FiltersProcessor` is responsible for filtering, resetting the filters and sorting the list. The code is basically a copy-paste from AdminController::processFilter(). Depending on request parameters (`submitReset{listId}`, `submitFilter{listId}`,`{listId}Orderby`, `{listId}Orderway`) it resets, filters or sorts (a.k.a orders) the list.

## Contents of this guide

{{% children %}}

