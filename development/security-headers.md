---
title: Security headers
weight: 90
---

# Security headers

Since 9.3, PrestaShop core can send a set of security-related response headers, configured from two
pages under *Advanced Parameters → Security*: a curated
[Content Security Policy](https://developer.mozilla.org/docs/Web/HTTP/CSP) (CSP) on the **Content
Security Policy** page (most of this page), and a set of simpler
[static security headers](#static-security-headers) on the **Security headers** page.

The whole feature is **opt-in**: it is hidden behind the `csp` feature flag (beta). CSP, once enabled,
starts in **report-only** mode. Core can send the CSP header on the storefront and the back office,
collect the violations browsers report, and let the merchant curate an allow-list.

## Surfaces

CSP is managed on two independent **surfaces**, told apart by a `context` value:

| Surface | `context` | Scope |
| --- | --- | --- |
| Storefront | `front` | **Per shop**: each shop has its own settings, allow-list and log. |
| Back office | `admin` | **Global**: one policy for the whole installation (stored under shop id `0`). |

The two never mix: a storefront report is never curated against the back office allow-list, and the
grid shows one surface at a time (`?context=admin` selects the back office).

## Enabling it

1. Turn on the `csp` feature flag in *Advanced Parameters → New & Experimental Features*.
2. Open *Advanced Parameters → Security → Content Security Policy* and switch on **Enable Content
   Security Policy** for the surface you want. It starts in **Report-only mode**.

The configuration values that back the page:

| Key | Default | Scope | Meaning |
| --- | --- | --- | --- |
| `PS_CSP_ENABLED` | `0` | per shop | Send the storefront CSP header. |
| `PS_CSP_REPORT_ONLY` | `1` | per shop | `1` = report without blocking (`Content-Security-Policy-Report-Only`); `0` = enforce (`Content-Security-Policy`). |
| `PS_CSP_RETENTION_DAYS` | `0` | per shop | Days of storefront reports to keep when `prestashop:csp:prune-log` runs (`0` = keep until you clear the log). |
| `PS_CSP_REPORT_URI` | empty | per shop | External reporting endpoint (see below); empty = use the built-in collector. |
| `PS_CSP_ADMIN_ENABLED` | `0` | global | Send the back-office CSP header. |
| `PS_CSP_ADMIN_REPORT_ONLY` | `1` | global | Report-only vs enforce for the back office. |
| `PS_CSP_ADMIN_RETENTION_DAYS` | `0` | global | Retention for back-office reports. |

The storefront keys are read per shop, so a multistore can enable, curate and enforce each shop
independently. The back-office keys are global.

## Report-only vs enforcement

- **Report-only** (default): the browser reports what *would* be blocked but blocks nothing. Use it to
  discover the surface's real footprint without breaking anything.
- **Enforcement**: the browser blocks any source not on the allow-list. Turn it on only once the
  allow-list covers what the page needs.

Reports are collected in **both** modes.

A surface cannot switch to enforcement until its allow-list holds **at least one curated rule**:
reported-but-unreviewed sources do not count, since enforcing on them would block every reported source
at once. While unreviewed reports remain, the page shows how many sources enforcement would block.

## The collected log

Browsers post violation reports to a front-office endpoint reachable via
`Link::getPageLink('cspreport')` (`index.php?controller=cspreport`); a back-office report carries an
extra `context=admin`. The endpoint accepts both the legacy `application/csp-report` body and the
Reporting API `application/reports+json` body, deduplicates each report on
`(shop, context, directive, source, page)`, and answers `204`. It is active only when the feature is
enabled for that surface.

Each surface shows two grids. The **violations** grid lists reported sources not yet on the allow-list,
one row per source per page, with the directive, the blocked source, the page, a short sample of the
offending inline code with its source file and line, a hit counter, and whether the source weakens the
policy. The **allowed sources** grid lists the curated rules. From the violations grid you **Allow** a
source, which promotes it to a rule; the violations grid then hides every page's row for that source
(the rows stay in the log, they are filtered out because the source is now allowed). From the
allowed-sources grid you **Remove** a rule, singly or in bulk. A toolbar action clears the whole log. The back-office page
also lists, read-only, the first-party sources it allows by default (see below).

The inline-code sample is requested with the `'report-sample'` keyword on `script-src` / `style-src`, so
it is present only for inline-code violations. The source file and line come from the browser's report
when it attributes the violation to a script location, so any of these three columns can be empty
depending on the violation.

Browsers report `eval` / `inline` violations with a keyword rather than a URL; core normalizes these to
the matching source expression (`'unsafe-eval'`, `'unsafe-inline'`, `'wasm-unsafe-eval'`) and drops
browser-extension noise (`chrome-extension:` and similar). It also coarsens the granular element/attribute
directives onto their parent — `script-src-elem` and `script-src-attr` become `script-src`,
`style-src-elem` and `style-src-attr` become `style-src` — so a curated rule covers both forms and the
grid groups them together. Expect a high volume of legitimate third-party
reports: analytics and remarketing pixels fire on every page load from many origins.

The log is bounded without discarding real data. A source is kept with up to a handful of example pages;
once that limit is reached, its further pages fold into one "other pages" row, so a single common source
spread over thousands of pages costs only a few rows. A per-surface row cap then limits how many distinct
sources the log holds: at the cap a source already recorded keeps counting, but a brand-new one is refused
until the log is cleared — recording never evicts rows, so a new source is never silently lost under normal
traffic (a full log signals a flood of forged sources). Allowing a source deletes its collected rows, since
they are hidden from the grid once allowed. `bin/console prestashop:csp:prune-log` (schedule it from cron)
deletes reports past each surface's retention and, as a safety net, trims a surface left over the cap by
concurrent inserts (removing its lowest-hit rows). It handles every surface independently (each
storefront shop and the back office), using that surface's own retention, and skips any surface where CSP
is disabled. Allowed sources are never pruned. Two options narrow the run: `--shop=<id>` prunes only that storefront
shop, and `--older-than=<days>` overrides every surface's retention for this run.

{{% notice note %}}
The report endpoint is public and unauthenticated, and its body is attacker-controlled. Core treats every
report as hostile: it accepts `POST` only, caps the request body, validates the directive against a fixed
list and the source against a strict URL or keyword shape, drops any report whose `document-uri` is not on
one of the shop's own hosts, stores every value through parameterized queries, and escapes it on display.
It never reads or trusts the client IP, so rate-limiting an abusive flood belongs at your edge (CDN, WAF),
where the real client IP is known.
{{% /notice %}}

## Reporting to an external endpoint

The **storefront** can send its violation reports to an external CSP monitoring service instead of the
built-in collector. Set `PS_CSP_REPORT_URI` (per shop) to the service's URL: the header then points
`report-to`, `report-uri` and `Reporting-Endpoints` at it rather than at `cspreport`. Only a valid
absolute `http(s)` URL is used; any other value (or an empty one) falls back to the built-in collector.
The URL must not contain `,` or `;`: those are CSP header delimiters and are stripped from the emitted
value, so keep reporting endpoints free of them.

{{% notice warning %}}
The **back office has no external reporting endpoint**: its reports always go to the built-in collector.
A back-office page's URL carries the employee's CSRF token and the secret admin folder, and a browser
posts the whole report (document URL included) directly to whatever endpoint is set — PrestaShop cannot
strip it on the way out. The built-in collector removes the query before storing; a third-party endpoint
would receive live admin tokens. The storefront endpoint is still offered — storefront reports carry the
same full-URL caveat (see the next note), which is the merchant's own call to make for the processor they
choose, whereas back-office URLs carry admin credentials that are never the merchant's to hand out.
{{% /notice %}}

{{% notice warning %}}
A report includes the full address of the page where the violation happened, query string included.
On some storefront pages that is sensitive — a password-reset link carries a reset token, an order
confirmation carries the customer's secure `key` — and it is sent to whatever endpoint is configured.
Only point the endpoint at a processor you trust with that data; the built-in collector strips the query
before storing, an external endpoint receives it as-is.
{{% /notice %}}

{{% notice note %}}
With an external storefront endpoint set, reports no longer reach PrestaShop, so the on-page log stays
empty and there is nothing to curate from. Build the allow-list from the external service's data instead
(or add sources by hand), then enforce.
{{% /notice %}}

## How the policy is built

For each storefront page the policy is assembled **additively** from four sources, in order:

1. a tight **base policy** (`default-src 'self'`, plus `data:` images and fonts, and the
   `base-uri` / `frame-ancestors` / `form-action` / `object-src` hardening directives);
2. the shop's **curated allow-list** (the Allow / Remove actions);
3. the active **theme's declared needs** (`theme.yml`, see below);
4. **module contributions** (the `actionCspPolicyModifier` hook, see below).

Nothing can *remove* a source another contributor added: every contributor can only widen the policy.
Invalid directives or sources coming from a theme or a module are skipped (and logged), never fatal.

The **back-office** policy is built from the base policy, the first-party sources the back office
pre-allows (below), and its own curated allow-list. Themes and the `actionCspPolicyModifier` hook do
**not** apply to it: the back office is a core-owned surface, so a back-office source a module needs is
curated by hand from its report.

On top of the base, the back-office policy pre-allows the first-party resources the back office
itself loads, each on the directive it is fetched on, so you do not have to curate PrestaShop's own
domains: Addons marketplace scripts, images and iframes (`https://*.prestashop.com`,
`https://assets.prestashop3.com`, `https://storage.googleapis.com`), Google Fonts
(`https://fonts.googleapis.com`, `https://fonts.gstatic.com`), employee avatars (`https://*.gravatar.com`),
and the project API the distribution client calls over XHR, on `connect-src`
(`https://*.prestashop-project.org`). The back-office page lists these read-only so you can see what is
allowed by default. Only hosts are pre-allowed: the back office also uses inline scripts and styles, so if
you enforce the back-office policy you still curate `'unsafe-inline'` (and `'unsafe-eval'` where a bundled
script needs it) from the report log. The storefront base does not carry these.

## Extending the storefront policy from a module

Modules widen the **storefront** policy by listening to the **`actionCspPolicyModifier`** hook. The
hook receives the mutable policy object in the `policy` parameter; call `addSource()` on it. There is no
way to remove or replace a source: contributions are additive only.

```php
public function hookActionCspPolicyModifier(array $params): void
{
    /** @var \PrestaShop\PrestaShop\Core\Csp\CspPolicy $policy */
    $policy = $params['policy'];

    // Allow the module's payment iframe and its analytics endpoint.
    $policy->addSource('frame-src', 'https://payments.example.com');
    $policy->addSource('connect-src', 'https://analytics.example.com');
}
```

`addSource(string $directive, string $source)` validates both arguments with the same value objects as
curated rules and silently ignores an unknown directive or an invalid source, so a typo can never put a
malformed token into the emitted header.

Supported directives: `base-uri`, `child-src`, `connect-src`, `default-src`, `font-src`, `form-action`,
`frame-ancestors`, `frame-src`, `img-src`, `manifest-src`, `media-src`, `object-src`, `script-src`,
`script-src-attr`, `script-src-elem`, `style-src`, `style-src-attr`, `style-src-elem`, `worker-src`. A
source is a CSP source expression: a keyword (`'self'`, `'unsafe-inline'`, …), a scheme (`https:`,
`data:`, …), a host (`example.com`, `*.example.com`, `https://cdn.example.com:443`) or a nonce/hash.

{{% notice note %}}
The hook runs on the storefront only; it cannot widen the back-office policy. A merchant can also
disable the hook, and `PS_DISABLE_NON_NATIVE_MODULE` skips third-party listeners. Under
**enforcement**, either one silently drops the sources a module declared, so a module's storefront
features can break if its hook does not run.
{{% /notice %}}

## Declaring a theme's needs (`theme.yml`)

A theme is not a module and cannot register hooks, so a theme declares the sources it needs under
`global_settings.csp` in its `config/theme.yml`, as `directive: [sources]`:

```yaml
# themes/your-theme/config/theme.yml
global_settings:
  csp:
    script-src:
      - "'unsafe-eval'"   # e.g. a bundled library that uses new Function()
    img-src:
      - https://cdn.example.com
```

Core reads this with `Theme::get('global_settings.csp', [])` for the active theme and merges it through
the same additive, validated path as module contributions. Invalid entries are skipped and logged.
Theme contributions apply to the storefront only.

{{% notice warning %}}
**Editing `theme.yml` on a live shop.** Core caches the parsed theme config at
`config/themes/<theme>/shop<id>.json` and reads it in preference to `theme.yml`, so editing `theme.yml`
alone has no effect until that cache is rebuilt. Resetting the theme from *Design → Theme & Logo* rebuilds
it from `theme.yml`, but it also returns the page layouts to the theme's defaults (it unlinks the same
JSON that stores them), so re-apply your layouts afterwards. Do not delete the JSON by hand for the same
reason. Upgrading to 9.3 avoids all this: it backfills the new `csp` entry into the cache **in place**,
leaving your layouts untouched, so a theme whose `theme.yml` gained one in its new version — such as
Classic — takes effect on upgrade with no manual reset.
{{% /notice %}}

{{% notice warning %}}
**Child themes.** A child theme's attributes are merged shallowly with its parent's, so a child whose own
`theme.yml` defines any `global_settings` key replaces the parent's whole `global_settings`, including its
`csp`. If a child of Classic (or of any theme that declares CSP needs) sets `global_settings`, repeat the
parent's `csp` entry in the child's `theme.yml`, or those sources are lost.
{{% /notice %}}

{{% notice note %}}
The bundled **Classic** theme declares `script-src 'unsafe-eval'` this way, because its Bootstrap
`4.0.0-alpha.5` `Util.reflow()` uses `new Function()` on every transition (modals, collapse, carousel,
tooltips). Without it, those components break under enforcement. **Hummingbird** needs no entry.
{{% /notice %}}

## Recovering from a locked-out back office

Enforcing a back-office policy that misses a needed source can break the admin UI, including the Content
Security Policy page itself. Two recovery paths need no working admin session:

- `bin/console prestashop:csp:admin-report-only` forces the back-office CSP back to report-only.
- Defining `_PS_CSP_ADMIN_DISABLE_` (for example in `config/defines_custom.inc.php`) disables the
  back-office CSP outright, with no database access.

The storefront carries no such lockout risk, so it has no equivalent switch.

## Static security headers

The separate *Security headers* page (its own tab, next to *Content Security Policy*) sends a set of
static, non-CSP response headers, all gated behind the same `csp` flag. It is configured per surface,
with a **Storefront** and a **Back office** tab, because the two have different needs. It is reference
configuration with no developer API.

**Storefront** (`PS_SEC_*`, per shop, all off by default — opt-in):

| Header | Default | Key |
| --- | --- | --- |
| `X-Content-Type-Options: nosniff` | off | `PS_SEC_NOSNIFF` |
| `X-Frame-Options` | off (empty) | `PS_SEC_FRAME_OPTIONS` (`SAMEORIGIN` or `DENY`) |
| `Referrer-Policy` | off (empty) | `PS_SEC_REFERRER_POLICY` |
| `Permissions-Policy` | off (empty) | `PS_SEC_PERMISSIONS_POLICY` |
| `Strict-Transport-Security` | off | `PS_SEC_HSTS`, `PS_SEC_HSTS_MAX_AGE`, `PS_SEC_HSTS_SUBDOMAINS`, `PS_SEC_HSTS_PRELOAD` |

**Back office** (`PS_SEC_ADMIN_*`, one global set for the whole installation, **secure defaults**):

| Header | Default | Key |
| --- | --- | --- |
| `X-Content-Type-Options: nosniff` | **on** | `PS_SEC_ADMIN_NOSNIFF` |
| `X-Frame-Options` | **`SAMEORIGIN`** | `PS_SEC_ADMIN_FRAME_OPTIONS` |
| `Referrer-Policy` | **`strict-origin`** | `PS_SEC_ADMIN_REFERRER_POLICY` |
| `Permissions-Policy` | **`camera=(), microphone=(), geolocation=()`** | `PS_SEC_ADMIN_PERMISSIONS_POLICY` |

The back office defaults are hardened out of the box (a back-office URL carries the secret admin folder
and the employee CSRF token, which a loose `Referrer-Policy` would leak in the `Referer` header). There
is no admin `X-Frame-Options: DENY` default because the back office uses its own same-origin frames.

{{% notice note %}}
**HSTS has no back-office variant.** `Strict-Transport-Security` is a per-host directive, so it is
configured once on the **Storefront** tab (`PS_SEC_HSTS*`) and applied to both surfaces.
{{% /notice %}}

{{% notice warning %}}
`Strict-Transport-Security` is sent only over HTTPS, and `includeSubDomains` / `preload` are hard to
undo: enable it only once the whole store (and its subdomains, if included) is HTTPS.
{{% /notice %}}

## Notes

- **Multistore:** the storefront CSP log, allow-list and settings are per shop, and the back-office CSP
  is one global surface across the installation (shop id `0`). The static headers follow the same split:
  the storefront `PS_SEC_*` keys are per shop (each shop applies its own values), and the back-office
  `PS_SEC_ADMIN_*` keys are one global set. HSTS (`PS_SEC_HSTS*`) is shared, read per shop on the
  storefront and at the all-shops scope for the back office.
- **Reporting:** the header emits both the modern Reporting API (`Reporting-Endpoints` +
  `report-to csp-endpoint`) and the legacy `report-uri`, so Chromium, Firefox and Safari all report.
- **Hardening:** nonce-based hardening of inline scripts is a later, separate effort.
