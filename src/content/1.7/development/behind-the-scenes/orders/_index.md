---
title: Orders

weight: 42

chapter: true
---

# Orders related code specifics

Explains some "not so obvious" technical parts related to orders domain.

### Context state manager

Order pages were migrated to Symfony framework, but some legacy methods are still used (they are too ambiguous for
refactoring at this stage). Some of those methods, especially the ones related to cart modifications, are closely
coupled with the Context. However, the context became inconsistent, because some of context related operations were
hardcoded in controllers or other classes which are not used anymore. To make sure that the context contains what we
expect before calling certain methods, we had introduced the
the [ContextStateManager](https://github.com/PrestaShop/PrestaShop/blob/1.7.8.x/src/Adapter/ContextStateManager.php).
This service allows to modify the context and revert ir back to the original state. For example, it is possible to set
the context `Cart` or a `Customer` to certain values, then perform some operations that depends on those values through a
context and then revert it back to avoid unexpected behavior in further code.

### Specific price for product in cart

In BO `Sell -> Orders -> Orders -> Add new order`, user can modify the price for selected product in cart. Behind the
scenes, to achieve this, a
new [SpecificPrice](https://github.com/PrestaShop/PrestaShop/blob/1.7.8.x/classes/SpecificPrice.php) is created and
assigned to that cart and that product.
See [CartController::editProductPriceAction](https://github.com/PrestaShop/PrestaShop/blob/1.7.8.x/src/PrestaShopBundle/Controller/Admin/Sell/Order/CartController.php)
.

### Free shipping cart rule in cart

In BO `Sell -> Orders -> Orders -> Add new order`, user can mark the "Free shipping" option, to have the order shipped
for free. Behind the scenes, to achieve this, a
new [CartRule](https://github.com/PrestaShop/PrestaShop/blob/1.7.8.x/classes/CartRule.php) with `$free_shipping = true`
is created (or used if already exists) with specific code prefix for all the BO orders.
See [UpdateCartDeliverySettingsHandler::handleFreeShippingOption](https://github.com/PrestaShop/PrestaShop/blob/1.7.8.x/src/Adapter/Cart/CommandHandler/UpdateCartDeliverySettingsHandler.php)
.
