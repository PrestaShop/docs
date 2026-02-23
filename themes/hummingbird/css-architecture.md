---
title: CSS architecture
weight: 1
---

# CSS architecture

Hummingbird's CSS is built on Bootstrap 5.3, organized in modular SCSS with CSS `@layer` for cascade control and [BEM](https://getbem.com/naming/) naming for custom components.

## Bootstrap 5.3

Hummingbird is built on [Bootstrap 5.3](https://getbootstrap.com/docs/5.3/getting-started/introduction/). Use Bootstrap utilities and components when they fit; extend with custom BEM-named components when they don't. Illustrative example:

```html
<!-- Bootstrap utilities: layout, spacing — no custom class needed -->
<div class="d-flex justify-content-between p-3">...</div>

<!-- Custom BEM: theme-specific structure that Bootstrap doesn't cover -->
<div class="product-card product-card--featured">
  <h3 class="product-card__title">...</h3>
</div>
```

## BEM naming convention

All custom CSS classes follow the [BEM (Block Element Modifier)](https://getbem.com/naming/) convention:

```css
/* Block */
.product-card { }

/* Element (double underscore) */
.product-card__title { }
.product-card__image { }
.product-card__price { }

/* Modifier (double hyphen) */
.product-card--featured { }
.product-card--out-of-stock { }
.product-card__title--small { }
```

## SCSS architecture

Source files live in `src/scss/` with a modular structure:

```
src/scss/
├── abstract/               # Shared theme variables and mixins
├── bootstrap/              # Bootstrap customization
│   ├── overrides/
│   │   └── variables/      # Bootstrap variable overrides
│   │       └── components/ # Per-component variable overrides
│   └── components/         # Bootstrap component restyling
├── prestashop/             # PrestaShop-specific styles
│   ├── base/               # Base element styles
│   ├── components/         # Reusable UI components (product cards, buttons, etc.)
│   ├── layout/             # Header, footer, grid structure
│   ├── modules/            # Styles for core modules
│   └── pages/              # Page-specific styles (product, checkout, etc.)
├── vendors/                # Third-party CSS (Bootstrap imports, Material Icons, etc.)
├── theme.scss              # Main entry point
├── rtl.scss                # RTL overrides
└── error.scss              # Error page styles
```

The entry point (`theme.scss`) defines the `@layer` order and imports abstractions, vendors, and PrestaShop styles:

```scss
@layer vendors, bs-base, bs-components, bs-custom-components, ps-base, ps-components, ps-pages, ps-modules, utilities;

@import "abstract";
@import "vendors";
@import "prestashop";
```

### CSS `@layer`

Hummingbird uses [`@layer`](https://developer.mozilla.org/en-US/docs/Web/CSS/@layer) to manage style priority. The layer order defined in `theme.scss` determines cascade precedence:

| Layer | Purpose |
|-------|---------|
| `vendors` | Third-party libraries |
| `bs-base` | Bootstrap base styles |
| `bs-components` | Bootstrap components |
| `bs-custom-components` | Bootstrap component overrides |
| `ps-base` | PrestaShop base element styles |
| `ps-components` | PrestaShop UI components |
| `ps-pages` | Page-specific styles |
| `ps-modules` | Module-specific styles |
| `utilities` | Utility overrides (always win) |

{{% notice warning %}}
The layer order is intentional and carefully designed to separate Bootstrap, PrestaShop, and utility concerns. Do not modify it unless you fully understand the cascade impact. Instead, place your styles in the appropriate existing layer.
{{% /notice %}}

Unlayered CSS (e.g., from modules) retains higher cascade priority by design. This protects backward compatibility and allows gradual adoption of `@layer` across the ecosystem.

For more context on the architecture decisions, see [Hummingbird v2: Architecture, Best Practices, and Contribution Guide](https://build.prestashop-project.org/news/2026/hummingbird-v2-architecture-best-practices-contribution/).

## Adding custom styles

Prefer configuration over overrides — adjust existing variables and use utility classes before writing custom CSS. When custom styles are needed, place them in the appropriate location:

| What | Where |
|------|-------|
| Bootstrap variable overrides | `bootstrap/overrides/variables/` (per-component in `variables/components/`) |
| Bootstrap component customization | `bootstrap/components/` |
| New PrestaShop components | `prestashop/components/` → lands in `ps-components` layer |
| Page-specific styles | `prestashop/pages/` → lands in `ps-pages` layer |
| Shared theme variables and mixins | `abstract/` |
