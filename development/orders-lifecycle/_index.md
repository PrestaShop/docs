---
title: Orders lifecycle
weight: 42
useMermaid: true
---

# Order lifecycle : from Cart to Order

{{% notice note %}}
Orders can be created from a cart either in Front Office (FO) by the customer or in Back Office (BO) `Sell -> Orders -> "Add new order"` by the shop admin. See [Add new order page]({{< relref "../page-reference/back-office/order/add-new-order" >}}).
{{% /notice %}}

## Carts

### Cart in Front Office (FO)

In FO by default, a new empty cart is created everytime a customer signs in - this behavior can be adjusted in BO
`Configure -> Shop parameters -> Customer settings`. If customer is not signed in (guest) - the cart is created once
first product is being added into it. If guest already has a cart and signs in, the cart is assigned to him instead of
creating a new one.

<div class='mermaid'>
flowchart LR
   A(Guest with empty cart)-->|Action : Add item to Cart|B{{Cart creation}}-->C(Cart)-->|Action : Login|D{{Associate cart to customer}}-->F
   A-->|Action : Login|G{{Cart creation}}-->E{{Associate cart to customer}}-->F(Associated Cart)
</div>

{{% notice note %}}
In FO, browser cookies are used to determine if current guest has a cart. This way guest can still see his previous cart
if he is visiting the shop from the same browser in a short period of time (the time depends on cookie settings, which
can be adjusted in BO `Configure -> Administration -> General "lifetime of front office cookies"`).
{{% /notice %}}

### Cart in Back Office (BO)

When creating an order in the BO, a new empty cart is created once the customer is selected. An existing cart can also
be selected, or existing order can be used to create a new cart.

<div class='mermaid'>
flowchart LR
   A{{Select Customer}}-->|New cart|E{{Cart creation}}-->G
   A-->|From existing cart|B{{Select existing Cart}}-->F
   A-->|From order|C{{Select existing Order}}-->D{{Cart creation from Order content}}-->G{{Associate cart to customer}}-->F(Associated Cart)
</div>

## Convert a Cart to an Order

For a Cart to be able to convert to an Order, we need the following steps :

<div class='mermaid' style="text-align : center">
flowchart TB
   A(Cart)-->|Associate to customer|B(Cart associated)
   B-->|Select shipping and invoice addresses|C(Cart addressed)
   C-->|Select shipping method and carrier|D(Cart shipping configured)
   D-->|Select payment method|E(Cart payment configured)
   E-->|Submit order|F(Order)
</div>


1. **Associate to customer** : details like name, email, birthday etc. In FO you can either fill this information manually as
   guest (and optionally create new customer account) or login with existing customer. 
   In BO order creation you will be asked to select an existing customer before you can modify the existing cart or create a new one.
2. **Select shipping and invoice addresses** : provide the shipping and invoice addresses information. Shipping (a.k.a. delivery) address is where the
   ordered products should be sent while the invoice address is where the invoice is sent. In FO, you can provide one
   address to be used as both - shipping and invoice. In BO, you must select shipping and invoice addresses (the same
   address can also be selected for both - shipping and invoices). 
3. **Select shipping method and carrier** : after this step is complete you will need to select available carriers
   (carriers are searched by delivery address and can be modified by shop admin in Improve -> Shipping -> Carriers page). Note - carrier will not be available if selected country or zone is disabled (in BO International -> Locations) or carrier shipping and locations settings are not configured.
3. **Select payment method** : choose how to pay for the order. Shop admin can configure payment methods in BO Payment -> Payment methods.
   All payments are handled by payment modules. Prestashop comes with 2 payment modules by default:

    * ps_checkpayment - allows check payments.
    * ps_wirepayment - allows wire payments (bank transfers).

   {{% notice note %}}
   Payment restrictions for currency, country, group and carrier can be configured in BO `Improve -> Payment -> Preferences`.
   {{% /notice %}}

4. **Submit Order** : Once the order is submitted, a unique order reference is generated and certain records from a cart and related
   entities are added into following database tables:
    * orders
    * order_history
    * order_detail
    * order_carrier
    * order_cart_rule (if any discounts were applied)
    * order_detail_tax (if any taxes are applied)

5. After order is successfully created, an email with the order information is sent to the customer.

{{% notice note %}}

Email sending settings can be found in BO `Configure -> Advanced parameters -> E-mail`. Email translations and templates
in `Improve -> International -> Translations`.

When order is being created in BO, email with the link to a prefilled cart can be sent before creating the order (so the
customer can finish up the checkout process). To do that
click `More actions -> Send pre-filled order to the customer by email` in summary block.

{{% /notice %}}

#### Order status

When creating order from the FO, the initial order status will differ depending on selected payment method. For example,
if "Payment by check" is selected, then order will be created with the "Awaiting check payment" status, or if "Bank
transfer" is selected, the status will be "Awaiting wire payment".

Order status changing cycle depends on payment module. Some modules (like the default ones provided above) will require
shop admin to control the order status manually, which can be done in BO `Sell -> Orders -> Orders`. Other more
complicated payment modules, which integrates online payments in checkout process, will control the order status
automatically (e.g. when payment is done, the order status automatically changes to "Payment accepted").

Order statuses can be configured in BO `Shop parameters -> Order settings -> Statuses`.

{{% notice note %}}

When creating order from the BO, the initial order status must be selected manually.

{{% /notice %}}

