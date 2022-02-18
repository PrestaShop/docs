---
title: Testing
weight: 10
---

# Testing

## What makes a theme valid

When you're trying to select a theme in the backoffice, PrestaShop will test if your theme is valid. It
won't install if the theme isn't valid.

A theme is valid if it contains some files and some configuration keys.

### Required files

Here is the complete list of required files:

* preview.png
* config/theme.yml
* assets/js/theme.js
* assets/css/theme.css
* templates/_partials/form-field.tpl
* templates/catalog/product.tpl
* templates/catalog/listing/product-list.tpl
* templates/checkout/cart.tpl
* templates/checkout/checkout.tpl
* templates/cms/category.tpl
* templates/cms/page.tpl
* templates/customer/address.tpl
* templates/customer/addresses.tpl
* templates/customer/guest-tracking.tpl
* templates/customer/guest-login.tpl
* templates/customer/history.tpl
* templates/customer/identity.tpl
* templates/index.tpl
* templates/customer/my-account.tpl
* templates/checkout/order-confirmation.tpl
* templates/customer/order-detail.tpl
* templates/customer/order-follow.tpl
* templates/customer/order-return.tpl
* templates/customer/order-slip.tpl
* templates/errors/404.tpl
* templates/errors/forbidden.tpl
* templates/checkout/cart-empty.tpl
* templates/cms/sitemap.tpl
* templates/cms/stores.tpl
* templates/customer/authentication.tpl
* templates/customer/registration.tpl
* templates/contact.tpl

### Required configuration keys

Your configuration file `config/theme.yml` ([read more about this file]({{< ref "1.7/themes/getting-started/theme-yml" >}}))
must details some configuration keys.

Here is the list of keys PrestaShop will look for. The dot represent the nesting.

* name
* display_name
* version
* author.name
* meta.compatibility.from
* meta.available_layouts
* global_settings.image_types.cart_default
* global_settings.image_types.small_default
* global_settings.image_types.medium_default
* global_settings.image_types.large_default
* global_settings.image_types.home_default
* global_settings.image_types.category_default
* theme_settings.default_layout

