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

PrestaShop looks for overrides in this order:

1. `/themes/THEME_NAME/modules/MODULE_NAME/...`
2. `/modules/MODULE_NAME/...`

{{% notice note %}}
An empty override file tells PrestaShop to load nothing — neither the module's original nor the override. This is useful for removing a module's default styles when you handle them in your theme's compiled CSS.
{{% /notice %}}

### Template includes

Module templates often include sub-templates (partials). How those includes are written determines whether your theme overrides apply to them.

**The problem with relative paths:**

If a module uses a relative path:

```smarty
{include file='./_partials/product-card.tpl'}
```

Smarty resolves this relative to the **original module directory**, not your theme's override directory. Even if you override the main template, the partial still loads from the module — your override of the partial is ignored.

**The solution: `module:` resource prefix:**

```smarty
{include file='module:ps_featuredproducts/views/templates/front/_partials/product-card.tpl'}
```

The `module:` prefix tells PrestaShop to resolve the path through its override chain. It checks your theme's `modules/` directory first, then falls back to the original module path. This means theme overrides work for both the parent template and any included partials.

{{% notice warning %}}
If a module you need to override uses relative includes, you must override **every** included file alongside the main template. Contact the module developer to suggest switching to the `module:` prefix for better theme compatibility.
{{% /notice %}}

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