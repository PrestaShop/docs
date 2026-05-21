---
title: Accessibility
weight: 3
---

# Accessibility

Accessibility is a baseline requirement in Hummingbird, not an optional enhancement. It is already mandatory in many countries (for example under the European Accessibility Act) and is increasingly treated as a standard for e‑commerce. The theme is built to comply with EAA-relevant standards. All theme contributions must maintain or improve accessibility compliance.

{{% notice info %}}
See [Accessibility requirements]({{< relref "/9/themes/guidelines/accessibility" >}}) for a detailed checklist that applies to every PrestaShop theme.
{{% /notice %}}

## What the theme implements

The theme puts a strong focus on accessibility. When content is updated dynamically, focus is restored so keyboard and screen reader users keep their place. Dynamic updates are announced to assistive technology via live regions. Interactive elements are keyboard-operable, and overlays support focus trapping and closing via keyboard.

## Accessibility helpers (`a11y.ts`)

Hummingbird provides an `A11yHelpers` class ([`src/js/helpers/a11y.ts`](https://github.com/PrestaShop/hummingbird/blob/develop/src/js/helpers/a11y.ts)) with focus management utilities. Theme scripts use it to save and restore focus across AJAX updates. For example, after a cart refresh or product combination change, focus returns to the control the user was using (quantity input, remove button, voucher field, etc.).

| Method | Returns | Description |
|--------|---------|-------------|
| `storeFocus()` | `void` | Saves the currently focused element (`document.activeElement`) |
| `restoreFocus(fallback?)` | `void` | Restores focus to the stored element: tries by ID first, then by element reference, then an optional fallback. Clears the store afterward |
| `setFocus(element)` | `void` | Focuses a specific element and stores it |
| `getStoredFocus()` | `HTMLElement \| null` | Returns the stored element |
| `getStoredFocusId()` | `string \| null` | Returns the stored element's `id` |
| `clearStoredFocus()` | `void` | Clears all stored focus data |

For example, to save focus before an AJAX update and restore it afterward:

```typescript
import A11yHelpers from '@helpers/a11y';

const a11y = new A11yHelpers();

// Before the AJAX call: save what the user was focused on
a11y.storeFocus();

// After the DOM is updated: return focus to that element
a11y.restoreFocus();
```

## Theme state (`state.ts`)

The accessibility helpers rely on a centralized `ThemeState` singleton ([`src/js/state.ts`](https://github.com/PrestaShop/hummingbird/blob/develop/src/js/state.ts)) that tracks runtime state for the current page. It exposes a simple `get()` / `set()` / `merge()` API. State is in-memory only and does not persist across full page navigations.

Current state keys:

| Key | Type | Purpose |
|-----|------|---------|
| `storedFocusElement` | `HTMLElement \| null` | The element stored by the a11y helpers for focus restoration |
| `storedFocusElementId` | `string \| null` | The `id` of the stored element (used as primary lookup on restore) |
| `lastUpdateAction` | `string \| null` | Tracks the last cart-related action so scripts know *what* triggered an update (e.g. quantity change, product removed, voucher submitted). The set of values is defined in the theme and may grow over time. |

For example, theme scripts use `lastUpdateAction` to decide where to restore focus after a cart AJAX refresh:

```typescript
import { state, availableLastUpdateAction } from '@js/state';

prestashop.on('updatedCart', () => {
  const action = state.get('lastUpdateAction');

  if (action === availableLastUpdateAction.quantityChange) {
    a11y.restoreFocus(); // returns focus to the quantity input
  }
});
```

## Guidelines for contributions

Customizations and contributions must follow web accessibility principles in line with EAA, RGAA, or other applicable accessibility rules. A detailed checklist is available in [Accessibility requirements]({{< relref "/9/themes/guidelines/accessibility" >}}).

## Further reading

- [Web Accessibility (MDN)](https://developer.mozilla.org/en-US/docs/Web/Accessibility): Concepts, ARIA, and guides for building accessible web content
- [ARIA Authoring Practices Guide (APG)](https://www.w3.org/WAI/ARIA/apg/): Accessible patterns and widgets (W3C)

