---
title: prestashop:module:list
category: Module Management
description: List shop modules with their version and status
weight: 20
---

# `prestashop:module:list`

{{< minver v="9.2" title="true" >}}

## Informations

* Path: `src/PrestaShopBundle/Command/ModuleListCommand.php`
* Options:
  * `--active`: Show only installed and enabled modules __(optional)__
  * `--disabled`: Show only installed but disabled modules __(optional)__
  * `--not-installed`: Show only modules present on disk or registered via the `actionListModules` hook but not installed __(optional)__
  * `--all`: Include uninstalled modules alongside installed ones __(optional)__
  * `--simple`: Output only technical names, one per line, instead of a table __(optional)__

## Description

This command lists shop modules from the command line. By default it prints a table of installed modules with their name, version, and status (`Enabled` or `Disabled`), sorted alphabetically.

The scope options `--active`, `--disabled`, `--not-installed`, and `--all` are mutually exclusive: passing more than one returns an error and a non-zero exit code. The `--simple` flag is orthogonal and composes with any scope filter, which makes it convenient for `grep`, `awk`, or `xargs` pipelines.

The existing [`prestashop:module`]({{< relref "prestashop-module" >}}) command is left unchanged.

## Examples

### List all installed modules

```bash
$ bin/console prestashop:module:list
```

### List only disabled modules

```bash
$ bin/console prestashop:module:list --disabled
```

### List technical names of disabled modules, one per line

```bash
$ bin/console prestashop:module:list --simple --disabled
```

### List installed and not-installed modules together

```bash
$ bin/console prestashop:module:list --all
```
