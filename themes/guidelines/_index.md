---
title: Guidelines
weight: 25
chapter: true
showOnHomepage: true
aliases:
  - /9/themes/getting-started/guidelines
---

# Guidelines

These guidelines define the quality bar for new PrestaShop theme development. They represent the **new standard** introduced with PrestaShop 9 and Hummingbird — existing themes are not required to comply, but new themes and contributions to the ecosystem are expected to follow them.

Accessibility is treated as a first-class requirement, not an afterthought. The [European Accessibility Act (EAA)](https://ec.europa.eu/social/main.jsp?catId=1202) makes digital accessibility legally mandatory for e-commerce in EU member states from June 2025. Hummingbird is built to align with these requirements, and themes distributed on PrestaShop Marketplace are expected to do the same.

| Page | What it covers |
|------|----------------|
| **[Coding standards]({{< relref "/9/themes/guidelines/coding-standards" >}})** | HTML semantics, BEM naming, vanilla JavaScript, `data-ps-*` attributes, file naming, and formatting rules |
| **[Browser compatibility]({{< relref "/9/themes/guidelines/browser-compatibility" >}})** | Evergreen browser targets, Web Platform Baseline, no IE, progressive enhancement with `@supports` |
| **[Accessibility]({{< relref "/9/themes/guidelines/accessibility" >}})** | EAA-aligned requirements (WCAG 2.2 AA) — semantic HTML, ARIA, keyboard navigation, focus management, contrast ratios, and validation tools |

{{% notice tip %}}
Building on Hummingbird? The [coding standards]({{< relref "/9/themes/guidelines/coding-standards" >}}) are the right starting point — they cover the patterns already in use in the codebase.
{{% /notice %}}
