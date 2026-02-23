---
title: Bootstrap compatibility
weight: 5
---

# Bootstrap compatibility

## Why this matters

Hummingbird uses [Bootstrap 5.3](https://getbootstrap.com/docs/5.3/getting-started/introduction/), but the PrestaShop module ecosystem was largely built on Bootstrap 4 (Classic theme). Bootstrap 5 introduced breaking changes — renamed classes, namespaced data attributes (`data-bs-*`), and the removal of jQuery as a dependency. Without intervention, modules that rely on BS4 patterns render incorrectly or lose interactive behavior (modals, tooltips, dropdowns) when used with Hummingbird.

## The Bootstrap Compatibility Layer

The [Bootstrap Compatibility Layer](https://github.com/PrestaShop/bootstrap-compatibility-layer) is a standalone library — it is **not part of Hummingbird**. It is a lightweight runtime shim that maps BS4 data attributes, class names, and jQuery plugin calls to their BS5 equivalents. Module developers who need it must include it in their own modules.

{{% notice warning %}}
The compatibility layer is a **temporary patch**, not a long-term solution. Migrating your module's markup to Bootstrap 5.3 is always the better approach — it removes a runtime dependency, reduces page weight, and avoids subtle rendering differences. Use the layer only as a stopgap while you plan a proper migration.

New modules targeting PrestaShop 9 must use Bootstrap 5.3 classes and attributes directly.
{{% /notice %}}

{{% notice note %}}
For a full list of changes between Bootstrap 4 and 5, see the [Bootstrap migration guide](https://getbootstrap.com/docs/5.3/migration/).
{{% /notice %}}

## What the layer handles

The library covers the three main breaking changes between Bootstrap 4 and 5:

- **Data attributes** — Transforms BS4 attributes (`data-toggle`, `data-dismiss`, …) to their BS5 namespaced equivalents (`data-bs-toggle`, `data-bs-dismiss`, …).
- **Class names** — Maps renamed utility classes (`.ml-*` → `.ms-*`, `.sr-only` → `.visually-hidden`, etc.).
- **jQuery plugins** — Bridges jQuery-based plugin calls (`.modal()`, `.tooltip()`, …) to Bootstrap 5's vanilla JS API.

## Installation

### Package

```bash
npm install bootstrap-compatibility-layer
```

### CDN

```html
<link href="https://unpkg.com/bootstrap-compatibility-layer@1/dist/bootstrap-compatibility-layer.min.css" rel="stylesheet">
<script src="https://unpkg.com/bootstrap-compatibility-layer@1"></script>
```

### From a module hook

To load the compatibility layer from a module, use the `actionFrontControllerSetMedia` hook. Use `addCss()` and `addJs()` — these methods deduplicate by URL, so if multiple modules include the same asset it loads only once.

```php
public function hookActionFrontControllerSetMedia()
{
    $this->context->controller->addCss(
        'https://unpkg.com/bootstrap-compatibility-layer@1/dist/bootstrap-compatibility-layer.min.css'
    );
    $this->context->controller->addJs(
        'https://unpkg.com/bootstrap-compatibility-layer@1'
    );
}
```

## Usage

### As a package

```js
import BSCompatibilityLayer from 'bootstrap-compatibility-layer';
```

The layer initializes automatically on import.

### Via CDN

The library auto-initializes for attribute and class transformations. For jQuery-based Bootstrap calls, wait for DOM ready:

```html
<script src="https://unpkg.com/bootstrap-compatibility-layer@1"></script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    $('[data-toggle="popover"]').popover();
    $('[data-toggle="tooltip"]').tooltip();
  });
</script>
```
