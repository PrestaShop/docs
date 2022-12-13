---
title: Orders lifecycle
weight: 42
useMermaid: true
---

# Order lifecycle: Cart, Checkout, and Order

{{% notice note %}}
Orders can be created from a Cart, either in Front Office (FO) by the Customer or Back Office (BO) `Sell -> Orders -> "Add new Order"` by the Shop Employee. See [Add new Order page]({{< relref "../page-reference/back-office/order/add-new-order" >}}).
{{% /notice %}}

## Carts

### Cart in Front Office

The Cart is created in database once first Product is being added into it. 
- If Customer is not signed in (Guest), and he adds a Product to Cart, the Cart is created, but not associated to a Customer.
- If a Guest already has a Cart and signs in, the Cart is assigned to him instead of creating a new one.

{{% notice note %}}
When a Customer signs-in, has an empty Cart in its Cookie (or does not have a Cart) and has a previous non ordered Cart in its profile, the default behaviour of PrestaShop is to reload its most recent non ordered Cart. That behaviour can be adjusted in `Configure -> Shop parameters -> Customer settings`, the related setting is `PS_CART_FOLLOWING` : `Re-display cart at login`. 
This setting is implemented in: [Context.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/Context.php#L365).
{{% /notice %}}

<div class='mermaid'>
flowchart LR
   A(Guest with empty Cart)-->|Add item to Cart|B{{Cart creation}}-->C(Cart)-->|Login|D{{Associate Cart to Customer}}-->F
   A-->|Login|G{PS_CART_FOLLOWING<br>and<br>has non ordered Cart}-->|No|E{{Cart will be created later when a product is added}}
   G-->|Yes|F(Cart: Associated to Customer)
</div>

{{% notice note %}}
In Front Office, browser cookies are used to determine if current guest has a Cart. This way guest can still see his previous Cart
if he is visiting the Shop from the same browser in a short period of time (the time depends on cookie settings, which
can be adjusted in Back Office `Configure -> Administration -> General "lifetime of front office cookies"`).
{{% /notice %}}

### Cart in Back Office

When creating an Order in the Back Office, a new empty Cart is created once the Customer is selected. You can also choose an existing Cart (already associated with the Customer) or an existing Order on which the new Cart will base.

<div class='mermaid'>
flowchart LR
   A{{Select Customer}}-->|Create new Cart|E{{Cart: creation}}-->G
   A-->|Use existing Cart|B{{Select existing Cart}}-->F
   A-->|Create new Cart from Order|C{{Select existing Order}}-->D{{Cart: creation from Order content}}-->G{{Associate Cart to Customer}}-->F(Cart: associated to Customer)
</div>

## The Checkout: from Cart to Order

For a Cart to convert to an Order, the following steps need to be completed:

<div class='mermaid' style="text-align: center">
flowchart TB
   A(Cart)-->|checkout-personal-information-step|B(Cart: associated to Customer)
   B-->|checkout-addresses-step|C(Cart: address added)
   C-->|checkout-delivery-step|D(Cart: shipping method selected)
   D-->|checkout-payment-step|E(Cart: payment method selected)
   E-->|Submit Order|F(Order)
</div>

{{% notice note %}}
Please note that if a Cart contains only Virtual Products, there is no `checkout-addresses-step` and `checkout-delivery-step`. It goes directly from `checkout-personal-information-step` to `checkout-payment-step`.
{{% /notice %}}

1. **Associate to Customer** (checkout-personal-information-step): details like name, email, birthday, etc. In Front Office you can either fill 
   this information manually as a guest (and optionally create a new Customer account) or log in as an existing Customer. 
   If you create an Order from Back Office, you will be asked to select an existing Customer before modifying the existing Cart or creating a new one.
2. **Select shipping and invoice addresses** (checkout-addresses-step): provide the shipping and invoice addresses information. 
   The shipping (a.k.a. delivery) address is where the Ordered Products should be sent, while the invoice address is used as a document billing address.
   In Front Office, you can provide one address to be used as both - shipping and invoice. In Back Office, you must select shipping and invoice addresses 
   (the same address can also be selected for both - shipping and invoices). 
3. **Select a shipping method** (checkout-delivery-step): after this step is complete, you will need to select one of the available Carriers
   (Carriers are searched by delivery address, sometimes the total weight of the Products, their prices, and information about the Customer (a group to which the Customer belongs) and can be modified by Shop Employees on Improve -> Shipping -> Carriers page). 
   Note that the Carrier will not be available if a selected country or zone is disabled (in Back Office International -> Locations) or Carrier shipping and locations settings are not configured.
3. **Select payment method** (checkout-payment-step): choose how to pay for the Order. Shop Employees can configure payment methods in 
   Back Office `Payment -> Payment methods`.
   All payments are handled by payment modules. PrestaShop comes with 3 [payment modules]({{< relref "/8/modules/payment" >}}) by default:

    * ps_checkpayment - allows check payments.
    * ps_wirepayment - allows wire payments (bank transfers).
    * ps_cashondelivery - allows for cash on delivery payments.

   {{% notice note %}}
You can restrict the availability of the payment methods in Front Office by currencies, countries, and groups and map them to Carriers (ship2pay). You can do that in Back Office `Improve -> Payment -> Preferences`.
   {{% /notice %}}

4. **Submit Order**: Once the Order is submitted, a unique Order reference is generated, and certain records from a Cart and related
   entities are added into following database tables:
    * `Orders`
    * `Order_history`
    * `Order_detail`
    * `Order_carrier`
    * `Order_cart_rule` (if any discounts were applied)
    * `Order_detail_tax` (if any taxes are applied)

{{% notice note %}}
At this step, some important data is duplicated (in `Order_detail`) to ensure Product data will remain available in the Order even if the Product is deleted or modified afterward. Information about the prices is also duplicated to ensure the Order amount will remain immutable.
{{% /notice %}}

5. After Order is successfully created, an email with the Order information is sent to the Customer.

{{% notice note %}}
Email sending settings can be found in Back Office `Configure -> Advanced parameters -> E-mail`. Email translations and templates
in `Improve -> International -> Translations`.

When Order is being created in Back Office, email with the link to a prefilled Cart can be sent before creating the Order (so the
Customer can finish up the checkout process). To do that
click `More actions -> Send pre-filled Order to the Customer by email` in summary block.
{{% /notice %}}

{{% notice note %}}
**Dive more in PrestaShop's Checkout process:** 
Learn how it works under the hood by looking at:
- [classes/checkout/CheckoutSession.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/checkout/CheckoutSession.php)
- [classes/checkout/CheckoutProcess.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/checkout/CheckoutProcess.php)
- [classes/checkout/CheckoutStepInterface.php](https://github.com/PrestaShop/PrestaShop/blob/8.0.x/classes/checkout/CheckoutStepInterface.php)

{{% /notice %}}


## Order status

When creating Order from the Front Office, the initial Order status will differ depending on selected payment method. For example,
if "Payment by check" is selected, then Order will be created with the "Awaiting check payment" status, or if "Bank
transfer" is selected, the status will be "Awaiting wire payment".

Order status changing cycle depends on payment module. Some modules (like the default ones provided above) will require
Shop admin to control the Order status manually, which can be done in Back Office `Sell -> Orders -> Orders`. Other more
complicated payment modules, which integrates online payments in checkout process, will control the Order status
automatically (e.g. when payment is done, the Order status automatically changes to "Payment accepted").

Order statuses can be configured in Back Office `Shop parameters -> Order settings -> Statuses`.

{{% notice note %}}

When creating Order from the Back Office, the initial Order status must be selected manually.

{{% /notice %}}