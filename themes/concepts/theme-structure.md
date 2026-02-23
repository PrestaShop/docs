---
title: Theme structure
weight: 1
---

# Theme structure

This page covers the directory structure every PrestaShop theme must follow and the full `config/theme.yml` reference.

## Directory structure

A PrestaShop theme is a self-contained set of files in a subdirectory of `/themes/`. Here is the typical directory structure of a theme:

```bash
mytheme/
├── assets/
│   ├── css/
│   │   └── theme.css
│   └── js/
│       └── theme.js
├── config/
│   └── theme.yml
├── modules/            # Module template/asset overrides
├── plugins/            # Custom Smarty plugins
├── templates/
│   ├── _partials/      # Shared fragments (header, footer, etc.)
│   ├── catalog/        # Product & listing pages
│   ├── checkout/       # Cart & checkout flow
│   ├── cms/            # Static content pages
│   ├── customer/       # Account pages
│   ├── errors/         # Error pages
│   └── layouts/        # Page layouts
└── preview.png
```

Most themes also include `assets/img/` for images and `assets/fonts/` for custom fonts. Source directories for pre-compilation (`src/`, `_dev/`, etc.) and build configuration are implementation details of the specific theme.

{{% notice tip %}}
For the Hummingbird directory layout specifically, see [Hummingbird architecture]({{< relref "/9/themes/hummingbird" >}}).
{{% /notice %}}

## Theme configuration (theme.yml)

The `config/theme.yml` file is required for PrestaShop to recognize and configure your theme. It defines identity, compatibility, layouts, hooks, modules, image types, and more.

### Identity

The `name` field must match the theme's directory name exactly.

```yaml
name: mytheme               # Must match the theme's directory name
display_name: My Theme      # Displayed in the Back Office
version: 1.0.0
author:
  name: "Your Name"
  email: "you@example.com"
  url: "https://example.com"
```

### Compatibility and layouts

```yaml
meta:
  compatibility:
    from: 9.1.0                    # Minimum PrestaShop version required
    to: ~9.1.0                     # Maximum tested version
    framework: bootstrap-v5.3.3    # CSS framework used by the theme
  available_layouts:
    layout-full-width:
      name: Full width layout
      description: Ideal for product pages to maximize picture size
    layout-left-side-column:
      name: One small left column
      description: Great for CMS pages to show advertisements on the side
```

{{% notice info %}}
The `to` and `framework` fields are currently not enforced by PrestaShop. They serve as metadata indicating the version range and framework your theme has been tested with.
{{% /notice %}}

Layouts are parsed automatically from `/templates/layouts/`. The `available_layouts` key provides user-friendly names for the Back Office layout selector.

### Parent/child settings

To create a child theme, set the `parent` key:

```yaml
parent: hummingbird          # Name of the parent theme directory
assets:
  use_parent_assets: true    # Inherit parent's compiled assets
```

When `use_parent_assets` is `true`:
- `theme_assets`, `img_url`, `css_url`, `js_url` point to the **parent** theme
- `child_theme_assets`, `child_img_url`, `child_css_url`, `child_js_url` point to the **child** theme

When `false`, all asset variables point to the child theme only.

See [Creating a child theme]({{< relref "/9/themes/create-a-theme/child-theme" >}}) for a complete guide.

### Global settings

#### Configuration

Set PrestaShop configuration values when the theme is activated:

```yaml
global_settings:
  configuration:
    # These values are set in the database when the theme is activated
    PS_QUICK_VIEW: false
    NEW_PRODUCTS_NBR: 4
    PS_PNG_QUALITY: 8
```

#### Modules

Enable, disable, or reset modules on theme activation:

```yaml
global_settings:
  modules:
    to_enable:
      # Enabled when the theme is activated (installed if needed)
      - my-custom-module
    to_disable:
      # Disabled when the theme is activated
      - homeslider
    to_reset:
      # Reset to default settings when the theme is activated
      - blockreassurance
```

#### Hooks

Create custom hooks and attach modules to hooks:

```yaml
global_settings:
  hooks:
    custom_hooks:
      # Register new hooks so modules can attach to them
      - name: displayFooterBefore
        title: displayFooterBefore
        description: Add a widget area above the footer
    modules_to_unhook:
      # Detach modules from hooks on theme activation
      displayFooter:
        - ps_socialfollow
      displaySearch:
        - ps_searchbar
    modules_to_hook:
      # Attach modules to hooks on theme activation
      displayHeaderTop:
        - blocklanguages
        - blockcurrencies
        - blockuserinfo
      displayFooter:
        - blocknewsletter
```

The `~` symbol in a hook list means "keep whatever modules are currently hooked here":

```yaml
modules_to_hook:
  displayHeaderMiddle:
    - ~                    # Keep existing hooked modules
    - blocksearch          # Append this module
  displayHeaderBottom:
    - blocktopmenu         # Prepend these modules
    - blockcart
    - ~                    # Then keep existing hooked modules
```

#### Image types

Themes must declare their image types.

{{% notice warning %}}
Activating a theme **removes all existing image types** and replaces them with the theme's declaration. This is a destructive operation — make sure your image types are complete before activation.
{{% /notice %}}

```yaml
global_settings:
  image_types:
    # Each key defines an image type name used by PrestaShop
    # width/height in pixels, scope = which entities use this type
    cart_default:
      width: 80
      height: 80
      scope: [products]
    small_default:
      width: 125
      height: 125
      scope: [products, categories, manufacturers, suppliers]
    medium_default:
      width: 300
      height: 300
      scope: [products, categories, manufacturers, suppliers]
    large_default:
      width: 500
      height: 500
      scope: [products]
    home_default:
      width: 250
      height: 250
      scope: [products]
    category_default:
      width: 960
      height: 350
      scope: [categories]
```

### Theme settings

Settings that can be changed per-shop through the Back Office:

```yaml
theme_settings:
  # Used when no page-specific layout is set
  default_layout: layout-full-width
  layouts:
    # Specific layout per page
    identity: layout-left-side-column
    order-confirmation: layout-left-side-column
```

When layout assignments are changed through the Back Office via _Design > Theme & Logo > Choose layouts_, they are stored in `settings_n.yml` (where `n` is the shop ID, relevant in multistore setups). The original `theme.yml` stays unchanged.

#### Disable core.js

You can disable `core.js` loading and provide your own implementation:

```yaml
theme_settings:
  core_scripts: false   # Disables core.js loading entirely
```

{{% notice warning %}}
Disabling `core.js` removes the `prestashop` event system and jQuery. Most modules depend on these — only disable if you provide a full replacement.
{{% /notice %}}

### Dependencies

Declare module dependencies to include them in theme exports:

```yaml
dependencies:
  modules:
    # These modules are bundled when exporting the theme as a ZIP
    - xx_customslider
    - xx_customproductpage
```

## Required files for validation

PrestaShop validates a theme before activation. See [Validation]({{< relref "/9/themes/distribution/validation" >}}) for the complete list of required files and configuration keys.

## Core assets

PrestaShop automatically loads a set of CSS and JavaScript files on every page. See [Asset management]({{< relref "/9/themes/concepts/asset-management" >}}) for the full list, their IDs, priorities, and how to register or unregister assets.
