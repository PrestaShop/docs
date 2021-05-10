---
title: Add new order

menuTitle: Add new order
---

# Add new order

Page can be reached by going to `Sell -> Orders -> Orders -> Add new order`. It allows to create a new order for a
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

This page is very specific compared to other BO pages - **big part of it depends on javascript**.

{{% notice %}}

All the javascript code related to this page can be found at `admin-dev/themes/new-theme/js/pages/order/create.js`.
These `.js` files are the `develop` version prior compiling. See ["How to compile assets"]({{< relref "compile-assets" >}}) for
more information.

{{% /notice %}}

This way the page is very dynamic and more user-friendly, but it is not so easy to extend it.

### Behind the scenes
#### Specific price for product in cart

User can modify the price for selected product in cart. This is similar behavior to the one in the `Order view page`, however behind the scenes it is different. Unlike in the `Order view page`, we don't have any `OrderDetail` yet, because at this point we are still modifying the `Cart`, so it is achieved by creating a new temporary [SpecificPrice](https://github.com/PrestaShop/PrestaShop/blob/1.7.8.x/classes/SpecificPrice.php) and assigning specifically to that certain `Cart`, `Product`, `Customer` and `Shop`. See [CartController::editProductPriceAction](https://github.com/PrestaShop/PrestaShop/blob/1.7.8.x/src/PrestaShopBundle/Controller/Admin/Sell/Order/CartController.php).

#### Free shipping cart rule in cart

User can select the "Free shipping" option, to have the order shipped for free. Behind the scenes, it is achieved by creating a new temporary [CartRule](https://github.com/PrestaShop/PrestaShop/blob/1.7.8.x/classes/CartRule.php) with `$free_shipping = true` and assigned to customer. See [UpdateCartDeliverySettingsHandler::handleFreeShippingOption](https://github.com/PrestaShop/PrestaShop/blob/1.7.8.x/src/Adapter/Cart/CommandHandler/UpdateCartDeliverySettingsHandler.php).

## Flow

#### Customer

When you enter the page, first thing you will notice is the `Customer` block:
{{< figure src="./img/customer-search-block.png" title="Customer search block" >}}

Use the search to find desired customer by `email` or `name` or `create a new one` by pressing `Add new customer`. Customer search is performed using `ajax` by calling [CustomerController::searchAction](https://github.com/PrestaShop/PrestaShop/blob/develop/src/PrestaShopBundle/Controller/Admin/Sell/Customer/CustomerController.php). Javascript code can be found in [customer-manager.js](https://github.com/PrestaShop/PrestaShop/blob/develop/admin-dev/themes/new-theme/js/pages/order/create/customer-manager.js) 

{{% notice %}}
When pressing `Add new customer`, modal opens containing the same form from `Customers -> Customers -> Add new customer` loaded in an iframe.
{{% /notice %}}

Once the customer is loaded, a new cart is created behind the scenes and the following information is shown:
- [Customer carts list]({{< relref "#customer-carts-list" >}})
- [Customer orders list]({{< relref "#customer-orders-list" >}})
- [Cart block]({{< relref "#cart-block" >}})
- [Customer addresses block]({{< relref "#customer-addresses-block" >}})
- Once you fill all required information, you will finally see the [Summary block]({{< relref "#summary-block" >}}).

#### Customer carts list
{{< figure src="./img/customer-orders-block.png" title="Customer carts" >}} 

Details of each cart that was used by the customer can be checked by clicking on `Details` button - The `Sell -> Orders -> Shopping Carts -> View cart` page will be opened in a modal window.
Existing `Cart` can be also used to create a new one - press `Use` and the selected `Cart` will be loaded and available for modifications.
This block is loaded using `ajax` by calling [CustomerController::getCartsAction](https://github.com/PrestaShop/PrestaShop/blob/develop/src/PrestaShopBundle/Controller/Admin/Sell/Customer/CustomerController.php). Related `javascript` code can be found in [customer-manager.js](https://github.com/PrestaShop/PrestaShop/blob/develop/admin-dev/themes/new-theme/js/pages/order/create/customer-manager.js)

#### Customer orders list
{{< figure src="./img/customer-carts-block.png" title="Customer orders" >}}

Details of each order used by the customer can be checked by clicking on `Details` button - The `Sell -> Orders -> Carts -> View order` page will be opened in a modal window.
Existing `Order` can be also used to create a new one - press `Use` and a new `Cart` will be created with all the information duplicated from the selected `Order`.
This block is loaded using `ajax` by calling [CustomerController::getOrdersAction](https://github.com/PrestaShop/PrestaShop/blob/develop/src/PrestaShopBundle/Controller/Admin/Sell/Customer/CustomerController.php). Related `javascript` code can be found in [customer-manager.js](https://github.com/PrestaShop/PrestaShop/blob/develop/admin-dev/themes/new-theme/js/pages/order/create/customer-manager.js)

#### Cart block
{{< figure src="./img/cart-block.png" title="Cart" >}}

Cart block contains cart `products`, `currency` and `language` selection. Products can be searched and added to a cart. A list of products and a new block of `Cart rules` will appear after a product is added. Listed products quantity and price can be modified as well as any cart rule can be added by searching it in `Cart rule` block.
{{< figure src="./img/products-list-and-vouchers.png" title="Products list and vouchers" >}}

#### Customer addresses block
{{< figure src="./img/customer-addresses-block.png" title="Addresses" >}}
**todo**: finish up

#### Summary block
**todo**: add screenshot and finish up
