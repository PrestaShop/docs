---
title: Order view
menuTitle: Order view
---

# Order View Page

Page can be reached by going to `Sell -> Orders -> Orders -> View (grid row action)`. It allows the Back Office user to view the details of selected order and edit it. The **related code can be found in following locations**:
- Main **twig template** [src/PrestaShopBundle/Resources/views/Admin/Sell/Order/Order/view.html.twig](https://github.com/PrestaShop/PrestaShop/tree/1.7.8.x/src/PrestaShopBundle/Resources/views/Admin/Sell/Order/Order/view.html.twig).
- **Javascript** ([pre-compiled]({{< relref "compile-assets" >}})) [admin-dev/themes/new-theme/js/pages/order/view](https://github.com/PrestaShop/PrestaShop/tree/1.7.8.x/admin-dev/themes/new-theme/js/pages/order/view).
- **OrderController** [src/PrestaShopBundle/Controller/Admin/Sell/Order/OrderController](https://github.com/PrestaShop/PrestaShop/blob/1.7.8.x/src/PrestaShopBundle/Controller/Admin/Sell/Order/OrderController.php) (other domain controllers are used as well, those will be mentioned in related block references bellow) 
- **Commands** & **Queries** at [src/Core/Domain/Order](https://github.com/PrestaShop/PrestaShop/tree/1.7.8.x/src/Core/Domain/Order) in `Command`, `Query` directories.
- Most **handlers** or **domain services implementations** can be found in `Adapter` namespace [src/Adapter/Order](https://github.com/PrestaShop/PrestaShop/tree/1.7.8.x/src/Adapter/Order)

Once opened, the page will show following blocks:

- [Actions block]({{< relref "#actions-block" >}})
- [Customer block]({{< relref "#customer-block" >}})
- [Products block]({{< relref "#products-block" >}})
- Message block
- Details block
- Payment block

#### Actions block
{{< figure src="./img/actions-block.png" title="Order actions block" >}}

This block contains following actions:
- Status update - new order status can be selected from a dropdown. See [OrderController::updateStatusAction](https://github.com/PrestaShop/PrestaShop/blob/1.7.8.x/src/PrestaShopBundle/Controller/Admin/Sell/Order/OrderController.php).
- View invoice - generates invoice PDF. See [OrderController::generateInvoicePdfAction](https://github.com/PrestaShop/PrestaShop/blob/1.7.8.x/src/PrestaShopBundle/Controller/Admin/Sell/Order/OrderController.php).
- Print order - prepares and shows modified page layout for printing. This action is performed by javascript in [admin-dev/themes/new-theme/js/pages/order/view](https://github.com/PrestaShop/PrestaShop/tree/1.7.8.x/admin-dev/themes/new-theme/js/pages/order/view)
- Refund - read about refunds [here]({{< relref "./refunds" >}}).
- Next/Previous - allows to quickly jump to next or previous order in the list (simple `href` buttons redirecting to another `View order` page).

#### Customer block
{{< figure src="./img/customer-block.png" title="Order customer block" >}}

Contains information like customer `email`, `addresses`, `orders count`, `total spent sum`. Click the `View full details` link to see more information about the customer (it redirects to `Customers -> Customers -> View customer` page). This block also allows following actions:
- Editing and selecting new customer shipping and/or invoice addresses (both of these actions opens a modal with a `Customers -> Addresses -> Edit` page inside an `iframe` using the `Lite display` mode of the Back Office). See [OrderController::changeCustomerAddressAction](https://github.com/PrestaShop/PrestaShop/blob/1.7.8.x/src/PrestaShopBundle/Controller/Admin/Sell/Order/OrderController.php).
- Adding a private note (`Order->note`). See [OrderController::setInternalNoteAction](https://github.com/PrestaShop/PrestaShop/blob/1.7.8.x/src/PrestaShopBundle/Controller/Admin/Sell/Order/OrderController.php).

#### Products block
{{< figure src="./img/products-block.png" title="Order products block" >}}

Contains a list of ordered products and prices summary.

{{% notice %}}
The products list has a pagination feature, but it is only a front-end pagination (not the database level) - all the products are loaded into the memory and handled by javascript. See [admin-dev/themes/new-theme/js/pages/order/view/order-product-renderer.js](https://github.com/PrestaShop/PrestaShop/blob/1.7.8.x/admin-dev/themes/new-theme/js/pages/order/view/order-product-renderer.js).
{{% /notice %}}

Following actions can be done in this block (most of these actions are related to [OrderDetail](https://github.com/PrestaShop/PrestaShop/blob/1.7.8.x/classes/order/OrderDetail.php) - one `OrderDetail` is equivalent to one row in a products list):
- Add a product - create additional `OrderDetail` for the `Order`. See [OrderController::addProductAction](https://github.com/PrestaShop/PrestaShop/blob/1.7.8.x/src/PrestaShopBundle/Controller/Admin/Sell/Order/OrderController.php).
- Remove product - remove the `OrderDetail` related to the selected product. See [OrderController::deleteProductAction](https://github.com/PrestaShop/PrestaShop/blob/1.7.8.x/src/PrestaShopBundle/Controller/Admin/Sell/Order/OrderController.php).
- Edit product price - modify the base price of the `OrderDetail` related to the selected product. See [OrderController::updateProductAction](https://github.com/PrestaShop/PrestaShop/blob/1.7.8.x/src/PrestaShopBundle/Controller/Admin/Sell/Order/OrderController.php).
- Edit product quantity - modify the quantity of the `OrderDetail` related to the selected product. See [OrderController::updateProductAction](https://github.com/PrestaShop/PrestaShop/blob/1.7.8.x/src/PrestaShopBundle/Controller/Admin/Sell/Order/OrderController.php).
- Add discount - create a new `CartRule` and assign it to this order. See [OrderController::addCartRuleAction](https://github.com/PrestaShop/PrestaShop/blob/1.7.8.x/src/PrestaShopBundle/Controller/Admin/Sell/Order/OrderController.php).

{{% notice %}}
It is possible to have multiple invoices related to same order, therefore when editing a product or adding a discount you can select which invoice to use.
{{< figure src="./img/order-invoice-select.png" title="Order invoice select" >}}
{{% /notice %}}
