# PrestaShop Developer Docs — Claude Context

## Project

Hugo static site. Source is Markdown with YAML front matter. Built with the [Hugo Relearn theme](https://mcshelby.github.io/hugo-theme-relearn/). Deployed at https://devdocs.prestashop-project.org/.

Each major PrestaShop version has its own branch (`8.x`, `9.x`, …). This file lives on the `9.x` branch — all content paths are prefixed with `/9/`. If you are working on another branch, update the version prefix accordingly.

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
{{% notice note %}}        → Supplementary information
{{% notice info %}}        → Important contextual information
{{% notice tip %}}         → Best practice or recommendation
{{% notice warning %}}     → Breaking change, deprecation, common pitfall
{{% children /%}}          → Auto-list child pages (section landing pages)
{{< relref "/9/..." >}}    → Internal cross-reference — always use relref, never raw paths
{{< minver v="9.1" >}}     → Minimum version badge
```

### Images

Stored in `img/` relative to the section. From a depth-1 page (e.g. `themes/concepts/page.md`) the path is `../../img/filename.png`. From depth-2 (e.g. `themes/concepts/templates/page.md`) it is `../../../img/filename.png`.

### Internal links

Always use `{{< relref "/9/section/page" >}}`. Never use relative paths.

## Redirects

When a page is moved or renamed, add an `aliases` key to the **new page's** front matter. Hugo generates a redirect HTML file at the old path automatically.

```yaml
aliases:
  - /9/section/old/path/to/page
```

Multiple aliases are supported as a list. Use the full path from root including `/9/`.

**Do not remove aliases once added** — external sites and search engines may link to old URLs.

## Writing Style & Typography

- Present tense, active voice, second person ("you").
- "must" for requirements, "should" for recommendations, "can" for options.
- No emojis. No marketing language. No merchant-facing guidance.
- Lead with the most important information (inverted pyramid).
- One concept per page when possible.
- Audience: theme developers and module developers. Not merchants.
- No em dashes (`—`). Use `:` to introduce an explanation or list, `,` for a mid-sentence aside, and `.` to start a new sentence. Exception: table cells used as empty-value placeholders.

## No Duplicate Content

Each concept must live in exactly one place. If two pages need to cover the same information, the second page links to the first — it does not repeat the content.

- Do not copy explanations, code examples, or configuration tables across pages
- Do not summarize a page's content on another page — link to it instead
- If you find duplicated content during an edit, remove it from the less authoritative page and add a link
