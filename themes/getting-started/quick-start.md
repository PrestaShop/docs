---
title: Quick start
weight: 2
---

# Quick start

Create your own custom theme in 5 minutes by cloning [Hummingbird]({{< relref "/9/themes/hummingbird" >}}), the default PrestaShop theme, and using it as a starting point.

{{% notice info %}}
Hummingbird's compatibility is strictly tied to specific PrestaShop releases. To find the correct theme version for your store, please refer to the compatibility matrix on the [Hummingbird repository](https://github.com/PrestaShop/hummingbird/tree/develop#-compatibility).
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
name: mytheme          # Must match the directory name
display_name: My Theme
version: 1.0.0
author:
  name: "Your Name"
  email: "you@example.com"   # Optional
  url: "https://example.com" # Optional

meta:
  compatibility:
    from: 9.1.0
    to: ~9.1.0
    framework: bootstrap-v5.3.3  # Informational, not parsed by PrestaShop
```

## Install dependencies and build

From your theme's root directory, install dependencies and compile the source files into production-ready assets:

```bash
npm ci
npm run build
```

## Activate the theme

The recommended method to install your theme is through the Back Office to ensure all installation processes are handled correctly:

1. In the Back Office, go to **_Design > Theme & Logo_**.
2. Click on **_Add new theme_** and upload your theme as a `.zip` file.
3. Once uploaded, select your theme and click **_Use this theme_**.

Alternatively, you can manually place your extracted theme folder in the `/themes/` directory of your PrestaShop installation and then activate it from the Back Office. However, the `.zip` upload method is preferred for future-proofing.

{{% notice tip %}}
See [Exporting your theme]({{< relref "/9/themes/distribution/exporting" >}}) for how to create a distributable ZIP file.
{{% /notice %}}

## Start developing

```bash
npm run watch
```

This watches for file changes and recompiles assets automatically. Edit SCSS files in `src/scss/`, JavaScript in `src/js/`, and templates in `templates/`.
