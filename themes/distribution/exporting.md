---
title: Exporting your theme
menuTitle: Exporting
weight: 20
---

# Exporting your theme

## How themes become available

A theme becomes visible in the Back Office as soon as it is placed on disk in the `/themes/` directory with a `config/theme.yml` file. To be selectable as the active theme, it must pass [validation]({{< relref "/9/themes/distribution/validation" >}}).

## Exporting from the Back Office

In _Design > Theme & Logo_, click **Export current theme** in the top right. The ZIP downloads directly in your browser.

![Export current theme](../../img/export-current-theme.png)

## Exporting from the command line

```bash
php bin/console prestashop:theme:export theme_name
```

The command prints the path of the generated ZIP on success.

## What gets exported

Both methods produce a ZIP file containing:

| Content | Source |
|---------|--------|
| All files in the theme directory | `/themes/theme_name/` |
| Module dependencies | Modules listed under `dependencies.modules` in `theme.yml` |
| Theme translations | Files in the theme's `translations/` folder |

See [Theme structure]({{< relref "/9/themes/concepts/theme-structure" >}}) for the `dependencies` and `translations` configuration.

## What to exclude before exporting

The export includes **everything** in the theme directory. Clean up before exporting:

| Exclude | Why |
|---------|-----|
| `node_modules/` | Build dependency, large, not needed at runtime |
| `.git/` | Version control history, not relevant for distribution |
| Source files (e.g. `src/scss/`, `src/js/`) | Only compiled assets in `assets/` are needed at runtime |
| IDE and OS files (`.idea/`, `.vscode/`, `.DS_Store`) | Development artifacts |
| Docker and CI files (`docker/`, `.github/`) | Development infrastructure |
| AI context files (`.claude/`, `.cursor/`, `CLAUDE.md`) | Development tooling, not relevant for distribution |

{{% notice tip %}}
Add a `.gitignore` and keep your working directory clean. The export command packages the directory as-is — there is no built-in exclude mechanism.
{{% /notice %}}

## Preparing for distribution

Before distributing your theme:

1. Compile production-ready assets, for Hummingbird run `npm run build`; adapt to your own build pipeline if using a custom theme
2. Verify the theme passes [validation]({{< relref "/9/themes/distribution/validation" >}})
3. Test activation on a clean PrestaShop installation
4. Ensure `preview.png` is present and up to date. Required dimensions are 500×746px
