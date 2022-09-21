---
title: Add new order

menuTitle: Add new order
---

# Add new order

Page can be reached by going to `Sell -> Orders -> Orders -> Add new order`. It allows the Back Office user to create a new order for a
selected customer.

{{% notice %}}

Order creation is still affected by customer addresses, taxes and other settings. So for example, if selected Customer
country or zone is disabled, you won't see any available carriers.

{{% /notice %}}

## Benefits

There are some benefits comparing to Front Office (FO) order creation:

- Any cart previously used by the customer, can be used to create a new order
- Any order previously used by the customer, can be used to create a new order
- Any cart rule or specific price for this particular order can be applied
- Email with the link to a prefilled cart can be sent to the customer
- Any order status can be selected before creation

## Page specifics

This page is very specific compared to other BO pages, it has kind of a flow - each block depends on previous block selections, that's why **most of it depends on javascript**.  Unfortunately it also has limited extension capabilities - there are no common services as form or grid builders, therefore no hooks that could help module developers to modify the display.

{{% notice %}}

All the javascript code related to this page can be found at `admin-dev/themes/new-theme/js/pages/order/create.ts`.
These `.ts` files are the `develop` version prior compiling. See ["How to compile assets"]({{< relref "/8/development/compile-assets" >}}) for
more information.

{{% /notice %}}

## The flow

#### Customer

When you enter the page, first thing you will notice is the `Customer` block:
{{< figure src="./img/customer-search-block.png" title="Customer search block" >}}

Use the search to find desired customer by `email` or `name` or `create a new one` by pressing `Add new customer`. Customer search is performed using `ajax` by calling [CustomerController::searchAction](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Controller/Admin/Sell/Customer/CustomerController.php). Javascript code can be found in [customer-manager.ts](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/admin-dev/themes/new-theme/js/pages/order/create/customer-manager.ts) 

{{% notice %}}
`Add new customer` button opens the same form from `Customers -> Customers -> Add new customer` loaded in an iframe. The `iframe` content is rendered using the `Lite Display` mode of the Back Office.
{{% /notice %}}

Once the customer is loaded, a new cart is created behind the scenes and the following information is shown:
- [Customer carts list]({{< relref "#customer-carts-list" >}})
- [Customer orders list]({{< relref "#customer-orders-list" >}})
- [Cart block]({{< relref "#cart-block" >}})
- [Customer addresses block]({{< relref "#customer-addresses-block" >}})
- Once you fill all the required information, you will finally see the [Summary block]({{< relref "#summary-block" >}}).

#### Customer carts list
{{< figure src="./img/customer-carts-block.png" title="Customer carts" >}} 

Details of each cart that was used by the customer can be checked by clicking on `Details` button - The `Sell -> Orders -> Shopping Carts -> View cart` page will be opened in a modal window.
Existing `Cart` can be also used to create a new one - press `Use` and the selected `Cart` will be loaded and available for modifications.
This block is loaded using `ajax` by calling [CustomerController::getCartsAction](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Controller/Admin/Sell/Customer/CustomerController.php). Related `javascript` code can be found in [customer-manager.ts](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/admin-dev/themes/new-theme/js/pages/order/create/customer-manager.ts)

#### Customer orders list
{{< figure src="./img/customer-orders-block.png" title="Customer orders" >}}

Details of each order used by the customer can be checked by clicking on `Details` button - The `Sell -> Orders -> Carts -> View order` page will be opened in a modal window.
Existing `Order` can be also used to create a new one - press `Use` and a new `Cart` will be created with all the information duplicated from the selected `Order`.
This block is loaded using `ajax` by calling [CustomerController::getOrdersAction](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Controller/Admin/Sell/Customer/CustomerController.php). Related `javascript` code can be found in [customer-manager.ts](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/admin-dev/themes/new-theme/js/pages/order/create/customer-manager.ts)

#### Cart block
{{< figure src="./img/cart-block.png" title="Cart" >}}

Cart block contains cart `products`, `currency` and `language` selection. Products can be searched and added to a cart. A list of products and a new block of [Cart rules]({{< relref "#cart-rules-block" >}}) will appear after a product is added. Listed products quantity and price can be modified. Related actions `addProductAction`, `editProductPriceAction` and `editProductQuantityAction` can be found in [CartController](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Controller/Admin/Sell/Order/CartController.php)
{{< figure src="./img/products-list.png" title="Products list" >}}

{{% notice %}}
Product price can be modified. This is similar behavior to the one in the `Order view page`, however behind the scenes it is different. Unlike in the `Order view page`, we don't have any `OrderDetail` yet, because at this point we are still modifying the `Cart`, so it is achieved by creating a new temporary [SpecificPrice](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/SpecificPrice.php) and assigning specifically to that certain `Cart`, `Product`, `Customer` and `Shop`. See [CartController::editProductPriceAction](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Controller/Admin/Sell/Order/CartController.php).
{{% /notice %}}

#### Cart rules block
{{< figure src="./img/cart-rule-block.png" title="Vouchers" >}}

This block allows searching cart rules by name or code and adding them to the cart. Related actions can be found in [CartRuleController::searchAction](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Controller/Admin/Sell/Catalog/CartRuleController.php) and [CartController::addCartRuleAction](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Controller/Admin/Sell/Order/CartController.php) It is also possible to create a new `Cart rule` by clicking the `Add new voucher` button.

{{% notice %}}
`Add new voucher` button opens the same form from `Sell -> Catalog -> Discounts -> Add new cart rule` loaded in an `iframe`.
{{% /notice %}}

#### Customer addresses block
{{< figure src="./img/customer-addresses-block.png" title="Addresses" >}}

This block allows selecting the `delivery` and `invoice` addresses for the customer. New address can be created by clicking `Add new address` - the modal window with the creation form will appear. It is also possible to `edit` the addresses in same manner, by clicking `Edit` on selected address.

{{% notice %}}
The form in the modal is actually the same form from `Customers -> Addresses` page rendered using an `iframe`.
{{% /notice %}}

#### Shipping block
{{< figure src="./img/shipping-block.png" title="Shipping" >}}
Shipping block will appear only if at least one carrier is available for selected delivery address. This block allows selecting a carrier for the order, shows the shipping price and allows to mark the order as `Free shipping`.

{{% notice %}}
When `Free shipping` is checked, behind the scenes, it is achieved by creating a new temporary [CartRule](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/CartRule.php) with `$free_shipping = true` and assigned to customer. See [UpdateCartDeliverySettingsHandler::handleFreeShippingOption](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/Adapter/Cart/CommandHandler/UpdateCartDeliverySettingsHandler.php).
{{% /notice %}}

#### Summary block
{{< figure src="./img/summary-block.png" title="Order summary block" >}}

This is the final block that requires selecting `payment method`, `order status` and allows submitting the whole form. Prior to that it also allows adding `a message for the customer` or `sending the email with the pre-filled order to the customer`. Once `Create the order` is clicked it uses the [OrderController::placeAction](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/src/PrestaShopBundle/Controller/Admin/Sell/Order/OrderController.php) to create the order.

{{% notice %}}
You can also click `More actions -> Proceed to checkout in the front office` to finish up the order in the Front office of your shop.
{{% /notice %}}
