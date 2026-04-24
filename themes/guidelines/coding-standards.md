---
title: Coding standards
weight: 1
---

# Coding standards

These standards apply to new themes and contributions targeting PrestaShop 9. They reflect the patterns used in [Hummingbird]({{< relref "/9/themes/hummingbird" >}}) and define what is expected in the ecosystem going forward.

## HTML / Smarty

Use correct, semantic HTML5, the right element for the right purpose:

- Landmark elements for page structure: `<nav>`, `<main>`, `<header>`, `<footer>`, `<section>`, `<article>`, `<aside>`
- `<button>` for actions, `<a>` for navigation
- Self-closing syntax for void elements: `<br>`, `<img>`, `<input>`
- All open tags must be closed within the same template file
- Shared fragments (header, footer, partials) belong in a `_partials/` directory

```smarty
<nav aria-label="{l s='Main navigation' d='Shop.Mytheme'}">
  <ul>
    <li><a href="{$urls.pages.index}">{l s='Home' d='Shop.Theme.Global'}</a></li>
    <li><a href="{$urls.pages.cart}">{l s='Cart' d='Shop.Theme.Global'}</a></li>
  </ul>
</nav>
```

## CSS

### BEM naming convention

All custom CSS classes follow the [BEM](https://getbem.com/naming/) convention, Block, Element, Modifier:

```css
/* Block: standalone component */
.product-card { }

/* Element: part of the block (double underscore) */
.product-card__title { }
.product-card__image { }

/* Modifier: variant of a block or element (double hyphen) */
.product-card--featured { }
.product-card__title--small { }
```

Rules:
- Block names: lowercase with hyphens
- Select by class only: no tag selectors, no IDs
- Never nest BEM selectors (`.product-card .product-card__title` is wrong)

### SCSS

- Write styles in SCSS, compiled to CSS via the build pipeline
- Organize files modularly by component: one partial per component
- Use SCSS variables and mixins for shared values; prefer Bootstrap variables before introducing new ones
- Place new files in the appropriate `src/scss/` subdirectory

{{% notice tip %}}
See [CSS conventions]({{< relref "/9/themes/hummingbird/css-conventions" >}}) for the full `src/scss/` directory structure, `@layer` order, and guidance on where to add custom styles.
{{% /notice %}}

## JavaScript / TypeScript

- Write new theme code in **TypeScript**, compiled to JavaScript via the build pipeline
- Do not use **jQuery** in new theme code. jQuery is loaded by `core.js` for module backward compatibility only and must not be used for new development
- Use modern ECMAScript syntax: `const`/`let`, arrow functions, template literals, `async`/`await`, native `import`/`export`
- Use [`data-ps-*` attributes]({{< relref "/9/themes/hummingbird/javascript-conventions#semantic-data-ps--attributes" >}}) to target DOM elements, not CSS classes
- Use the `prestashop` event system for cross-component communication

{{% notice tip %}}
See [JavaScript conventions]({{< relref "/9/themes/hummingbird/javascript-conventions" >}}) for the full `data-ps-*` attribute reference, the events map, and the selectors map.
{{% /notice %}}

## File naming

| File type | Convention | Example |
|-----------|------------|---------|
| SCSS partials | Underscore prefix, lowercase with hyphens | `_product-card.scss` |
| JavaScript / TypeScript | Lowercase with hyphens | `product-gallery.js` |
| Smarty templates | Lowercase with hyphens | `product-list.tpl` |
| Shared fragments | Placed in a `_partials/` directory | `_partials/header.tpl` |

## Formatting

- **2 spaces** for indentation in all front-end files (HTML, CSS, SCSS, JS, Smarty templates)
- End every file with a newline; no trailing whitespace
- Configure your editor with [EditorConfig](https://editorconfig.org/), Hummingbird ships with an `.editorconfig` file
- When working within Hummingbird or a fork of it, use the bundled linters and formatters: **ESLint**, **Stylelint**, and **Prettier**
