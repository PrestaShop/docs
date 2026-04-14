---
title: Browser compatibility
weight: 2
---

# Browser compatibility

PrestaShop 9 themes target **evergreen browsers**, browsers that update automatically and stay current. This means modern versions, not a specific pinned release. The minimum floor is set by [Bootstrap 5.3](https://getbootstrap.com/docs/5.3/getting-started/browsers-devices/), which the entire theme stack is built on.

{{% notice warning %}}
Internet Explorer and other legacy browsers are **not supported**. This is consistent with the [Bootstrap 5.3 browser support policy](https://getbootstrap.com/docs/5.3/getting-started/browsers-devices/) and will not change.
{{% /notice %}}

## Web Platform Baseline

[Web Platform Baseline](https://web.dev/baseline/) is a signal created by browser vendors (Google, Mozilla, Apple, Microsoft) that tells you when a web feature is safe to use across all major browsers. PrestaShop 9 themes use it as the reference for deciding whether a CSS or JavaScript feature can be used without fallbacks.

Baseline divides features into three tiers:

| Tier | Definition | Usage |
|------|------------|-------|
| **Widely Available** | Supported in all major browsers for 30+ months | Use freely, no fallback needed |
| **Newly Available** | Just reached cross-browser support | Use with care, consider your audience's browser update frequency |
| **Limited availability** | Not yet supported in all major browsers | Avoid, or use only with a `@supports` fallback |

You can check any feature's Baseline status on [MDN](https://developer.mozilla.org/) (shown in the browser compatibility table) or [caniuse.com](https://caniuse.com/).

## Progressive enhancement

For features that are Newly Available or where you want to gracefully degrade, use `@supports`:

```css
/* Base layout — works everywhere */
.product-list {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
}

/* Container queries — Newly Available, @supports guards older browsers */
@supports (container-type: inline-size) {
  .product-list {
    container-type: inline-size;
  }

  @container (max-width: 400px) {
    .product-card {
      flex-direction: column;
    }
  }
}
```

## Testing

Test your theme in modern versions of all supported browsers before release:

- **Desktop:** Chrome, Firefox, Safari, Edge
- **Mobile:** Safari on iOS, Chrome on Android
- **Tools:** Browser DevTools device emulation for quick checks; [BrowserStack](https://www.browserstack.com/) or [Playwright](https://playwright.dev/) for systematic cross-browser testing
