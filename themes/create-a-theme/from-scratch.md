---
title: Creating a theme from scratch
menuTitle: From scratch
weight: 1
---

# Creating a theme from scratch

This page walks through creating a minimal, valid PrestaShop 9 theme from scratch — no base theme required.

## Scaffold the directory

Run the following from your PrestaShop `/themes/` directory to create all required files. The commands use bash brace expansion — run them in bash, not sh.

```bash
cd /path/to/prestashop/themes

mkdir -p minimal-theme/{config,assets/{css,js},templates/{_partials,catalog/listing,checkout,cms,customer,errors,layouts}}

touch minimal-theme/config/theme.yml \
      minimal-theme/assets/css/theme.css \
      minimal-theme/assets/js/theme.js \
      minimal-theme/preview.png \
      minimal-theme/templates/_partials/form-fields.tpl \
      minimal-theme/templates/catalog/product.tpl \
      minimal-theme/templates/catalog/listing/product-list.tpl \
      minimal-theme/templates/checkout/{cart,cart-empty,checkout,order-confirmation}.tpl \
      minimal-theme/templates/cms/{category,page,sitemap,stores}.tpl \
      minimal-theme/templates/contact.tpl \
      minimal-theme/templates/customer/{address,addresses,authentication,guest-login,guest-tracking,history,identity,my-account,order-detail,order-follow,order-return,order-slip,registration}.tpl \
      minimal-theme/templates/errors/{404,forbidden}.tpl \
      minimal-theme/templates/layouts/layout-custom.tpl \
      minimal-theme/templates/index.tpl
```

This gives you the minimum structure PrestaShop requires:

```
minimal-theme/
├── config/
│   └── theme.yml
├── assets/
│   ├── css/
│   │   └── theme.css
│   └── js/
│       └── theme.js
├── templates/
│   ├── _partials/
│   │   └── form-fields.tpl
│   ├── catalog/
│   │   ├── product.tpl
│   │   └── listing/
│   │       └── product-list.tpl
│   ├── checkout/
│   │   ├── cart-empty.tpl
│   │   ├── cart.tpl
│   │   ├── checkout.tpl
│   │   └── order-confirmation.tpl
│   ├── cms/
│   │   ├── category.tpl
│   │   ├── page.tpl
│   │   ├── sitemap.tpl
│   │   └── stores.tpl
│   ├── customer/
│   │   ├── address.tpl
│   │   ├── addresses.tpl
│   │   ├── authentication.tpl
│   │   ├── guest-login.tpl
│   │   ├── guest-tracking.tpl
│   │   ├── history.tpl
│   │   ├── identity.tpl
│   │   ├── my-account.tpl
│   │   ├── order-detail.tpl
│   │   ├── order-follow.tpl
│   │   ├── order-return.tpl
│   │   ├── order-slip.tpl
│   │   └── registration.tpl
│   ├── errors/
│   │   ├── 404.tpl
│   │   └── forbidden.tpl
│   ├── layouts/
│   │   └── layout-custom.tpl
│   ├── contact.tpl
│   └── index.tpl
└── preview.png
```

{{% notice note %}}
Template files can be empty, but they must exist for PrestaShop to consider the theme valid.
{{% /notice %}}

`preview.png` is displayed in the Back Office theme selector. Use a 500×746 PNG screenshot of your theme.

{{% notice warning %}}
`touch` creates an empty file. An empty `preview.png` will break the theme thumbnail in the Back Office. Replace it with a real PNG before sharing or distributing the theme. The theme will still activate with an empty file, but the selector will show a broken image.
{{% /notice %}}

## Minimal theme.yml

```yaml
name: minimal-theme          # Must match the directory name
display_name: Minimal Theme
version: 1.0.0
author:
  name: "Your Name"

meta:
  compatibility:
    from: 9.0.0
    to: ~9.0          # Supports all 9.x patch releases; increment minor when testing a new minor version

  available_layouts:
    layout-custom:
      name: Custom Layout
      description: Your custom layout.

global_settings:
  # Image types are registered when the theme is activated and replace any existing ones in the shop.
  # Each entry defines an image preset: its pixel dimensions and which entity types (scope) it applies to.
  # Declare every preset your templates reference — missing types will cause broken images.
  image_types:
    cart_default:
      width: 125
      height: 125
      scope: [products]
    small_default:
      width: 98
      height: 98
      scope: [products, categories, manufacturers, suppliers]
    medium_default:
      width: 452
      height: 452
      scope: [products, manufacturers, suppliers]
    large_default:
      width: 800
      height: 800
      scope: [products, manufacturers, suppliers]
    home_default:
      width: 250
      height: 250
      scope: [products]
    category_default:
      width: 180
      height: 180
      scope: [categories]

theme_settings:
  # default_layout must match a key under available_layouts above.
  # It maps to templates/layouts/layout-<key>.tpl and is used as the page wrapper when no layout is specified.
  default_layout: layout-custom
```

## Activate the theme

**Option A — Upload a zip**

Zip your theme directory and upload it directly in the Back Office under _Design > Theme & Logo > Add new theme_:

```bash
# Run from the /themes/ directory — produces minimal-theme.zip containing the minimal-theme/ folder
cd /path/to/prestashop/themes
zip -r minimal-theme.zip minimal-theme/
```

**Option B — Copy manually**

Copy your theme directory into `/themes/` inside your PrestaShop installation, then go to _Design > Theme & Logo_.

In both cases, select your theme and click _Use this theme_.

{{% notice warning %}}
Activating a theme replaces all image types with the ones declared in your `theme.yml`. Make sure your image type configuration is complete before activating.
{{% /notice %}}

Since all template files are empty, every page will render blank. This is expected — you now have a valid skeleton to build on.

From here, read [Templates and layouts]({{< relref "/9/themes/concepts/templates/templates-and-layouts" >}}) to understand how PrestaShop renders pages, and [Asset management]({{< relref "/9/themes/concepts/asset-management" >}}) to learn how to register CSS and JavaScript files.
