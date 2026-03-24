---
title: Twig Extensions
---

# Handling Raw HTML Output in Twig Templates

## Context

In PrestaShop, Twig templates may render HTML content coming from:

* the database
* third-party modules
* user-editable fields (Back Office)

Rendering raw HTML without proper control introduces a **high risk of XSS (Cross-Site Scripting)**.

Twig provides the `|raw` filter to bypass escaping, but uncontrolled usage is unsafe and error-prone.

To improve security while preserving backward compatibility, PrestaShop introduces **explicit and documented usages** for rendering raw HTML.

---

## Available Filters

### `|raw` — Default Twig filter

```twig
{{ content|raw }}
```

* Natively completely disables Twig escaping
* Since PrestaShop 9.1.0, raw is replaced as much as possible by `|raw_purified`

---

### `|raw_purified` — Recommended usage

```twig
{{ content|raw_purified }}
```

* Renders HTML content
* Content is sanitized using **HTMLPurifier**
* Removes scripts, dangerous attributes, and XSS vectors
* Suitable for content:
  * stored in the database
  * editable by users
  * provided by modules

**This is the recommended filter for rendering HTML.**

---


## Usage Rules (TL;DR)

| Situation                   | Filter to use           |
| --------------------------- | ----------------------- |
| Plain text                  | *(no filter)*           |
| User-generated HTML         | `raw_purified`          |
| Module-provided HTML        | `raw_purified`          |
| Fully trusted internal HTML | `raw`                   |

> **When in doubt, always use `raw_purified`.**

---

## Security Considerations

### Why `raw` Is Dangerous

The `raw` filter:

* bypasses the entire Twig escaping pipeline
* allows `<script>`, event handlers (`onload`, `onerror`, etc.)
* is a common source of XSS vulnerabilities in third-party modules

---

## Recommendations for Module Developers

* Use `raw_purified` for any dynamic HTML content
* Explicitly document any usage of `raw`
* Treat all external content as **untrusted by default**

---

## Examples

### Correct

```twig
{{ myVar|raw_purified }}
```

### Exceptional

```twig
{{ trusted_html|raw }}
```
