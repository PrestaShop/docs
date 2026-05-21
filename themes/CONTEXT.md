# Themes Section — AI System Context

This file is loaded in addition to the root `CONTEXT.md` when working inside `themes/`.

## Section map

| Directory | Purpose |
|-----------|---------|
| `getting-started/` | Fast path: requirements, quick start, environment setup |
| `concepts/` | Generic PrestaShop theme system mechanics (any theme) |
| `hummingbird/` | Reference theme implementation (self-contained) |
| `create-a-theme/` | Step-by-step how-to guides |
| `guidelines/` | Universal rules: coding standards, browser compat, accessibility |
| `reference/` | Pure lookup tables: template variables, JS events, Smarty helpers |
| `distribution/` | Validation and export |

### concepts/ vs hummingbird/

- `concepts/` = mechanics that apply to **any** PrestaShop theme
- `hummingbird/` = Hummingbird-specific implementation details
- Cross-reference between the two with "For Hummingbird specifics, see..." / "For how the API works, see..."

## Documentation guidelines

### Technology stack

- **Hummingbird** is the reference theme. Always use it as the example implementation.
- **Bootstrap 5.3**, not Bootstrap 4. Never document BS4 patterns as current.
- **BEM** naming convention for CSS classes. Do not mention RSCSS.
- **Smarty 4** template engine. Use `{extends}` / `{block}` inheritance, not `{include}` patterns.
- **No jQuery** in theme code. jQuery is loaded by `core.js` for module backward compatibility only. New theme code must use vanilla JavaScript.
- **`data-ps-*` attributes** for JavaScript DOM hooks, not `.js-` prefixed classes.
- **Web Platform Baseline** as the browser compatibility reference, not fixed version numbers.
- **Accessibility (EAA / WCAG 2.2 AA)** is a hard requirement, not optional.

### What not to document

- Classic theme directory structure or code examples
- `_dev/` folder (Classic-specific build artifact)
- Bourbon, RSCSS, or any deprecated CSS methodology
- jQuery usage patterns for new code
- Fixed browser version lists (e.g. "Chrome 90+")
- PHP coding standards: those belong in core contribution docs
- PrestaShop 1.6 or 1.7 patterns unless explaining a migration path
- Merchant-facing guidance: audience is theme and module developers only

`reference/` pages contain no narrative: pure lookup tables only. All explanatory content belongs in `concepts/` or `hummingbird/`.
