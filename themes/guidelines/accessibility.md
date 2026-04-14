---
title: Accessibility requirements
menuTitle: Accessibility
weight: 3
---

# Accessibility requirements

Accessibility is a hard requirement for new PrestaShop themes, not an optional enhancement. The [European Accessibility Act (EAA)](https://ec.europa.eu/social/main.jsp?catId=1202) makes digital accessibility legally mandatory for e-commerce in EU member states from June 2025. These guidelines are aligned with [**WCAG 2.2 AA**](https://www.w3.org/TR/WCAG22/), the standard referenced by the EAA, and apply to all new themes and contributions to the ecosystem.

This page covers the key requirements. Each project has its own specifics. Use this as a baseline and adapt as needed.

{{% notice tip %}}
For Hummingbird's concrete implementation (focus management helpers, theme state), see [Hummingbird accessibility]({{< relref "/9/themes/hummingbird/accessibility" >}}).
{{% /notice %}}

## Semantic HTML

Correct HTML semantics are the foundation of accessibility. See [Coding standards]({{< relref "/9/themes/guidelines/coding-standards#html" >}}) for the full HTML rules. Accessibility-specific additions:

- `<h1>`–`<h6>` in order, no skipping levels headings define the document outline for screen reader users
- Provide text alternatives for all non-text content: `alt` on images, captions on video and audio

## ARIA

Use ARIA to fill gaps where semantic HTML alone is not sufficient, but prefer native HTML elements first:

- Accessible names and descriptions: `aria-label`, `aria-describedby`
- State attributes for dynamic content: `aria-expanded`, `aria-controls`, `aria-hidden`, `aria-live`
- `role` only when no native element conveys the right meaning
- Never duplicate information already expressed by the HTML element itself

## Keyboard navigation

All interactive elements must be reachable and operable without a mouse:

- Provide a visible skip link at the top of the page to bypass repeated navigation
- Maintain a logical tab order that matches the visual reading order
- Never remove the focus outline without providing a visible replacement
- Custom widgets (tabs, accordions, dropdowns) must have full keyboard support per [ARIA patterns](https://www.w3.org/WAI/ARIA/apg/)

## Focus management

When content updates without a full page reload, AJAX cart updates, filter results, modal opening and focus must be managed explicitly:

- After opening a modal or overlay: move focus inside it and trap it there; support `Escape` to close and return focus to the trigger
- After an AJAX update: restore focus to the element the user was interacting with, or to a logical fallback in the updated region
- Never let focus get lost or reset to the top of the page unexpectedly

## Forms

- Every form control must have an associated `<label>`, or an ARIA equivalent (`aria-label`, `aria-labelledby`)
- Required fields must be marked both visibly and programmatically (`aria-required="true"` or `required`)

## Screen readers

- Use `aria-live` regions to announce dynamic updates (cart count, filter results, notifications)
- Provide screen-reader-only text when the visible context is insufficient (e.g. "Remove" buttons that need product name context)
- Test with at least one screen reader: VoiceOver (macOS/iOS), NVDA or JAWS (Windows)

## Contrast and visual design

| Requirement | WCAG 2.2 AA threshold |
|-------------|----------------------|
| Normal text (below 18px regular or 14px bold) | 4.5:1 minimum contrast ratio |
| Large text (18px+ regular or 14px+ bold) | 3:1 minimum contrast ratio |

Never rely on color alone to convey information, always pair it with text or a universally recognizable visual element (icon, pattern, label).

Additional requirements:
- Minimum body text size: 14px, prefer `rem`/`em` units
- Touch targets: minimum 24×24px (WCAG 2.2 AA) aim for 32px or above for comfortable usability

## Validation

No single tool catches everything. Use a combination:

| Tool | Type | What it catches |
|------|------|-----------------|
| [Lighthouse](https://developer.chrome.com/docs/lighthouse/) | Automated | ~30% of WCAG issues — good first pass |
| [axe DevTools](https://www.deque.com/axe/devtools/) | Automated | More comprehensive than Lighthouse |
| [Accessibility Insights](https://accessibilityinsights.io/) | Semi-automated | Guided manual checks for full WCAG coverage |
| Keyboard navigation | Manual | Tab order, focus trapping, custom widget behavior |
| Screen reader ([VoiceOver](https://www.apple.com/accessibility/vision/), [NVDA](https://www.nvaccess.org/), [JAWS](https://www.freedomscientific.com/products/software/jaws/)) | Manual | Announcements, live regions, label quality |

## Further reading

- [WCAG 2.2 Quick Reference](https://www.w3.org/WAI/WCAG22/quickref/) — W3C Web Content Accessibility Guidelines
- [ARIA Authoring Practices Guide (APG)](https://www.w3.org/WAI/ARIA/apg/) — W3C patterns and examples for accessible widgets
- [European Accessibility Act — official page](https://ec.europa.eu/social/main.jsp?catId=1202)
