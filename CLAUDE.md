# PrestaShop Developer Docs — Claude Context

## Project

Hugo static site. Source is Markdown with YAML front matter. Built with the [Hugo Relearn theme](https://mcshelby.github.io/hugo-theme-relearn/). Deployed at https://devdocs.prestashop-project.org/. The versioned path for current work is `/9/`.

## Hugo Conventions

### Front matter (required on every page)

```yaml
---
title: Page Title         # Required. Displayed as heading and in nav.
menuTitle: Short Title    # Optional. Shorter title for the sidebar.
weight: 10                # Required. Controls ordering (lower = higher).
chapter: true             # Optional. Section landing pages only.
showOnHomepage: true      # Optional. Shows on the docs home page.
useMermaid: true          # Optional. Only when page uses Mermaid diagrams.
aliases:                  # Optional. Hugo redirect aliases (see Redirects below).
  - /9/old/path
---
```

### Shortcodes

```
{{% notice note %}}    → Supplementary information
{{% notice info %}}    → Important contextual information
{{% notice tip %}}     → Best practice or recommendation
{{% notice warning %}} → Breaking change, deprecation, common pitfall
{{% children /%}}      → Auto-list child pages (section landing pages)
{{< relref "/9/..." >}}    → Internal cross-reference — always use relref, never raw paths
{{< minver v="9.1" >}}     → Minimum version badge
```

### Images

Stored in `img/` relative to the section. From a depth-1 page (e.g. `themes/concepts/page.md`) the path is `../../img/filename.png`. From depth-2 (e.g. `themes/concepts/templates/page.md`) it is `../../../img/filename.png`.

### Internal links

Always use `{{< relref "/9/themes/section/page" >}}`. Never use relative paths.

## Redirects

When a page is moved or renamed, add an `aliases` key to the **new page's** front matter. Hugo generates a redirect HTML file at the old path automatically.

```yaml
aliases:
  - /9/themes/old/path/to/page
```

Multiple aliases are supported as a list. Use the full path from root including `/9/`.

**Do not remove aliases once added** — external sites and search engines may link to old URLs.

## Themes Section

The themes section (`themes/`) was fully refactored on branch `feat/themes-refactor`. It is Hummingbird-first — Classic theme is deprecated for new development in PrestaShop 9.1+. All examples and architecture descriptions target Hummingbird v2.

### Section map

| Directory | Purpose |
|-----------|---------|
| `getting-started/` | Fast path: requirements, quick start, environment setup |
| `concepts/` | Generic PrestaShop theme system mechanics (any theme) |
| `hummingbird/` | Reference theme implementation (self-contained) |
| `create-a-theme/` | Step-by-step how-to guides |
| `guidelines/` | Universal rules: coding standards, browser compat, accessibility |
| `reference/` | Pure lookup tables: template variables, JS events, Smarty helpers |
| `distribution/` | Validation and export |

### Key architectural decisions

- **Hummingbird** is the default theme for PrestaShop 9.1+. Classic is deprecated.
- **No jQuery** in theme code. jQuery is loaded by `core.js` for module backward compatibility only.
- **BEM** naming convention for CSS. RSCSS is gone.
- **Bootstrap 5.3** (not Bootstrap 4).
- **`data-ps-*` attributes** for JavaScript DOM hooks (replacing `.js-` prefixed classes).
- **Web Platform Baseline** replaces fixed browser version lists.
- **Accessibility (EAA / WCAG 2.2 AA)** is a first-class requirement.
- **Smarty 4** template engine.
- No PHP coding standards in theme docs — those belong in core contribution docs.
- Do not reference Classic directory structure, `_dev/`, Bourbon, RSCSS, or PS 1.6/1.7 patterns.

### concepts/ vs hummingbird/

- `concepts/` = mechanics that apply to **any** PrestaShop theme
- `hummingbird/` = Hummingbird-specific implementation details
- Cross-reference between the two with "For Hummingbird specifics, see..." / "For how the API works, see..."

## Pages Moved in the Themes Refactor

The following old URLs now redirect to new locations via Hugo `aliases`. If you add new pages or move existing ones, follow the same pattern.

| Old path | New path |
|----------|----------|
| `/9/themes/getting-started/setting-up-your-local-environment` | `/9/themes/getting-started/environment-setup` |
| `/9/themes/getting-started/tools-for-theme-designers` | `/9/themes/getting-started/requirements` |
| `/9/themes/getting-started/theme-organization` | `/9/themes/concepts/theme-structure` |
| `/9/themes/getting-started/theme-yml` | `/9/themes/concepts/theme-structure` |
| `/9/themes/getting-started/asset-management` | `/9/themes/concepts/asset-management` |
| `/9/themes/getting-started/asset-management/webpack` | `/9/themes/concepts/asset-management` |
| `/9/themes/getting-started/guidelines` | `/9/themes/guidelines` |
| `/9/themes/concepts/templates-and-layouts` | `/9/themes/concepts/templates/templates-and-layouts` |
| `/9/themes/reference/bootstrap-compatibility` | `/9/themes/hummingbird/bootstrap-compatibility` |
| `/9/themes/reference/hooks` | `/9/themes/hummingbird/hooks` |
| `/9/themes/reference/javascript-events` | `/9/themes/reference/javascript-events` |
| `/9/themes/reference/overriding-modules` | `/9/themes/concepts/overrides` |
| `/9/themes/reference/overriding-selectors` | `/9/themes/concepts/overrides` |
| `/9/themes/reference/rtl` | `/9/themes/concepts/rtl` |
| `/9/themes/reference/template-inheritance` | `/9/themes/concepts/templates/template-inheritance` |
| `/9/themes/reference/template-inheritance/parent-child-feature` | `/9/themes/create-a-theme/child-theme` |
| `/9/themes/reference/templates` | `/9/themes/concepts/templates` |
| `/9/themes/reference/templates/head` | `/9/themes/concepts/templates/head` |
| `/9/themes/reference/templates/listing` | `/9/themes/concepts/templates/listing-pages` |
| `/9/themes/reference/templates/notifications` | `/9/themes/concepts/templates/notifications` |
| `/9/themes/reference/templates/templates-layouts` | `/9/themes/concepts/templates/templates-and-layouts` |
| `/9/themes/reference/templates/variables` | `/9/themes/reference/template-variables` |
| `/9/themes/reference/theme-translation` | `/9/themes/concepts/translation` |
| `/9/themes/distribution/testing` | `/9/themes/distribution/validation` |

## Writing Style

- Present tense, active voice, second person ("you").
- "must" for requirements, "should" for recommendations, "can" for options.
- No emojis. No marketing language. No merchant-facing guidance.
- Lead with the most important information (inverted pyramid).
- One concept per page when possible.
- Do not duplicate content across pages — link instead.
- Audience: theme developers and module developers. Not merchants.
