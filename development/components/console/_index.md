---
title: The Console component
menuTitle: Console
---

# The Console component

PrestaShop uses the [Symfony Console](https://symfony.com/doc/6.4/components/console.html) component and provides its own set of CLI commands for developers and administrators.

## What are console commands?

Console commands (also called CLI commands or terminal commands) allow you to perform various PrestaShop operations from the command line without using the Back Office. These commands are particularly useful for:

- **Development**: Debugging, clearing cache, regenerating assets
- **Automation**: Scripting repetitive tasks, CI/CD pipelines, scheduled jobs (cron)
- **Maintenance**: Module management, database operations, index rebuilding
- **Performance**: Batch operations that would timeout in the browser
- **DevOps**: Server administration, deployment workflows

## Running console commands

All commands are executed from your PrestaShop root directory using:

```bash
php bin/console [command-name] [arguments] [options]
```

**Example:**
```bash
php bin/console prestashop:module install ps_banner
```

### List all available commands

To see all available commands:

```bash
php bin/console list
```

To get help for a specific command:

```bash
php bin/console [command-name] --help
```

## Available PrestaShop commands

PrestaShop provides the following console commands for various tasks. The list below is automatically generated from the command documentation files.

{{< console-commands >}}

## Creating custom commands

You can also create your own console commands for your modules. See the Symfony documentation on [Creating Console Commands](https://symfony.com/doc/6.4/console.html) for more information.

## Common use cases

### Regular maintenance
```bash
# Clear cache
php bin/console cache:clear

# Rebuild search index
php bin/console prestashop:search:index --full
```

### Scheduled maintenance (cron jobs)
```bash
# Regenerate thumbnails nightly
0 2 * * * cd /path/to/prestashop && php bin/console prestashop:thumbnails:regenerate

# Rebuild search index
php bin/console prestashop:search:index --full
```

### Development workflow
```bash
# Export translations before release
php bin/console prestashop:translation:export-module mymodule en-US
```

### Full list of commands

{{% children /%}}