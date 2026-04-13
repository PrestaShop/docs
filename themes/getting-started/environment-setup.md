---
title: Environment setup
weight: 3
---

# Environment setup

You need a running PrestaShop 9 instance to preview and test your theme during development.

## Option 1: Docker (recommended)

Hummingbird includes Docker Compose configurations that spin up a full PrestaShop environment (application, database, phpMyAdmin) with your theme mounted automatically. These configurations require **PrestaShop 9.1+**.

Two images are available:

| Image | Startup | Use case |
|-------|---------|----------|
| **[PrestaShop](https://hub.docker.com/r/prestashop/prestashop/)** (`prestashop/prestashop`) | ~2–5 min | Full installation wizard, closest to production |
| **[Flashlight](https://hub.docker.com/r/prestashop/prestashop-flashlight)** (`prestashop/prestashop-flashlight`) | ~10 sec | Pre-installed dump, ideal for fast iteration and testing |

### Setup

From the Hummingbird root directory:

```bash
cp docker/.env-example docker/.env
```

Edit `docker/.env` with your settings:

```bash
PS_TAG=9.1.0
PLATFORM=linux/amd64       # or linux/arm64 for Apple Silicon Macs
ADMIN_EMAIL=admin@prestashop.com
ADMIN_PASSWORD=prestashop
```

### Start the environment

```bash
# Standard PrestaShop
docker compose -f docker/docker-compose-prestashop.yml up -d

# Or Flashlight (faster startup)
docker compose -f docker/docker-compose-flashlight.yml up -d
```

| Service | URL |
|---------|-----|
| PrestaShop | `http://localhost:8887` |
| Back Office | `http://localhost:8887/admin-dev` |
| phpMyAdmin | `http://localhost:8889` |

### Stop the environment

Use the same compose file you started with:

```bash
# If you started with Standard PrestaShop
docker compose -f docker/docker-compose-prestashop.yml down -v

# If you started with Flashlight
docker compose -f docker/docker-compose-flashlight.yml down -v
```

See the [Hummingbird Docker setup](https://github.com/PrestaShop/hummingbird#-run-hummingbird-with-docker) for full details.

## Option 2: Local PHP stack

If you prefer a traditional setup (XAMPP, MAMP, Laragon, or native PHP), install PrestaShop manually. Check the [system requirements]({{< relref "/9/basics/installation/system-requirements" >}}) for the PHP, MySQL, and web server versions needed, then follow the [installation guide]({{< relref "/9/basics/installation" >}}).

Once installed, copy your theme folder into the `/themes/` directory of your PrestaShop installation, then activate it from the Back Office under _Design > Theme & Logo_.

## Configure for development

Enable Developer Mode for template debugging and error reporting. You can either:

- Set `_PS_MODE_DEV_` to `true` in `config/defines.inc.php`
- Or toggle it from the Back Office under _Advanced Parameters > Performance > Debug mode_

Additionally, disable caching and file merging so your changes appear immediately. In the Back Office under _Advanced Parameters > Performance_:

- **Smarty:** set _Force compilation_ to **Yes** and _Cache_ to **No**.
- **CCC (Combine, Compress, Cache):** disable all options to prevent PrestaShop from merging and minifying your CSS and JavaScript files.

{{% notice tip %}}
In Developer Mode, HTML comments show the source path of each rendered template — useful to confirm which file is actually being loaded. For example:
{{% /notice %}}

```html
<!-- begin /var/www/html/themes/mytheme/templates/catalog/product.tpl -->
```
