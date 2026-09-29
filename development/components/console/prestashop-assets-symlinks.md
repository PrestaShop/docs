---
title: prestashop:assets:symlinks
category: Utilities
description: Check and repair public bundle symlinks from the CLI
weight: 33
---

# `prestashop:assets:symlinks`

{{< minver v="9.2" title="true" >}}

## Informations

* Path: `src/PrestaShopBundle/Command/AssetsSymlinksCommand.php`
* Options:
  * `--fix`: Rewrite stale symlinks as relative links pointing into `vendor/` __(optional)__

## Description

Symfony creates symbolic links under `{admin}/bundles/` (and `public/bundles/` when it exists) so that assets shipped by third-party bundles — such as API Platform's Swagger UI or FOSJsRoutingBundle's `router.js` — are served as static files from the admin URL. These links are created by `assets:install` during `composer install` and are **not** refreshed by cache clearing.

When the installation directory is moved or renamed (for example when a staging domain is promoted to production and the docroot is moved along with it), the links keep pointing to the previous absolute path. The bundle assets then return 404, which visually breaks the API Platform section of the Back Office and causes silent JS failures wherever `Routing.generate(...)` is used.

This command scans the admin `bundles/` folder (and `public/bundles/` if present) and reports symlinks that:

* point to a target that no longer exists, or
* point outside the current `vendor/` directory.

Without `--fix`, the command exits with status `1` when stale links are found — useful for deployment checks. With `--fix`, each stale link is rebuilt as a **relative** symlink pointing into the current `vendor/`.

{{% notice info %}}
The command requires write permission on the admin `bundles/` folder to repair links. On production servers where that directory is owned by another user, run it with the appropriate account (for example `www-data`).
{{% /notice %}}

## Examples

### Check that all bundle symlinks are healthy

```bash
$ bin/console prestashop:assets:symlinks
```

Expected output when everything is fine:

```
[OK] All bundle symlinks are healthy.
```

Exit code: `0`.

### Detect stale symlinks in detail

```bash
$ bin/console prestashop:assets:symlinks -v
```

The `-v` flag prints one line per link, including healthy ones.

### Repair stale symlinks after moving the installation

```bash
$ bin/console prestashop:assets:symlinks --fix
```

Each broken link is rewritten as a relative symlink into `vendor/`, so it survives future moves of the installation directory.
