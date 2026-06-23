---
title: Overrides
weight: 5
aliases:
  - /9/themes/reference/overriding-modules
  - /9/themes/reference/overriding-selectors
---

# Overrides

PrestaShop provides two override mechanisms for themes: **module overrides** (templates and assets) and **selector overrides** (JavaScript targeting).

## Module overrides

Themes can override a module's templates, CSS, and JavaScript by placing files at specific paths in the theme's `modules/` directory.

### How it works

Given a module `ps_featuredproducts` with this structure:

```
modules/ps_featuredproducts/
├── css/
│   └── style.css
├── js/
│   └── app.js
└── views/
    └── templates/
        └── front/
            └── ps_featuredproducts.tpl
```

Override it by mirroring the structure in your theme:

```
themes/mytheme/
└── modules/
    └── ps_featuredproducts/
        ├── css/
        │   └── style.css
        ├── js/
        │   └── app.js
        └── views/
            └── templates/
                └── front/
                    └── ps_featuredproducts.tpl
```

If a file exists in `/themes/THEME_NAME/modules/MODULE_NAME/`, PrestaShop uses it and ignores the module's own file. If no theme override is present, it falls back to `/modules/MODULE_NAME/`.

{{% notice warning %}}
An empty override file tells PrestaShop to render nothing, the module's original file is bypassed and nothing is rendered in its place. Prefer fixing the module directly. Use an empty override only as a last resort when modifying the module is not an option.
{{% /notice %}}

### Template includes

Module templates often include sub-templates (partials). Whether your theme override of a partial is applied depends on how the module references it with a relative path or with the `module:` prefix.

**When a module uses a relative path:**

```smarty
{include file='./_partials/product-card.tpl'}
```

Smarty resolves this relative to the original module directory. Even if you override the main template, the partial still loads from the module, your theme override of that partial is ignored.

**When a module uses the `module:` resource prefix instead:**

```smarty
{include file='module:ps_featuredproducts/views/templates/front/_partials/product-card.tpl'}
```

PrestaShop resolves the path through its override chain, checking your theme's `modules/` directory first before falling back to the module. Theme overrides work for both the main template and its included partials.

{{% notice warning %}}
If a module you need to override uses relative includes, you must override **every** included file alongside the main template. Contact the module developer to suggest switching to the `module:` prefix for better theme compatibility.
{{% /notice %}}

{{% notice tip %}} For a worked example of overriding a module's checkout templates while preserving its required DOM structure and JavaScript selectors, see [One Page Checkout for theme developers]({{< relref "/9/modules/checkout/theme-developers" >}}) ({{< minver v="9.2" >}}). {{% /notice %}}

### Debugging overrides

With Developer Mode enabled (`_PS_MODE_DEV_` set to `true` or activated in **"Advanced Parameters" > "Performance"**), HTML comments show the source path of each rendered template:

```html
<!-- begin /var/www/html/themes/mytheme/modules/ps_featuredproducts/... -->
...
<!-- end /var/www/html/themes/mytheme/modules/ps_featuredproducts/... -->
```

## Selector overrides

PrestaShop's core JavaScript exposes a centralized **selector map** on `prestashop.selectors` for DOM targeting. Themes and modules can override these selectors to use custom markup without breaking core functionality.

### Overriding core selectors

The core emits a `selectorsInit` event after defining `prestashop.selectors`. Listen to it to modify selectors before they are used.

Illustrative example:

```js
prestashop.on('selectorsInit', () => {
  prestashop.selectors.cart.lineProductQuantity = '[data-ps-component="cart-quantity"]';
});
```

If your script loads after `core.js`, you can modify the map directly without listening to the event.