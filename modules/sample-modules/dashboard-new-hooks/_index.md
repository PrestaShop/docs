---
title: Dashboard page new hooks
weight: 2
---

# Dashboard page new hooks
{{< minver v="9.2.0" title="true" >}}

## Introduction

The Back Office **Dashboard** page is being migrated from a legacy controller to a Symfony controller rendering a Twig layout. The migrated page is gated behind the `dashboard` **feature flag** (beta, disabled by default), available in *Advanced Parameters > New & Experimental Features*.

The migrated page deliberately exposes a **new, dedicated hook family** (`displayAdminDashboard*`), distinct from the legacy dashboard hooks. This is the key integration principle:

{{% notice note %}}
A module knows which architecture it is integrating with **purely from which hook is called**. The migrated (Symfony) page never calls the legacy hooks, and the legacy page never calls the new ones. There is therefore **no version detection to do** on the module side, no `get_class($this->context->controller)` check, and no dependency on Smarty or the legacy `Helper*` classes.
{{% /notice %}}

A complete, minimal example is provided by the [`dashexample`](https://github.com/PrestaShop/example-modules/tree/master/dashexample) module.

## New hooks vs legacy hooks

| New hook (Symfony dashboard) | Type | Parameters | Legacy counterpart |
|---|---|---|---|
| [`displayAdminDashboardZoneOne`]({{< relref "/9/modules/concepts/hooks/list-of-hooks/displayAdminDashboardZoneOne" >}}) | display | `date_from`, `date_to` | `dashboardZoneOne` |
| [`displayAdminDashboardZoneTwo`]({{< relref "/9/modules/concepts/hooks/list-of-hooks/displayAdminDashboardZoneTwo" >}}) | display | `date_from`, `date_to` | `dashboardZoneTwo` |
| [`displayAdminDashboardZoneThree`]({{< relref "/9/modules/concepts/hooks/list-of-hooks/displayAdminDashboardZoneThree" >}}) | display | `date_from`, `date_to` | `dashboardZoneThree` |
| [`displayAdminDashboardTop`]({{< relref "/9/modules/concepts/hooks/list-of-hooks/displayAdminDashboardTop" >}}) | display | `date_from`, `date_to` | `displayDashboardTop` |
| [`displayAdminDashboardToolbar`]({{< relref "/9/modules/concepts/hooks/list-of-hooks/displayAdminDashboardToolbar" >}}) | display | — | `displayDashboardToolbarTopMenu` |

The `date_from` / `date_to` parameters carry the employee's selected stats date range (format `Y-m-d`).

The zone hooks are expected to **return an HTML string**; the core injects it into the corresponding zone. The page makes no assumption about how the module produces that HTML.

## Rendering hook content

On the migrated page you render your content with a **Twig template** and the module's Symfony service container — no Smarty, no `HelperForm`, no `Db::getInstance()`:

```php
public function install(): bool
{
    return parent::install()
        && $this->registerHook([
            'displayAdminDashboardZoneOne',
            'displayAdminDashboardZoneTwo',
            'displayAdminDashboardToolbar',
        ]);
}

public function hookDisplayAdminDashboardZoneOne(array $params): string
{
    return $this->get('twig')->render('@Modules/mymodule/views/templates/admin/zone_one.html.twig', [
        'dateFrom' => $params['date_from'] ?? null,
        'dateTo' => $params['date_to'] ?? null,
    ]);
}
```

### Loading your own assets

Because there is no `actionAdminControllerSetMedia` + controller class-name detection, load your CSS/JS **from your hook output**. The toolbar hook is rendered once at the top of the page, which makes it a good place for this:

```twig
{# views/templates/admin/toolbar.html.twig #}
<link rel="stylesheet" href="{{ moduleUri }}views/css/mymodule.css">
<script src="{{ moduleUri }}views/js/mymodule.js" defer></script>
```

where `moduleUri` is `$this->getPathUri()` passed from the hook.

## Supporting both the legacy and the migrated dashboard

To keep a single module compatible across PrestaShop versions, register on **both** hook families. The core calls only the hook that belongs to the currently displayed page, so the two never collide:

```php
public function install(): bool
{
    return parent::install()
        && $this->registerHook([
            // Migrated (Symfony) dashboard — Twig, no legacy helpers
            'displayAdminDashboardZoneOne',
            'displayAdminDashboardZoneTwo',
            'displayAdminDashboardToolbar',
            // Legacy dashboard — Smarty / HelperForm as before
            'dashboardZoneOne',
            'dashboardZoneTwo',
            'displayDashboardToolbarTopMenu',
        ]);
}

// Called only on the migrated page
public function hookDisplayAdminDashboardZoneOne(array $params): string
{
    return $this->get('twig')->render('@Modules/mymodule/views/templates/admin/zone_one.html.twig', $params);
}

// Called only on the legacy page
public function hookDashboardZoneOne(array $params): string
{
    $this->smarty->assign($params);

    return $this->display(__FILE__, 'views/templates/hook/zone_one.tpl');
}
```

{{% notice tip %}}
While the migration is ongoing, the native dashboard modules (`dashactivity`, `dashtrends`, `dashgoals`, `dashproducts`) are not yet compatible with the migrated page and will not display anything on it until they are migrated. This is why the page is gated behind a beta feature flag.
{{% /notice %}}
