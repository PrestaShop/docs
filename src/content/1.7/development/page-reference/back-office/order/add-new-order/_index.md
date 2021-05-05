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

This page is very specific compared to other BO pages - **most of the page is based on javascript**.

{{% notice %}}

All the javascript code related to this page can be found at `admin-dev/themes/new-theme/js/pages/order/create.js`.
These `.js` files are the `develop` version prior compiling. See ["How to compile assets"]({{< relref "compile-assets" >}}) for
more information.

{{% /notice %}}

This way the page is very dynamic and more user-friendly, but it is not so easy to extend it.
