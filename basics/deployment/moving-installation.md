---
title: Moving a PrestaShop installation
menuTitle: Moving an installation
weight: 20
---

# Moving a PrestaShop installation

Sooner or later, most shops need to move: a staging domain becomes the production one, the docroot is renamed, the shop moves to another server, or the domain simply changes. PrestaShop stores several pieces of information about *where* it lives — in the database, in configuration files, and in a handful of filesystem artifacts — and all of them must be kept in sync.

This page lists what to update, and warns about the artifacts that are commonly forgotten.

## 1. Update the database

PrestaShop keeps the shop's domain in two places:

### `ps_shop_url`

One row per shop URL. Update `domain` and `domain_ssl` (and `physical_uri` if the base path also changes):

```sql
UPDATE ps_shop_url
SET domain = 'example.com', domain_ssl = 'example.com'
WHERE id_shop = 1;
```

### `ps_configuration`

Update `PS_SHOP_DOMAIN` and `PS_SHOP_DOMAIN_SSL`:

```sql
UPDATE ps_configuration
SET value = 'example.com'
WHERE name IN ('PS_SHOP_DOMAIN', 'PS_SHOP_DOMAIN_SSL');
```

## 2. Clear the caches

Once the database is updated, clear both the Symfony and the legacy caches:

```bash
bin/console prestashop:cache:clear
```

Or use the *Advanced Parameters > Performance > Clear cache* button in the Back Office.

Cache clearing does **not** touch the `.htaccess`, generated assets or bundle symlinks — see the next sections for those.

## 3. Regenerate the `.htaccess` file

If URL rewriting is enabled, the `.htaccess` file contains rules that reference the previous URL structure. Regenerate it:

```bash
bin/console prestashop:htaccess:generate --force
```

See [`prestashop:htaccess:generate`]({{< relref "/development/components/console/prestashop-htaccess-generate.md" >}}) for details.

## 4. Repair public bundle symlinks

This is the trap most shops fall into after a docroot move.

Symfony creates absolute-path symbolic links under `{admin}/bundles/` — typically `apiplatform` and `fosjsrouting` — that serve bundle assets (JS/CSS) as static files. These links are created by `assets:install` during `composer install` and are not refreshed by cache clearing. When the installation directory is moved or renamed, they keep pointing at the previous absolute path.

The visible symptoms are limited but confusing: the API Platform section of the Back Office shows a broken Swagger UI, JavaScript code that relies on `Routing.generate(...)` silently misfires, and the browser console fills up with 404s on assets under `/{admin}/bundles/`. There is no PHP fatal error, so the problem often goes unnoticed for days.

Repair them with:

```bash
bin/console prestashop:assets:symlinks --fix
```

See [`prestashop:assets:symlinks`]({{< relref "/development/components/console/prestashop-assets-symlinks.md" >}}) for details and options.

## 5. Rebuild autoload and dependencies (only when moving the server)

If the shop was copied to another server — as opposed to just being renamed in place — reinstall Composer dependencies to make sure autoload paths and vendor symlinks reflect the new environment:

```bash
composer install --no-dev --optimize-autoloader
```

Skip this step for an in-place rename: `composer install` overwrites `vendor/` and rebuilds every bundle symlink, which is more than what a rename actually needs (and `prestashop:assets:symlinks --fix` alone is enough).

## 6. Log customers out

The session cookies issued under the previous domain are unusable on the new one. Customers logged in at the moment of the migration will silently lose their cart. If that is a concern, purge active sessions:

```sql
TRUNCATE ps_customer_session;
TRUNCATE ps_guest;
```

## Known limitations

* Modules that store absolute URLs in their own configuration (banners with hard-coded image URLs, custom blocks with embedded links, …) are **not** updated by any of the steps above. Grep your database for the old domain to find them:

  ```sql
  SELECT name, value
  FROM ps_configuration
  WHERE value LIKE '%old-domain.example.com%';
  ```

* Files uploaded to the media library keep their absolute URLs if any were stored in HTML content (CMS pages, product descriptions). A search-and-replace pass on the relevant tables is usually needed.
