---
title: Validation
weight: 10
aliases:
  - /9/themes/distribution/testing
---

# Validation

## What makes a theme valid

When you select a theme in the Back Office, PrestaShop validates it before activation. A theme that does not pass validation cannot be installed.

A theme is valid if it contains the required files and a complete `config/theme.yml`.

For child themes, each required file is checked in the child theme directory first, then in the parent theme directory. A file only triggers a validation error if it is missing from both.

### Required files

| File |
|------|
| `preview.png` |
| `config/theme.yml` |
| `assets/css/theme.css` |
| `assets/js/theme.js` |
| `templates/index.tpl` |
| `templates/contact.tpl` |
| `templates/_partials/form-fields.tpl` |
| `templates/catalog/product.tpl` |
| `templates/catalog/listing/product-list.tpl` |
| `templates/checkout/cart.tpl` |
| `templates/checkout/cart-empty.tpl` |
| `templates/checkout/checkout.tpl` |
| `templates/checkout/order-confirmation.tpl` |
| `templates/cms/category.tpl` |
| `templates/cms/page.tpl` |
| `templates/cms/sitemap.tpl` |
| `templates/cms/stores.tpl` |
| `templates/customer/address.tpl` |
| `templates/customer/addresses.tpl` |
| `templates/customer/authentication.tpl` |
| `templates/customer/guest-login.tpl` |
| `templates/customer/guest-tracking.tpl` |
| `templates/customer/history.tpl` |
| `templates/customer/identity.tpl` |
| `templates/customer/my-account.tpl` |
| `templates/customer/order-detail.tpl` |
| `templates/customer/order-follow.tpl` |
| `templates/customer/order-return.tpl` |
| `templates/customer/order-slip.tpl` |
| `templates/customer/registration.tpl` |
| `templates/errors/404.tpl` |
| `templates/errors/forbidden.tpl` |

### Required configuration keys

The following keys must be present in `config/theme.yml`. Dots represent YAML nesting. See [Theme structure]({{< relref "/9/themes/concepts/theme-structure" >}}) for the full reference or [Creating a theme from scratch]({{< relref "/9/themes/create-a-theme/from-scratch" >}}) for a minimal working example.

| Key |
|-----|
| `name` |
| `display_name` |
| `version` |
| `author.name` |
| `meta.compatibility.from` |
| `meta.available_layouts` |
| `global_settings.image_types.cart_default` |
| `global_settings.image_types.small_default` |
| `global_settings.image_types.medium_default` |
| `global_settings.image_types.large_default` |
| `global_settings.image_types.home_default` |
| `global_settings.image_types.category_default` |
| `theme_settings.default_layout` |
