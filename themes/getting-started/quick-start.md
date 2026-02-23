---
title: Quick start
weight: 2
---

# Quick start

Create your own custom theme in 5 minutes by cloning [Hummingbird]({{< relref "/9/themes/hummingbird" >}}), the default PrestaShop theme, and using it as a starting point.

{{% notice info %}}
Hummingbird requires **PrestaShop 9.1 or later**.
{{% /notice %}}

## Clone Hummingbird as a base

Replace `mytheme` with your theme name:

```bash
git clone https://github.com/PrestaShop/hummingbird.git mytheme
cd mytheme
rm -rf .git && git init   # Remove Hummingbird's history and start your own
```

## Configure your theme

Edit `config/theme.yml`:

```yaml
name: mytheme # The name must match the directory name
display_name: My Theme
version: 1.0.0
author:
  name: "Your Name"
  email: "you@example.com"
  url: "https://example.com"

meta:
  compatibility:
    from: 9.1.0
    to: ~9.1.0
    framework: bootstrap-v5.3.3  # Informational, not parsed by PrestaShop
```

{{% notice info %}}
The `name` field must match the theme's directory name exactly.
{{% /notice %}}

## Install dependencies and build

From your theme's root directory, install dependencies and compile the source files into production-ready assets:

```bash
npm ci
npm run build
```

## Activate the theme

1. Place your theme folder in the `/themes/` directory of your PrestaShop installation.
2. In the Back Office, go to _Design > Theme & Logo_.
3. Select your theme and click _Use this theme_.

Alternatively, you can upload your theme as a `.zip` file directly from the _Design > Theme & Logo_ page in the Back Office.

{{% notice tip %}}
See [Exporting your theme]({{< relref "/9/themes/distribution/exporting" >}}) for how to create a distributable ZIP file.
{{% /notice %}}

## Start developing

```bash
npm run watch
```

This watches for file changes and recompiles assets automatically. Edit SCSS files in `src/scss/`, JavaScript in `src/js/`, and templates in `templates/`.
