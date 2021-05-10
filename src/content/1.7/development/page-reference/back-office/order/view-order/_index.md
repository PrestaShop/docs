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
- Customer block
- Products block
- Message block
- Details block
- Payment block

#### Actions block
{{< figure src="./img/actions-block.png" title="Order actions block" >}}

This block contains actions such as 
- Status update - new order status can be selected from a dropdown. See [OrderController::updateStatusAction](https://github.com/PrestaShop/PrestaShop/blob/1.7.8.x/src/PrestaShopBundle/Controller/Admin/Sell/Order/OrderController.php).
- View invoice - generates invoice PDF. See [OrderController::generateInvoicePdfAction](https://github.com/PrestaShop/PrestaShop/blob/1.7.8.x/src/PrestaShopBundle/Controller/Admin/Sell/Order/OrderController.php).
- Print order - prepares and shows modified page layout for printing. This action is performed by javascript in [admin-dev/themes/new-theme/js/pages/order/view](https://github.com/PrestaShop/PrestaShop/tree/1.7.8.x/admin-dev/themes/new-theme/js/pages/order/view)
- Refund - read about refunds [here]({{< relref "./refunds" >}})).
- Next/Previous - allows to quickly jump to next or previous order in the list (simple `href` buttons redirecting to another `View order` page).

#### Customer block

