---
title: Asset management
weight: 3
aliases:
  - /9/themes/getting-started/asset-management
  - /9/themes/getting-started/asset-management/webpack
---

# Asset management

This page covers how PrestaShop registers, loads, and unregisters CSS and JavaScript assets in the front office.

## Core assets

PrestaShop automatically loads these files on every front-office page:

| File | ID | Priority | Description |
|------|----|----------|-------------|
| `theme.css` | `theme-main` | 50 | Main theme stylesheet |
| `rtl.css` | `theme-rtl` | 900 | Loaded only for RTL languages |
| `custom.css` | `theme-custom` | 1000 | Empty override file, loaded last |
| `core.js` | `corejs` | 0 | Event system, `prestashop` object, jQuery (for module compat) |
| `theme.js` | `theme-main` | 50 | Main theme JavaScript |
| `custom.js` | `theme-custom` | 1000 | Empty override file, loaded last |

{{% notice tip %}}
`custom.css` and `custom.js` are loaded last (priority 1000). Use them for quick overrides without modifying compiled theme files.
{{% /notice %}}

## Registering assets

PrestaShop's `FrontController` provides `registerStylesheet()` and `registerJavascript()`. Both take three arguments:

1. **ID** — Unique identifier. Registering an asset with an existing ID **replaces** the previous one (same array key). Prefix with your theme/module name to avoid collisions.
2. **Relative path** — From the theme or PrestaShop root:
   - `assets/css/product.css` for theme assets
   - `modules/modulename/css/example.css` for module assets
3. **Options** — Configuration array (see tables below).

### Stylesheet options

| Name | Values | Description |
|------|--------|-------------|
| media | `all` \| `screen` \| `print` \| … (default: `all`) | CSS media type |
| priority | 0–999 (default: 50) | Lower number = loaded earlier in the HTML. Equal priorities keep registration order |
| inline | `true` \| `false` (default: `false`) | Inline in `<style>` tag |
| version | string (default: `null`) | Cache-busting query string |
| needRtl | `true` \| `false` (default: `true`) | Automatically load the RTL variant if available |

### JavaScript options

| Name | Values | Description |
|------|--------|-------------|
| position | `head` \| `bottom` (default: `bottom`) | Load in `<head>` or before `</body>` |
| priority | 0–999 (default: 50) | Lower number = loaded earlier in the HTML |
| inline | `true` \| `false` (default: `false`) | Inline in `<script>` tag |
| attributes | `async` \| `defer` (default: not set) | Loading attribute |
| server | `local` \| `remote` (default: `local`) | Local path or remote URL |
| version | string (default: `null`) | Cache-busting query string |

## Registering in theme.yml

Register per-page assets under the `assets` key. Page identifiers match the `php_self` property of each controller. Use `server: remote` for CDN or external URLs.

{{% notice note %}}
In `theme.yml`, the loading attribute key is `attribute` (singular), while the PHP API uses `attributes` (plural).
{{% /notice %}}

```yaml
assets:
  css:
    # Page key matches the controller's php_self property
    product:
      - id: product-extra-style
        path: assets/css/product.css
        media: all
        priority: 100
  js:
    # "all" loads the asset on every page
    all:
      - id: external-lib
        path: assets/js/external-lib.js
        priority: 30
        position: bottom
      # Remote asset (CDN, external URL)
      - id: custom-cdn-js
        path: //cdn-url.com/external-lib.js
        priority: 200
        server: remote
    product:
      - id: product-custom-lib
        path: assets/js/product.js
        priority: 200
        attribute: async
```

## Registering in modules

### Using the hook (most common)

Modules without a front controller register assets via the `actionFrontControllerSetMedia` hook:

```php
public function hookActionFrontControllerSetMedia($params)
{
    // On a specific page
    if ('product' === $this->context->controller->php_self) {
        $this->context->controller->registerStylesheet(
            'module-' . $this->name . '-style',
            'modules/' . $this->name . '/css/style.css',
            ['media' => 'all', 'priority' => 200]
        );
    }

    // On every page
    $this->context->controller->registerJavascript(
        'module-' . $this->name . '-js',
        'modules/' . $this->name . '/js/app.js',
        ['position' => 'bottom', 'priority' => 200]
    );
}
```

### Using setMedia() (front controller modules)

Modules that define their own front controller can extend `setMedia()` directly:

```php
public function setMedia()
{
    parent::setMedia();

    $this->registerStylesheet(
        'module-modulename-style',
        'modules/' . $this->module->name . '/css/style.css',
        ['media' => 'all', 'priority' => 200]
    );

    $this->registerJavascript(
        'module-modulename-lib',
        'modules/' . $this->module->name . '/js/lib.js',
        ['priority' => 200, 'attributes' => 'async']
    );
}
```

## Unregistering assets

### In themes

Create an **empty file** at the override path inside your theme. PrestaShop resolves local assets by checking the theme directory first, so it loads the empty file instead of the module's original.

```
themes/mytheme/modules/modulename/views/css/style.css   # Empty file
themes/mytheme/modules/modulename/views/js/file.js      # Empty file
```

{{% notice note %}}
This only works for assets registered with a local relative path. Remote assets or inline scripts cannot be overridden this way — use `unregisterJavascript()` / `unregisterStylesheet()` instead.
{{% /notice %}}

### In modules

Using the hook:

```php
public function hookActionFrontControllerSetMedia($params)
{
    $this->context->controller->unregisterStylesheet('module-example-style');
    $this->context->controller->unregisterJavascript('module-example-js');
}
```

Using `setMedia()` in a front controller module:

```php
public function setMedia()
{
    parent::setMedia();

    $this->unregisterStylesheet('module-example-style');
    $this->unregisterJavascript('module-example-js');
}
```
