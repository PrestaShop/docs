---
title: Development workflow
weight: 4
---

# Development workflow

{{% notice info %}}
You need **Node.js 20.x** and **npm** to build Hummingbird. For the full list of tools, see [Requirements]({{< relref "/9/themes/getting-started/requirements" >}}). For setting up a local PrestaShop instance, see [Environment setup]({{< relref "/9/themes/getting-started/environment-setup" >}}).
{{% /notice %}}

## Script commands

| Command | Purpose |
|---------|---------|
| `npm ci` | Install exact dependency versions from the lockfile |
| `npm run build` | Compile SCSS and TypeScript into production assets |
| `npm run watch` | Watch for file changes and recompile automatically |
| `npm run lint` | Run ESLint and Stylelint |
| `npm run format` | Run Prettier |
| `npm run storybook` | Launch Storybook component explorer |

Run `npm ci` first to install dependencies, then `npm run build` to compile. During development, `npm run watch` recompiles on every file save.

{{% notice tip %}}
Hummingbird includes a `.nvmrc` file. If you use nvm, run `nvm use` in the theme directory to automatically switch to the correct Node.js version.
{{% /notice %}}

## Docker environment

Hummingbird includes Docker Compose configurations that mount your theme directory automatically. See [Environment setup]({{< relref "/9/themes/getting-started/environment-setup" >}}) for setup instructions and available images.

For the full Docker configuration details, see the [Hummingbird README](https://github.com/PrestaShop/hummingbird?tab=readme-ov-file#-run-hummingbird-with-docker).

## Storybook

Hummingbird ships with [Storybook](https://storybook.js.org/) for isolated component development. Start it with:

```bash
npm run storybook
```

This opens a component explorer where you can develop and review UI components without a running PrestaShop instance.

## Troubleshooting

If styles or templates don't update during development:

### PrestaShop cache

In the Back Office under _Advanced Parameters > Performance_:

- **Smarty:** set _Force compilation_ to **Yes** and _Cache_ to **No**
- **CCC (Combine, Compress, Cache):** disable all options to prevent CSS/JS merging

{{% notice info %}}
For more development mode settings, see [Configure for development]({{< relref "/9/themes/getting-started/environment-setup#configure-for-development" >}}).
{{% /notice %}}

### Webpack watch not recompiling

If `npm run watch` is running but compiled files are not updating:

- Verify the watch process has no errors in its terminal output
- Check that you are editing files inside `src/`. Files in `assets/` are the compiled output and should not be edited directly
