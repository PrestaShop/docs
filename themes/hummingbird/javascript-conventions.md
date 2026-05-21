---
title: JavaScript conventions
weight: 2
---

# JavaScript conventions

Hummingbird's JavaScript is written in TypeScript, compiled with Webpack, and follows modern patterns: no jQuery in theme code, semantic `data-ps-*` attributes for DOM targeting, and a centralized event system.

## No jQuery

jQuery is loaded by `core.js` for backward compatibility with existing modules. **Theme code must not use jQuery.** Write vanilla JavaScript (or TypeScript) using modern ECMAScript syntax.

## Semantic `data-ps-*` attributes

Hummingbird decouples styling from behavior by introducing semantic `data-ps-*` attributes instead of CSS classes as JavaScript hooks:

```html
<!-- Styling class as JS hook: fragile, breaks on CSS refactors -->
<button class="js-add-to-cart btn">Add to cart</button>

<!-- Semantic behavior attribute: decoupled from styling -->
<button class="btn" data-ps-action="add-to-cart">Add to cart</button>
```

### Available attributes

| Attribute | Purpose | Example |
|-----------|---------|---------|
| `data-ps-ref` | References a DOM element for JS queries | `data-ps-ref="voucher-form"` |
| `data-ps-action` | Marks an element that triggers a user action (click, toggle, submit) | `data-ps-action="toggle-password"` |
| `data-ps-target` | Target area for content updates (inject/refresh HTML) | `data-ps-target="cart-summary"` |
| `data-ps-component` | Identifies a JS component | `data-ps-component="product-gallery"` |
| `data-ps-state` | Tracks element state | `data-ps-state="expanded"` |
| `data-ps-context` | Defines component context | `data-ps-context="checkout"` |
| `data-ps-observe` | Marks an element for MutationObserver | `data-ps-observe="cart-content"` |
| `data-ps-data` | Carries data payloads | `data-ps-data='{"id": 42}'` |

By separating styling from behavior, CSS refactors don't break JavaScript, behavioral intent is readable directly in the markup, and modules know exactly which attributes to target.

{{% notice info %}}
This convention is starting to be introduced in different places across Hummingbird. The codebase currently uses both `data-ps-*` attributes and legacy `.js-` prefixed class selectors. New code should use `data-ps-*`; legacy selectors will be migrated over time. The convention itself is still open for discussion. Feedback and real-world testing are welcome on the [JavaScript conventions discussion](https://github.com/PrestaShop/hummingbird/discussions/934) and in the [detailed specification (PDF)](https://github.com/user-attachments/files/25360286/JavaScript_Framework_for_Themes.pdf).
{{% /notice %}}

## Event system

Cross-component communication uses the `prestashop` global object as an event emitter:

### Emit an event

Use `prestashop.emit()` to trigger an event with optional data:

```js
prestashop.emit('myEvent', { myData: 'value' });
```

### Listen to an event

Use `prestashop.on()` to react to an event. Data is passed directly as the first argument:

```js
prestashop.on('myEvent', (data) => {
  console.log(data.myData);
});
```

### Events map

Hummingbird defines its events as constants accessible via the `Theme` global. Use these constants instead of string literals to avoid typos and benefit from autocompletion:

```js
const { prestashop, Theme: { events } } = window;

prestashop.on(events.updatedProduct, () => {
  // React to product update
});
```

Key constants available in `Theme.events` (subset: see the [JavaScript events reference]({{< relref "/9/themes/reference/javascript-events" >}}) for the full list):

| Constant | Event string | Description |
|----------|-------------|-------------|
| `events.updateCart` | `updateCart` | Cart updated via AJAX |
| `events.updatedCart` | `updatedCart` | Cart DOM fully refreshed |
| `events.updateProduct` | `updateProduct` | Combination changed, before AJAX call |
| `events.updatedProduct` | `updatedProduct` | Product DOM updated after AJAX |
| `events.updateProductList` | `updateProductList` | Product listing DOM reloaded |
| `events.updateFacets` | `updateFacets` | Facet filters reloaded |
| `events.clickQuickview` | `clickQuickview` | Quickview link clicked |
| `events.quickviewOpened` | `quickviewOpened` | Quickview modal opened and ready |
| `events.updatedDeliveryForm` | `updatedDeliveryForm` | Delivery form updated in checkout |
| `events.handleError` | `handleError` | AJAX request failed |

{{% notice info %}}
Note: core `listing.js` emits `clickQuickView` (uppercase `V`), while Hummingbird's constants use `clickQuickview` (lowercase `v`). Always use `Theme.events` constants in Hummingbird code to avoid this discrepancy. For the complete list of events dispatched by `core.js`, see the [JavaScript events reference]({{< relref "/9/themes/reference/javascript-events" >}}).
{{% /notice %}}

### Selectors map

Hummingbird also exports its selectors map via the `Theme` global:

```js
const { Theme: { selectors } } = window;

document.querySelectorAll(selectors.listing.product).forEach((el) => {
  // ...
});
```

This centralizes all DOM selectors in one place, making them easier to override and maintain.

