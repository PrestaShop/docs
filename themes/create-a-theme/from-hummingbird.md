---
title: Starting from Hummingbird
menuTitle: From Hummingbird
weight: 2
---

# Starting from Hummingbird

The recommended way to create a new PrestaShop 9 theme is to start from [Hummingbird]({{< relref "/9/themes/hummingbird" >}}). This gives you a complete, production-ready foundation with modern architecture, accessibility compliance, and a structured codebase.

## Clone Hummingbird as a base

This workflow assumes you have a local PrestaShop development instance running. Run the following from the `/themes/` directory of that installation:

```bash
git clone https://github.com/PrestaShop/hummingbird.git mytheme
cd mytheme
rm -rf .git && git init  # Detach from Hummingbird's history and start your own
git add -A && git commit -m "Initial commit from Hummingbird"
```

{{% notice warning %}}
`rm -rf .git` permanently discards the full Hummingbird commit history. This is the right choice when you want a clean project history. If you want to keep the ability to pull future Hummingbird changes (e.g., bug fixes), set a new remote instead: `git remote set-url origin <your-repo-url>`.
{{% /notice %}}

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

## Build

See [Requirements]({{< relref "/9/themes/getting-started/requirements" >}}) for the required Node and npm versions.

```bash
npm ci           # Installs exact versions from the lockfile — use this instead of npm install for reproducible builds
npm run build
```

During development, use `npm run watch` instead to recompile automatically on every file save.

## Activate

Since the theme is already inside your PrestaShop `/themes/` directory, go to _Design > Theme & Logo_ in the Back Office, select your theme, and click _Use this theme_.

{{% notice tip %}}
Replace `preview.png` with a 500×746 PNG screenshot of your theme before activating. The cloned Hummingbird image will otherwise appear in the Back Office theme selector.
{{% /notice %}}

## Customization approach

Before customizing, take time to assess what your design actually requires. Many changes can be achieved by overriding Bootstrap variables or restyling existing components — no new code needed. Custom components should only come when the existing system genuinely cannot cover your need. See [CSS conventions]({{< relref "/9/themes/hummingbird/css-conventions" >}}) for the full structure.

- **Templates:** Override Smarty templates using [template inheritance]({{< relref "/9/themes/concepts/templates/template-inheritance" >}}) — extend and redefine blocks rather than copying entire files.
- **JavaScript:** Use `data-ps-*` attributes for behavior hooks. Listen to [PrestaShop events]({{< relref "/9/themes/reference/javascript-events" >}}) for dynamic updates. See [JavaScript conventions]({{< relref "/9/themes/hummingbird/javascript-conventions" >}}).
- **Module overrides:** Place template and asset overrides in `modules/`. See [Overrides]({{< relref "/9/themes/concepts/overrides" >}}).

{{% notice tip %}}
If you only need small changes (add a block, adjust a style), consider a [child theme]({{< relref "/9/themes/create-a-theme/child-theme" >}}) instead. This makes it easier to pull in updates from Hummingbird.
{{% /notice %}}
