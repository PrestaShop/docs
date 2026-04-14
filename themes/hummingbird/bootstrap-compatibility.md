---
title: Bootstrap compatibility
weight: 5
aliases:
  - /9/themes/reference/bootstrap-compatibility
---

# Bootstrap compatibility

## Why this matters

Hummingbird uses [Bootstrap 5.3](https://getbootstrap.com/docs/5.3/getting-started/introduction/), but the PrestaShop module ecosystem was largely built on Bootstrap 4 (Classic theme). Bootstrap 5 introduced breaking changes: renamed classes, namespaced data attributes (`data-bs-*`) and the removal of jQuery as a dependency. Without intervention, modules that rely on BS4 patterns render incorrectly or lose interactive behavior (modals, tooltips, dropdowns) when used with Hummingbird.

## The Bootstrap Compatibility Layer

The [Bootstrap Compatibility Layer](https://www.npmjs.com/package/bootstrap-compatibility-layer) is a standalone library — it is **not part of Hummingbird**. It is a lightweight runtime shim that covers the three main breaking changes between BS4 and BS5: `data-bs-*` attribute namespacing, renamed utility classes (`.ml-*` → `.ms-*`, `.sr-only` → `.visually-hidden`, etc.), and jQuery plugin bridging (`.modal()`, `.tooltip()`, …). Module developers who need it must include it in their own modules.

{{% notice warning %}}
The compatibility layer is a **temporary patch**, not a long-term solution. Migrating your module's markup to Bootstrap 5.3 is always the better approach. It removes a runtime dependency, reduces page weight, and avoids subtle rendering differences. Use the layer only as a stopgap while you plan a proper migration.

New modules targeting PrestaShop 9 must use Bootstrap 5.3 classes and attributes directly.
{{% /notice %}}

{{% notice note %}}
For a full list of changes between Bootstrap 4 and 5, see the [Bootstrap migration guide](https://getbootstrap.com/docs/5.3/migration/).
{{% /notice %}}

For installation and usage instructions, see the [package documentation](https://www.npmjs.com/package/bootstrap-compatibility-layer).

To load the compatibility layer from a module, use the `actionFrontControllerSetMedia` hook:

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

`addCss()` and `addJs()` deduplicate by URL — if multiple modules include the same asset it loads only once.
