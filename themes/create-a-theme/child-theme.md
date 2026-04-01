---
title: Creating a child theme
menuTitle: Child theme
weight: 3
aliases:
  - /9/themes/reference/template-inheritance/parent-child-feature
---

# Creating a child theme

A child theme inherits all templates, styles, and assets from a parent theme. You only override what you need to change, keeping the ability to update the parent independently.

{{% notice note %}}
For deep markup changes, [start from Hummingbird]({{< relref "/9/themes/create-a-theme/from-hummingbird" >}}) directly instead.
{{% /notice %}}

**Prerequisite:** The parent theme must be present in your PrestaShop `/themes/` directory before the child theme can be activated. Install the parent first.

## Scaffold the directory

A child theme requires only two files. Run the following from your PrestaShop `/themes/` directory:

```bash
cd /path/to/prestashop/themes

mkdir -p my-child-theme/config

touch my-child-theme/config/theme.yml \
      my-child-theme/preview.png
```

This gives you the minimum structure PrestaShop requires:

```
my-child-theme/
├── config/
│   └── theme.yml
└── preview.png
```

`preview.png` is displayed in the Back Office theme selector. Use a 500×746 PNG screenshot of your theme.

## Minimal theme.yml

```yaml
parent: my-parent-theme-name
name: my-child-theme          # Must match the directory name
display_name: My Child Theme
version: 1.0.0

assets:
  use_parent_assets: true     # Load the parent's registered CSS and JS in addition to your own
```

When `use_parent_assets` is `true`, the parent's CSS and JS files are loaded first, then any assets registered by your child theme are appended. Set it to `false` if you want to take full control of assets and provide your own stylesheet from scratch. See [Theme structure]({{< relref "/9/themes/concepts/theme-structure#parentchild-settings" >}}) for the full reference.

## Overriding CSS

To add or override styles, create a stylesheet in your child theme and register it via your theme's asset configuration. With `use_parent_assets: true`, your stylesheet is loaded after the parent's, so any rules you define will take precedence through standard CSS cascade:

```
my-child-theme/
└── assets/
    └── css/
        └── custom.css
```

Register it in `config/theme.yml` under `global_settings`:

```yaml
global_settings:
  assets:
    css:
      custom:
        path: assets/css/custom.css
        media: all
```

See [Asset management]({{< relref "/9/themes/concepts/asset-management" >}}) for the full registration syntax.

## Overriding templates

Without any template files, the child theme renders everything from the parent. See [Template inheritance]({{< relref "/9/themes/concepts/templates/template-inheritance" >}}) for the full reference.

To override a template, create it at the same path in your child theme:

```
my-child-theme/
└── templates/
    └── catalog/
        └── listing/
            └── category.tpl
```

PrestaShop will use your file instead of the parent's. There are two ways to write it:

### Replace a template completely

You take full ownership of the template — but you don't have to start from zero. You can still extend a lower-level base template to keep shared logic and only redefine what you need to change. Here `category.tpl` extends `product-list.tpl` to reuse the shared listing logic while overriding only the header and footer blocks:

```smarty
{extends file='catalog/listing/product-list.tpl'}

{block name='product_list_header'}
  {include file='catalog/_partials/category-header.tpl' listing=$listing category=$category}
{/block}

{block name='product_list_footer'}
  {include file='catalog/_partials/category-footer.tpl' listing=$listing category=$category}
{/block}
```

### Override specific blocks using the `parent:` prefix

If you only need to change one or two blocks within `category.tpl`, extend the parent theme's version of the same template directly using the `parent:` prefix. Without it, `{extends file='catalog/listing/category.tpl'}` would point back to itself and cause an infinite loop:

```smarty
{extends file='parent:catalog/listing/category.tpl'}

{block name='product_list_header'}
  {include file='catalog/_partials/category-header.tpl' listing=$listing category=$category}
{/block}
```

## Activate the theme

**Option A — Upload a zip**

Zip your theme directory and upload it directly in the Back Office under _Design > Theme & Logo > Add new theme_:

```bash
# Run from the /themes/ directory — produces my-child-theme.zip containing the my-child-theme/ folder
cd /path/to/prestashop/themes
zip -r my-child-theme.zip my-child-theme/
```

**Option B — Copy manually**

Copy your theme directory into `/themes/` inside your PrestaShop installation, then go to _Design > Theme & Logo_.

In both cases, select the child theme and click _Use this theme_.
